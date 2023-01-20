<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Clients;
use App\Repository\AdresseRepository;
use App\Repository\ClientsRepository;
use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function edit(): Response
    {
        // if (!$this->getUser()) {
        //     return $this->redirectToRoute('app_login');
        // }

        // if ($this->getUser() === $clients) {
        //     return $this->redirectToRoute('app_login');
        // }

        // $form = $this->createForm(AdresseFormType::class);
        // $form->handleRequest($request);

        return $this->render('profil/profil.html.twig', [
            // 'form_adresse_inscription' => $form->createView(),
        ]);
    }

    // #[Route('/profil', name: 'app_profil')]
    // private function updateProfil(Clients $clients, Request $request, OffreRepository $offreRepository, ClientsRepository $clientsRepository, AdresseRepository $adresseRepository): Response
    // {
    //     $form = $this->createForm(AdresseFormType::class, $adresse);
    //     $form->handleRequest($request);
    //     $message = '';
    //     // $id = $adresseRepository->findAdresses();
    //     if ($form->isSubmitted()) {
    //         if ($form->isValid()) {
    //             $clients->setPassword(
    //                 $this->userPasswordHasherInterface->hashPassword(
    //                     $clients,
    //                     $clients->getPassword()
    //                 )
    //             );

    //             //Ajout souscription offre
    //             $selectedOffre = $form['clients'][0]['selectedOffre']->getData();
    //             $souscription = new SouscriptionClientOffre;
    //             $dateFin = new DateTime('now');
    //             $dateFin->modify('+30 day');
    //             $souscription->setDebutSouscription(new DateTime())
    //                 ->setFinSouscription($dateFin)
    //                 ->setClients($clients)
    //                 ->setOffres($offreRepository->find($selectedOffre));
    //             $clients->addSouscriptionClientOffre($souscription);

    //             $clients->setAdresse($adresse);
    //             $adresseRepository->save($adresse, true);
    //             return $this->redirectToRoute('app_premiere_inscription');
    //         } else {
    //             $message = 'La saisie n\'est pas valide';
    //         }
    //     }


    //     return $this->render('login/adresse_inscription.html.twig', [
    //         'form_adresse_inscription' => $form,
    //         'message' => $message,

    //     ]);
    // }
}

// public function find($id, $lockMode = null, $lockVersion = null)    {        return $this->_em->find($this->_entityName, $id, $lockMode, $lockVersion);    }