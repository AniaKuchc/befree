<?php

namespace App\Controller;

use App\Repository\PrestataireRepository;
use App\Repository\TypePrestataireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        $test = 'Page d\'accueil';

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'test' => $test,
        ]);
    }
}
