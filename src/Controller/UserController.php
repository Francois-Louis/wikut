<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profile/{slug}", name="profile")
     */
    public function profile(Request $request, UserRepository $userRepo): Response
    {
        $slug = $request->attributes->get('slug');
        $user = $userRepo->findOneBy(['slug' => $slug]);
        $status = $user->getStatus()->getId();

        // Block access to non professional users for not registered users
        if($status == 0 || $status == 1) {
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');
        }

        return $this->render('user/profile.html.twig', [
            $user,
        ]);
    }

    /**
     * @Route("/my-account/{slug}", name="my_account")
     * @IsGranted("ROLE_USER")
     */
    public function myAccount(string $slug): Response
    {
        if($slug !== $this->getUser()->getSlug()) {
            throw $this->createAccessDeniedException('Vous n\'avez pas accès à cette page');
        }

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        return $this->render('user/myAccount.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/my-account/{slug}/edit", name="edit_account")
     * @IsGranted("ROLE_USER")
     */
    public function editAccount(): Response
    {
        return $this->render('user/editAccount.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/my-account/{slug}/unsubscribe", name="unsubscribe", methods={"POST"})
     * @IsGranted("ROLE_USER")
     */
    public function unsubscribe(UserRepository $userRepo): Response
    {
        $user = $this->getUser();

        if($this->isCsrfTokenValid('unsubscribe'.$user->getId(), $this->request->get('_token'))) {
            $user->setEnabled(false);
            $this->getDoctrine()->getManager()->flush();
        }



        return $this->redirectToRoute('unsubscribe', [], Response::HTTP_SEE_OTHER);
    }
}
