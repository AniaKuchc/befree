<?php

namespace App\Controller;

use App\Repository\ActiviteRepository;
use App\Repository\CatalogueRandonneeRepository;
use App\Repository\RandonneeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(ActiviteRepository $activiteRepository, RandonneeRepository $RandonneeRepository): Response
    {


        return $this->render('dashboard/dashboard.html.twig', [
            'activities' => $activiteRepository->findActivities(),
            'randonnees' => $RandonneeRepository->findInCatalogue()
        ]);
    }
}
