<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="app_sitemap", defaults={"_format"="xml"})
     */
    public function index(Request $request, ProjectRepository $projectRepository): Response
    {
        $hostname = $request->getSchemeAndHttpHost();

        $urls = [];

        $urls[] = ['loc' => $this->generateUrl('app_home')];

        foreach ($projectRepository->findAll() as $project) {
            $urls[] = [
                'loc' => $this->generateUrl('app_project_show', ['slug' => $project->getSlug()]),
                'lasmod' => $project->getCreatedAt()->format('Y-m-d')
            ];
        }

        $response = new Response(
            $this->renderView('sitemap/sitemap.xml.twig', [
                'hostmname' => $hostname,
                'urls' => $urls
            ]),
            200,
        );

        $response->headers->set('Content-Type', 'application/xml');

        return $response;
    }
}
