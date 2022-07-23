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
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Wikut Admninistator');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::linkToCrud('Project', 'fa fa-list', Project::class);
        yield MenuItem::linkToCrud('Picture', 'fa fa-list', Picture::class);
        yield MenuItem::LinkToCrud('Comment', 'fa fa-list', Comment::class);
        yield MenuItem::LinkToCrud('Vote', 'fa fa-list', Vote::class);
        yield MenuItem::LinkToCrud('Category', 'fa fa-list', Category::class);
        yield MenuItem::LinkToCrud('Style', 'fa fa-list', Style::class);
        yield MenuItem::LinkToCrud('Blade', 'fa fa-list', Blade::class);
        yield MenuItem::LinkToCrud('Handle', 'fa fa-list', Handle::class);
        yield MenuItem::LinkToCrud('User', 'fa fa-list', User::class);
        yield MenuItem::LinkToCrud('Status', 'fa fa-list', Status::class);
        yield MenuItem::LinkToCrud('Rank', 'fa fa-list', Rank::class);
        yield MenuItem::linkToCrud('Country', 'fas fa-star', Country::class);
        yield MenuItem::LinkToCrud('City', 'fa fa-list', City::class);
        yield MenuItem::linkToRoute('Logout', 'fa fa-sign-out', 'app_logout');
    }
}
