<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(UserInterface $user): Response
    {
        return $this->render('profil/profil.html.twig', [
            'controller_name' => 'ProfilController',
            'user' => $user,
        ]);
    }
}
