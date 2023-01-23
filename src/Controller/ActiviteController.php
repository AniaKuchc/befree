<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\InscriptionClientsActivite;
use App\Repository\ActiviteRepository;
use App\Repository\InscriptionClientsActiviteRepository;
use App\Repository\SouscriptionClientOffreRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ActiviteController extends AbstractController
{
    #[Route('/activite', name: 'app_activite')]
    public function index(): Response
    {
        return $this->render('activite/index.html.twig', [
            'controller_name' => 'ActiviteController',
        ]);
    }

    /**
     * Affiche la liste des activités à venir
     */
    #[Route('/activite/avenir', name: 'app_activites_futures')]
    public function ShowFutureActivities(SouscriptionClientOffreRepository $souscription, ActiviteRepository $activiteRepository, UserInterface $user, InscriptionClientsActiviteRepository $inscription): Response
    {

        $activiteInscrits = $inscription->findActivityPerClient($user->getId());
        $activities = $activiteRepository->findActivities();
        $nextInscriptions = [];
        $offer = $souscription->findOfferForOneClient($user->getId());

        foreach ($activiteInscrits as $activiteInscrit) {
            $nextActivites[] = $activiteInscrit->getActivites()->getId();
        }

        foreach ($activities as $activity) {
            $nextInscriptions[] = $activity->getId();
        }

        $nextActivitesInscriptions = array_diff($nextInscriptions, $nextActivites);

        return $this->render('activite/activites_futures.html.twig', [
            'nextActivitesInscriptions' => $nextActivitesInscriptions,
            'activities' => $activities,
            'offer' => $offer,

        ]);
    }

    /**
     * Affiche la fiche activite
     */
    #[Route('/activite/{id}', name: 'app_fiche_activite')]
    public function viewActivity(Activite $activite, UserInterface $user, InscriptionClientsActiviteRepository $inscription): Response
    {

        return $this->render('activite/fiche_activite.html.twig', [
            'activite' => $activite,

            'client' => $user,
            'isRegister' => $inscription->findOneById($activite->getId(), $user->getId()),
            'placesRestantes' => $activite->getPlaceMaximum()
        ]);
    }

    /**
     * Inscription à une activité
     *
     * @return void
     */
    #[Route('/activite/{id}/inscription', name: 'app_inscription_activite')]
    public function registerActivity(Activite $activite, ActiviteRepository $activiteRepo, UserInterface $user, InscriptionClientsActiviteRepository $inscriptionRepo)
    {

        $inscription = new InscriptionClientsActivite;
        $inscription->setClients($user);
        $inscription->setActivites($activite);
        $inscription->setInscriptionActiviteClient(new DateTimeImmutable());
        $inscriptionRepo->save($inscription, true);

        $placesMax = $activite->getPlaceMaximum() - 1;
        $activite->setPlaceMaximum($placesMax);
        $activiteRepo->save($activite, true);

        return $this->redirectToRoute('app_fiche_activite', ['id' => $activite->getId()]);
    }

    /**
     * Désnscription à une activité
     *
     * @return void
     */
    #[Route('/activite/{id}/desinscription', name: 'app_desinscription_activite')]
    public function unregisterActivity(Activite $activite, ActiviteRepository $activiteRepo, UserInterface $user, InscriptionClientsActiviteRepository $inscriptionRepo)
    {

        $inscription = $inscriptionRepo->findOneById($activite->getId(), $user->getId());
        $inscriptionRepo->remove($inscription, true);

        $placesMax = $activite->getPlaceMaximum() + 1;
        $activite->setPlaceMaximum($placesMax);
        $activiteRepo->save($activite, true);

        return $this->redirectToRoute('app_fiche_activite', ['id' => $activite->getId()]);
    }
}
