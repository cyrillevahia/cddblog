<?php

namespace App\Controller\Admin;

use App\Entity\Inventaire;
use App\Entity\Exemplaire;

use Doctrine\ORM\EntityManagerInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class InventaireController extends AbstractController
{
    /**
     * @Route("/logistique", name="logistique")
     * 
     */

     //@IsGranted("ROLE_ADMIN")
   /* public function index(): Response
    {
        return $this->render('admin/inventaire.html.twig');
    }*/
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        // creates a task object and initializes some data for this example
        $inventaire = new Inventaire();        
        $inventaire->setCreatedAt(new \DateTimeImmutable('now'));

        $form = $this->createFormBuilder($inventaire)
            ->add('codebar',TextType::class, array(
                'attr' => array(
                    'autofocus' => true,
                    //'autocomplete'=> 'off',
                    'value'=> " ",
                    'class'=>'control-form'
                ))
                )
            
           //->add('save', SubmitType::class, ['label' => 'Ajout inventaire'])
            ->getForm();

        // ...
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

             //recherche de l'exemplaire dans la table entree

             if ($form->isValid()) {
           

             

             

                    $exemplaireRepos = $em->getRepository(Exemplaire::class);
                    $instanceExemplaire = $exemplaireRepos->findExemplaire($form->getData()->getCodebar());
                    ($instanceExemplaire);
                
                    if(!$instanceExemplaire){
                        $response = new Response('Veuillez enregistrer l\'exemplaire !');
                        return $response;
                    }else{
                        
                        
                        $inventaire->setCodebar($form->getData()->getCodebar());
                        $inventaire->setExemplaire($instanceExemplaire);
                        $em->persist($inventaire);
                        $em->flush($inventaire);
                        $code = "";
               
             

                 }
            }
            
            
        }
        
        return $this->renderForm('admin/inventaire.html.twig', [
            'form' => $form,
        ]);
    }
}