<?php

namespace App\Controller\Api;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{

    /**
     * @Route("/api/user", name="app_api_user")
     */
    public function user(): Response
    {
        $user = $this->getUser();

        return $this->json($user, Response::HTTP_OK,[], ['groups' => 'api_user']);
    }

    /**
     * @Route("/api/projects", name="app_api_projects")
     */
    public function projectsFeed(ProjectRepository $projectRepository): Response
    {;

        $projects = $projectRepository->findAll();


        return $this->json($projects, Response::HTTP_OK,[], ['groups' => 'api_feed']);
    }
}
