<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/my-account", name="app_user_account")
     * @IsGranted("ROLE_USER")
     */
    public function mySaccount(): Response
    {
        return $this->render('user/myAccount.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
