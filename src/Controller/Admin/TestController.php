<?php

namespace App\Controller\Admin;

use App\Service\PdfService;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     * 
     */

     //@IsGranted("ROLE_ADMIN")
    public function index(): Response
    {
        return $this->render('admin/test.html.twig');
    }
    #[route('/pdf', name:'test.pdf')]
    public function generateTestPdf(PdfService $pdf){
        $html=$this->render(view:'admin/test.html.twig');
        $pdf->showPdfFile($html);

    }
}