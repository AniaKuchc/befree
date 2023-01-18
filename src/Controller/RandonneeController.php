<?php

namespace App\Controller;

use App\Entity\Randonnee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RandonneeController extends AbstractController
{
    #[Route('/randonnee', name: 'app_randonnee')]
    public function index(): Response
    {
        return $this->render('randonnee/index.html.twig', [
            'controller_name' => 'RandonneeController',
        ]);
    }

    /**
     * Affiche la fiche randonnee
     */
    #[Route('/randonnee/{id}', name: 'app_fiche_randonnee')]
    public function viewRandonnee(Randonnee $randonnee): Response
    {

        return $this->render('randonnee/fiche_randonnee.html.twig', [
            'randonnee' => $randonnee,
        ]);
    }
}
