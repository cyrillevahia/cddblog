<?php

namespace App\Controller\Admin;

use App\Entity\Inventaire;
use App\Entity\Affectation;
use App\Entity\Exemplaire;
use App\Entity\Entree;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Service\PdfService;

// Include Dompdf required namespaces
use Dompdf\Dompdf;
use Dompdf\Options;

class NonInventorieController extends AbstractController
{
    
    
    /**
     * @Route("/absent", name="absent")
     * 
     */

     //@IsGranted("ROLE_ADMIN")
   /* public function index(): Response
    {
        return $this->render('admin/inventaire.html.twig');
    }*/
    public function new(Request $request, EntityManagerInterface $em, PdfService $pdf): Response
    {      

        $inventaire = new Inventaire();        
        $debut=date('d-m-y h:i:s');
        $fin=date('d-m-y h:i:s');
        $exemplaireRepos = $em->getRepository(Exemplaire::class);
        $listedesmaterielsnoninventories = $exemplaireRepos->listeMaterielsNonInventories($debut,$fin);
        $entreeRepos = $em->getRepository(Entree::class);
        $listeDesMaterielsEnMagasin = $entreeRepos->findMaterial();
        $listeDesMaterielsSortisDuMagasin = $entreeRepos->trouverMaterielsSortis();
           $form = $this->createFormBuilder($inventaire)
            ->add('debut',null, array(
                'mapped' => false,
                "attr" => array(
                    "class" => "datepicker",
                
                )))
            ->add('fin', null, array('mapped' => false))
            //->add('save', SubmitType::class, ['label' => 'Afficher la liste'])
            ->getForm();

        // ...
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                    $debut=$form->get('debut')->getData();
                    $fin=$form->get('fin')->getData();
                    $fin = date('Y-m-d H:i:s', strtotime($fin . ' +1 day'));
                    $listedesmaterielsnoninventories = $exemplaireRepos->listeMaterielsNonInventories($debut,$fin);
                      if(!$listedesmaterielsnoninventories){
                        $response = new Response('tous les matériels ont été inventoriés !');
                        return $response;
                    }else{
                        //dd($listedesmaterielsnoninventories);

                        
                        $html=$this->renderForm('admin/resultats_inventaire02.html.twig', [
                            'form' => $form,
                            'exemplaires'=> $listedesmaterielsnoninventories,
                            'materiels'=> $listeDesMaterielsEnMagasin,
                            'materielsSortis'=>$listeDesMaterielsSortisDuMagasin
                         ]);
                         
                         
/*
                         // instantiate and use the dompdf class
                            $dompdf = new Dompdf();
                            $dompdf->loadHtml($html);
                            // (Optional) Setup the paper size and orientation
                            $dompdf->setPaper('A4', 'portrait');
                            // Render the HTML as PDF
                            $dompdf->render();
                            $fichier = 'essai.pdf';

                            // Output the generated PDF to Browser
                            $dompdf->stream($fichier);
      */

                             return $this->renderForm('admin/resultats_inventaire02.html.twig', [
                                'form' => $form,
                                'exemplaires'=> $listedesmaterielsnoninventories,
                                'materiels'=> $listeDesMaterielsEnMagasin,
                                'materielsSortis'=>$listeDesMaterielsSortisDuMagasin
                            ]);
                     
                 }
            }
            
            
        }

        
        

       

        
        //dd($listeDesMaterielsEnMagasin);
        return $this->renderForm('admin/resultats_inventaire02.html.twig', [
            'form' => $form,
            'exemplaires'=> $listedesmaterielsnoninventories,
            'materiels'=> $listeDesMaterielsEnMagasin,
            'materielsSortis'=>$listeDesMaterielsSortisDuMagasin
        ]);


        

                     
                        


        
        
    }
    

}