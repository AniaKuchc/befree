<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Repository\ActiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * Affiche la liste des conférences
     */
    #[Route('/activite/{id}', name: 'app_fiche_activite')]
    public function show(Activite $activite, ActiviteRepository $activiteRepository, Request $request): Response
    {


        return $this->render('activite/fiche_activite.html.twig', [
            'activite' => $activite,
        ]);
    }
}
