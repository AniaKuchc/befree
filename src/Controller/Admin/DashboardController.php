<?php

namespace App\Controller\Admin;

use App\Entity\Activite;
use App\Entity\Adresse;
use App\Entity\CatalogueRandonnee;
use App\Entity\Client;
use App\Entity\Clients;
use App\Entity\Offre;
use App\Entity\Personnels;
use App\Entity\Prestataire;
use App\Entity\Randonnee;
use App\Entity\TypeActivite;
use App\Entity\TypePrestataire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ActiviteCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Befree - Accès Organisateur');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Accueil', 'fa fa-home', 'app_default');
        yield MenuItem::linkToCrud('Activite', 'fa-solid fa-person-snowboarding', Activite::class);
        yield MenuItem::linkToCrud('Randonnee', 'fa-solid fa-person-hiking', Randonnee::class);
        yield MenuItem::linkToCrud('Prestataire', 'fa-solid fa-book', Prestataire::class);
        yield MenuItem::linkToCrud('TypePrestataire', 'fa-regular fa-bookmark', TypePrestataire::class);
        yield MenuItem::linkToCrud('TypeActivite', "fa-solid fa-burst", TypeActivite::class);
        yield MenuItem::linkToCrud('Adresse', "fa-solid fa-address-book", Adresse::class);
        yield MenuItem::linkToCrud('Offre', "fa-solid fa-receipt", Offre::class);
        yield MenuItem::linkToCrud('Personnels', "fa-solid fa-users-line", Personnels::class);
        yield MenuItem::linkToCrud('Clients', "fa-solid fa-money-check", Clients::class);
        yield MenuItem::linkToCrud('CatalogueRandonnee', "fa-solid fa-book-bookmark", CatalogueRandonnee::class);
    }
}
