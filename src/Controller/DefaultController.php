<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\PrestataireRepository;
use App\Repository\TypePrestataireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(TypePrestataireRepository $TypePrestataireRepository): Response
    {
        $test = 'Page d\'accueil';

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'test' => $test,
        ]);
    }

    #[Route('/inscription', name: 'premiere_inscription')]
    public function premiereInscription(Request $request): Response  //$adresse ?
    {
        $client = new Client;
        $form = $this->createForm(ClientPremiereInscriptionFormType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            dump($client);
        }

        return $this->render('inscription/index.html.twig', [
            'form_premiere_inscription' => $form->createView(),
        ]);
    }
}
