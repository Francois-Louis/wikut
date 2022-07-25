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

    /**
     * @Route("/api/projects", name="app_api_projects")
     */
    public function projectList(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();

        return $this->json($projects, Response::HTTP_OK,[], ['groups' => 'api_projects_list']);
    }
}
