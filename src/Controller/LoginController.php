<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Clients;
use App\Entity\Adresse;
use App\Form\AdresseFormType;
use App\Form\ClientPremiereInscriptionFormType;
use App\Repository\AdresseRepository;
use App\Repository\ClientsRepository;
use App\Repository\PrestataireRepository;
use App\Repository\TypePrestataireRepository;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout()
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

    #[Route('/inscription', name: 'premiereInscription')]
    public function premiereInscription(Request $request, ClientsRepository $clientsRepository, AdresseRepository $adresseRepository): Response
    {
        $clients = new Clients;

        $adresse = new Adresse;
        // $clients->getAdresse()->add($adresse);

        // $adresse->setClient($client);
        // $client->addAdresse($adresse);

        $form = $this->createForm(ClientPremiereInscriptionFormType::class, $clients);
        $form->handleRequest($request);

        $message = '';
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $clientsRepository->save($clients, true);
                $adresseRepository->save($adresse, true);
                return $this->redirectToRoute('app_dashboard');
            } else {
                $message = 'La saisie n\'est pas valide';
            }
        }

        return $this->render('login/premiere_inscription.html.twig', [
            'clients' => $clients,
            // 'adresse' => $adresse,
            'form_premiere_inscription' => $form->createView(),
            'message' => $message,
        ]);
    }
}
