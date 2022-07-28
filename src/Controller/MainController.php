<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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

    /**
     * @Route("/mail", name="mail")
     */
    public function index(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Test de MailDev')
            ->text('Ceci est un mail de test');
        $mailer->send($email);

        return $this->render('pages/home.html.twig', [
            'controller_name' => 'MailController',
        ]);
    }
}
