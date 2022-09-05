<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiHeroController extends AbstractController
{
    #[Route('/api/hero', name: 'app_api_hero', methods: 'GET')]
    public function index(PostRepository $postRepository): Response
    {
        return $this->json($postRepository->findAll(), 200, [], ['groups' => 'post:read']);
    }

    #[Route('/api/post/{id}', name: 'app_api_postId', methods: 'GET')]
    public function postId(PostRepository $postRepository, int $id): Response
    {
        return $this->json($postRepository->findOneById($id), 200, [], ['groups' => 'post:read']);
    }
}
