<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Clients;
use App\Entity\InscriptionClientsActivite;
use App\Entity\Personnels;
use App\Repository\ActiviteRepository;
use App\Repository\ClientsRepository;
use App\Repository\InscriptionClientsActiviteRepository;
use App\Repository\PersonnelsRepository;
use DateTimeImmutable;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * Affiche la fiche activite
     */
    #[Route('/activite/{id}', name: 'app_fiche_activite')]
    public function viewActivity(Activite $activite, UserInterface $user): Response

    {

        return $this->render('activite/fiche_activite.html.twig', [
            'activite' => $activite,
            'client' => $user
        ]);
    }

    /**
     * Inscription à une activité
     *
     * @return void
     */
    #[Route('/activite/{id}/inscription', name: 'app_inscription_activite')]
    public function activityInscription(Activite $activite, UserInterface $user, InscriptionClientsActiviteRepository $inscriptionRepo)
    {

        $inscription = new InscriptionClientsActivite;
        $inscription->setClients($user);
        $inscription->setActivites($activite);
        $inscription->setInscriptionActiviteClient(new DateTimeImmutable());
        $inscriptionRepo->save($inscription, true);

        return $this->redirectToRoute('app_fiche_activite', ['id' => $activite->getId()]);
    }
}
