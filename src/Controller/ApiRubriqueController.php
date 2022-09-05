<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ApiRubriqueController extends AbstractController
{
    #[Route('/api/{rubrique}', name: 'app_api_rubrique')]
    public function index(PostRepository $postRepository, Request $request): Response
    {
        //dd($postRepository->postsRubrique('Gouvernance'));
        $rubrique = $request->get('rubrique');
        return $this->json($postRepository->postsRubrique($rubrique), 200, [], ['groups' => 'post:read']);
    }
}
