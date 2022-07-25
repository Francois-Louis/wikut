<?php

namespace App\Controller\Admin;

use App\Entity\Blade;
use App\Entity\Category;
use App\Entity\City;
use App\Entity\Comment;
use App\Entity\Country;
use App\Entity\Handle;
use App\Entity\Picture;
use App\Entity\Project;
use App\Entity\Rank;
use App\Entity\Status;
use App\Entity\Style;
use App\Entity\User;
use App\Entity\Vote;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="app_admin")
     * @IsGranted("ROLE_MODO")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Wikut Admninistator');
        // dispo symfo 6
        //->setMenuItems([
        //MenuItem::linkToUrl('My Profile', 'fa fa-user', $this->generateUrl('app_user_account'))
        // ]);
    }

    public function configureUserMenu(UserInterface $user): \EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu
    {
        return parent::configureUserMenu($user)
            ->setAvatarUrl($user->getAvatar());
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        Yield MenuItem::section('Projects');
        yield MenuItem::linkToCrud('Project', 'fa fa-knife', Project::class);
        yield MenuItem::linkToCrud('Picture', 'fa fa-images', Picture::class);
        yield MenuItem::LinkToCrud('Comment', 'fa fa-comments', Comment::class);
        yield MenuItem::LinkToCrud('Vote', 'fa fa-star', Vote::class)
            ->setPermission('ROLE_ADMIN');
        Yield MenuItem::section('Types');
        yield MenuItem::LinkToCrud('Category', 'fa fa-list', Category::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::LinkToCrud('Style', 'fa fa-list', Style::class);
        yield MenuItem::LinkToCrud('Blade', 'fa fa-list', Blade::class);
        yield MenuItem::LinkToCrud('Handle', 'fa fa-list', Handle::class);
        Yield MenuItem::section('Users');
        yield MenuItem::LinkToCrud('User', 'fa fa-users', User::class);
        yield MenuItem::LinkToCrud('Status', 'fa fa-list', Status::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::LinkToCrud('Rank', 'fa fa-ranking-star', Rank::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Country', 'fas fa-globe', Country::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::LinkToCrud('City', 'fa fa-city', City::class)
            ->setPermission('ROLE_ADMIN');
        Yield MenuItem::section('');
        yield MenuItem::LinkToUrl('Home', 'fa fa-home', $this->generateUrl('app_home'));
        Yield MenuItem::section('');
        yield MenuItem::linkToRoute('Logout', 'fa fa-sign-out', 'app_logout');
    }

    public function configureCrud(): \EasyCorp\Bundle\EasyAdminBundle\Config\Crud
    {
        return parent::configureCrud()
            ->setDefaultSort(['createdAt' => 'DESC'])
            ->showEntityActionsInlined();
    }


    public function configureActions(): \EasyCorp\Bundle\EasyAdminBundle\Config\Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureAssets(): \EasyCorp\Bundle\EasyAdminBundle\Config\Assets
    {
        return parent::configureAssets()
            ->addCssFile('build/app.css');
    }
}
