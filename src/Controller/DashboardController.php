<?php

namespace App\Controller;

use App\Repository\ActiviteRepository;
use App\Repository\CatalogueRandonneeRepository;
use App\Repository\InscriptionClientsActiviteRepository;
use App\Repository\RandonneeRepository;
use App\Repository\SouscriptionClientOffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(ActiviteRepository $activiteRepository, RandonneeRepository $RandonneeRepository, UserInterface $user, InscriptionClientsActiviteRepository $inscription, SouscriptionClientOffreRepository $souscription): Response
    {

        $activiteInscrits = $inscription->findActivityPerClient($user->getId());
        $activities = $activiteRepository->findActivities();
        $offer = $souscription->findOfferForOneClient($user->getId());
        $nextInscriptions = [];

        foreach ($activiteInscrits as $activiteInscrit) {
            $nextActivites[] = $activiteInscrit->getActivites()->getId();
        }

        foreach ($activities as $activity) {
            $nextInscriptions[] = $activity->getId();
        }

        $nextActivitesInscriptions = array_diff($nextInscriptions, $nextActivites);

        return $this->render('dashboard/dashboard.html.twig', [
            'activities' => $activities,
            'activiteInscrits' => $activiteInscrits,
            'randonnees' => $RandonneeRepository->findInCatalogue(),
            'offer' => $offer,
            'nextActivitesInscriptions' => $nextActivitesInscriptions,
        ]);
    }
}
