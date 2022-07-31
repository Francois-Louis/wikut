<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/project")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/create", name="project_create")
     * @IsGranted("ROLE_USER")
     */
    public function createProject(): Response
    {
        return $this->render('project/createProject.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/knife/{slug}", name="project_show")
     */
    public function showProject(): Response
    {
        return $this->render('project/project.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="project_edit")
     * @IsGranted("ROLE_USER")
     */
    public function editProject(): Response
    {
        return $this->render('project/editProject.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/{slug}/delete", name="project_delete")
     * @IsGranted("ROLE_USER")
     */
    public function deleteProject(): Response
    {
        return $this->render('project/deleteProject.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
