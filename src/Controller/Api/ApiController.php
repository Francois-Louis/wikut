<?php

namespace App\Controller\Api;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="app_api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    // can use isgranted auth_remembered

    /**
     * @Route("/api/projects", name="app_api_projects")
     */
    public function projectsFeed(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();

        return $this->json($projects, Response::HTTP_OK,[], ['groups' => 'api_feed']);
    }
}
