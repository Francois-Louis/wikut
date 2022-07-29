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
     * @Route("/api/projects", name="app_api_projects", methods={"GET"})
     */
    public function projectsFeed(Request $request, ProjectRepository $projectRepository): Response
    {;
        $headerContent = $request->headers->get('page');

        $projects = $projectRepository->findBy([], ['createdAt' => 'DESC'], 1, $headerContent);

        return $this->json($projects, Response::HTTP_OK,[], ['groups' => 'api_feed']);
    }
}
