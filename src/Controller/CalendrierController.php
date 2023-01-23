<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Personnels;
use App\Repository\ActiviteRepository;
use App\Repository\PersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class CalendrierController extends AbstractController
{
    #[Route('/calendrier', name: 'app_calendrier')]
    public function show(ActiviteRepository $activiteRepository, PersonnelsRepository $PersonnelsRepository): Response
    {

        return $this->render('calendrier/calendrier.html.twig', [
            'controller_name' => 'CalendrierController',
            'activites' => $activiteRepository->findActivities()


        ]);
    }
}
