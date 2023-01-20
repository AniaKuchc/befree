<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Entity\SouscriptionClientOffre;
use App\Form\AdresseFormType;
use App\Repository\AdresseRepository;
use App\Repository\OffreRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ProfilController extends AbstractController
{
    private $userPasswordHasherInterface;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    #[Route('/profil/update/{id}', name: 'app_update_profil')]
    public function updateProfil(Clients $clients, Request $request, OffreRepository $offreRepository, AdresseRepository $adresseRepository): Response
    {
        $adresse = $clients->getAdresse();
        $form = $this->createForm(AdresseFormType::class, $adresse);
        $form->handleRequest($request);
        $message = '';
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
                return $this->redirectToRoute('app_profil');
            } else {
                $message = 'La saisie n\'est pas valide';
            }
        }


        return $this->render('login/adresse_inscription.html.twig', [
            'form_adresse_inscription' => $form,
            'message' => $message,
            'adresse' => $adresse,

        ]);
    }

    #[Route('/profil', name: 'app_profil')]
    public function edit(UserInterface $user, AdresseRepository $adresseRepository): Response
    {

        return $this->render('profil/profil.html.twig', [
            'user' => $user,
        ]);
    }
}
