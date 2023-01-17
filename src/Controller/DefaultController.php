<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Adresse;
use App\Form\AdresseFormType;
use App\Form\ClientPremiereInscriptionFormType;
use App\Repository\PrestataireRepository;
use App\Repository\TypePrestataireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/inscription', name: 'premiereInscription')]
    public function premiereInscription(Request $request): Response  //$adresse ?
    {
        $client = new Client;
        // $client->addAdresse($adresse);        
        $adresse = new Adresse;
        // $client->getAdresse()->addAdresseClient($adresse);

        $form = $this->createForm(ClientPremiereInscriptionFormType::class, $client);
        $form->handleRequest($request);

        return $this->render('default/premiere_inscription.html.twig', [
            'form_premiere_inscription' => $form->createView(),
        ]);
    }
}
