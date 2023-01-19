<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Clients;
use App\Entity\Adresse;
use App\Form\AdresseFormType;
use App\Form\ClientsUserFormType;
use App\Repository\AdresseRepository;
use App\Repository\ClientsRepository;
use App\Repository\PrestataireRepository;
use App\Repository\TypePrestataireRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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

    private $userPasswordHasherInterface;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    #[Route('/inscription', name: 'premiereInscription')]
    public function adresseInscription(Request $request, ClientsRepository $clientsRepository, AdresseRepository $adresseRepository): Response
    {
        $adresse = new Adresse;
        $clients = new Clients;
        $adresse->getClients()->add($clients);

        $form = $this->createForm(AdresseFormType::class, $adresse);
        $form->handleRequest($request);
        $message = '';
        // $id = $adresseRepository->findAdresses();
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $clients->setPassword(
                    $this->userPasswordHasherInterface->hashPassword(
                        $clients,
                        $clients->getPassword()
                    )
                );
                $clients->setAdresse($adresse);
                $adresseRepository->save($adresse, true);
                return $this->redirectToRoute('successInscription');
            } else {
                $message = 'La saisie n\'est pas valide';
            }
        }

        return $this->render('login/adresse_inscription.html.twig', [
            'form_adresse_inscription' => $form,
            'message' => $message,
        ]);
    }

    #[Route('/success', name: 'successInscription')]
    public function successInscription(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/success_inscription.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
