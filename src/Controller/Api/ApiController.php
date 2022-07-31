<?php

namespace App\Controller\Api;

use App\Repository\MainRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/user", name="app_api_user", methods={"GET"})
     */
    public function user(): Response
    {
        $user = $this->getUser();

        return $this->json($user, Response::HTTP_OK,[], ['groups' => 'api_user']);
    }

    /**
     * @Route("/projects", name="app_api_projects", methods={"GET"})
     */
    public function projectsFeed(Request $request, ProjectRepository $projectRepository): Response
    {;
        $headerContent = $request->headers->get('page');

        $projects = $projectRepository->findBy([], ['createdAt' => 'DESC'], 1, $headerContent);

        return $this->json($projects, Response::HTTP_OK,[], ['groups' => 'api_feed']);
    }

    /**
     * @Route("/projects/{slug}/vote", name="app_api_vote", methods={"POST"})
     */
    public function vote(Request $request, ProjectRepository $projectRepository): Response
    {
        $headerContent = $request->headers->get('page');

        $project = $projectRepository->findOneBy(['slug' => $headerContent]);

        return $this->json($project, Response::HTTP_OK,[], ['groups' => 'api_project']);
    }

    /**
     * @Route("/projects/{slug}/comment", name="app_api_comment", methods={"POST"})
     */
    public function comment(Request $request, ProjectRepository $projectRepository): Response
    {
        $headerContent = $request->headers->get('page');

        $project = $projectRepository->findOneBy(['slug' => $headerContent]);

        return $this->json($project, Response::HTTP_OK,[], ['groups' => 'api_project']);
    }

    /**
     * @Route("/projects/{slug}/comment{id}/answer", name="app_api_answer", methods={"POST"})
     */
    public function answer(Request $request, ProjectRepository $projectRepository): Response
    {
        $headerContent = $request->headers->get('page');

        $project = $projectRepository->findOneBy(['slug' => $headerContent]);

        return $this->json($project, Response::HTTP_OK,[], ['groups' => 'api_project']);
    }

    /**
     * @Route("/search", name="app_api_search", methods={"GET"})
     */
    public function search(Request $request, MainRepository $mainRepository): Response
    {;
        $headerContent = $request->headers->get('research');

        $results = $mainRepository->search($headerContent);

        return $this->json($results, Response::HTTP_OK,[], []);
    }
}
