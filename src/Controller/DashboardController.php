<?php

namespace App\Controller;

use App\Repository\ActiviteRepository;
use App\Repository\CatalogueRandonneeRepository;
use App\Repository\InscriptionClientsActiviteRepository;
use App\Repository\RandonneeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(ActiviteRepository $activiteRepository, RandonneeRepository $RandonneeRepository, UserInterface $user, InscriptionClientsActiviteRepository $inscription): Response
    {

        $activiteInscrits = $inscription->findActivityPerClient($user->getId());

        return $this->render('dashboard/dashboard.html.twig', [
            'activities' => $activiteRepository->findActivities(),
            'activiteInscrits' => $activiteInscrits,
            'randonnees' => $RandonneeRepository->findInCatalogue()
        ]);
    }
}
