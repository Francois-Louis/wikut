<?php

namespace App\Controller;

use App\Entity\Project;
use App\Form\ProjectFormType;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function createProject(EntityManagerInterface $em, Request $request, ProjectRepository $projectRepository): Response
    {

        $form = $this->createForm(ProjectFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($project);
            $em->flush();

            $this->addFlash('success', 'Le projet a été créé avec succès');

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('project/createProject.html.twig', [
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
    public function editProject(Project $project, Request $request, EntityManagerInterface $em, ProjectRepository $projectRepo): Response
    {
        $form = $this->createForm(ProjectFormType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Project $project */
            $project = $form->getData();

            $em->persist($project);
            $em->flush();

            $this->addFlash('success', 'Le projet a été créé avec succès');

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('project/createProject.html.twig', [
            'form' => $form,
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
