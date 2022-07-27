<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @method User getUser()
 */
class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function home(): Response
    {
        return $this->render('pages/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/my-account", name="app_my_account")
     */
    public function myAccount(): Response
    {
        return $this->render('pages/myAccount.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/create-project", name="app_create_project")
     */
    public function createProject(): Response
    {
        return $this->render('pages/createProject.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
