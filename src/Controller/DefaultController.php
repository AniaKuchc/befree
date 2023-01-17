<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Adresse;
use App\Form\AdresseFormType;
use App\Form\ClientPremiereInscriptionFormType;
use App\Repository\AdresseRepository;
use App\Repository\ClientRepository;
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
    public function premiereInscription(Request $request): Response
    //Client $client, Adresse $adresse, ClientRepository $clientRepositoty, AdresseRepository $adresseRepository
    {
        $client = new Client;

        $adresse = new Adresse;
        $client->getAdresse()->add($adresse);
        // $adresse->setClient($client);
        // $client->addAdresse($adresse);

        $form = $this->createForm(ClientPremiereInscriptionFormType::class, $client);
        $form->handleRequest($request);

        // $message = '';
        if ($form->isSubmitted()) {
            // L'URL est appelé suite au click sur le bouton submit,
            // sinon l'URL est appelé suite à un click dans un lien par exemple
            if ($form->isValid()) {
                // $clientRepositoty->save($client, true);
                // $adresseRepository->save($adresse, true);
                // return $this->redirectToRoute('/');
            } else {
                echo 'La saisie n\'est pas valide';
            }
        }

        return $this->render('default/premiere_inscription.html.twig', [
            'form_premiere_inscription' => $form->createView(),
        ]);
    }
}
