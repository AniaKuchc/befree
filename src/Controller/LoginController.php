<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Clients;
use App\Entity\Adresse;
use App\Entity\Offre;
use App\Entity\SouscriptionClientOffre;
use App\Form\AdresseFormType;
use App\Form\ClientsUserFormType;
use App\Repository\AdresseRepository;
use App\Repository\ClientsRepository;
use App\Repository\OffreRepository;
use App\Repository\PrestataireRepository;
use App\Repository\TypePrestataireRepository;
use DateTime;
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

    #[Route('/inscription', name: 'app_premiere_inscription')]
    public function adresseInscription(Request $request, OffreRepository $offreRepository, ClientsRepository $clientsRepository, AdresseRepository $adresseRepository): Response
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

                //Ajout souscription offre
                $selectedOffre = $form['clients'][0]['selectedOffre']->getData();
                $souscription = new SouscriptionClientOffre;
                $dateFin = new DateTime('now');
                $dateFin->modify('+30 day');
                $souscription->setDebutSouscription(new DateTime())
                    ->setFinSouscription($dateFin)
                    ->setClients($clients)
                    ->setOffres($offreRepository->find($selectedOffre));
                $clients->addSouscriptionClientOffre($souscription);

                $clients->setAdresse($adresse);
                $adresseRepository->save($adresse, true);
                return $this->redirectToRoute('app_premiere_inscription');
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
