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
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('pages/home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/trending", name="trending")
     */
    public function trending(): Response
    {
        return $this->render('pages/trend.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/top", name="top")
     */
    public function top(): Response
    {
        return $this->render('pages/top.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('pages/about.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/faq", name="faq")
     */
    public function faq(): Response
    {
        return $this->render('pages/faq.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/terms", name="terms")
     */
    public function terms(): Response
    {
        return $this->render('pages/terms.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/privacy", name="privacy")
     */
    public function privacy(): Response
    {
        return $this->render('pages/privacy.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/legal", name="legal")
     */
    public function legal(): Response
    {
        return $this->render('pages/legal.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/map", name="map")
     */
    public function map(): Response
    {
        return $this->render('pages/map.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }


}
