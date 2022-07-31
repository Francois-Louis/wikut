<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectFormType;
use App\Repository\ProjectRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/project")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/create", name="project_create", methods={"GET", "POST"})
     * @IsGranted("ROLE_USER")
     */
    public function createProject(Request $request, ProjectRepository $projectRepository): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectFormType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projectRepository->add($project);

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
            //return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('project/createProject.html.twig', [
            'project' => $project,
            'form' => $form,
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
