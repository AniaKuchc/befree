<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Clients;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil/{id}', name: 'app_profil')]
    public function edit(Clients $clients, Adresse $adresse, Request $request): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        if ($this->getUser() === $clients) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(AdresseFormType::class);
        $form->handleRequest($request);

        return $this->render('profil/profil.html.twig', [
            'form_adresse_inscription' => $form->createView(),
        ]);
    }
}

// public function find($id, $lockMode = null, $lockVersion = null)    {        return $this->_em->find($this->_entityName, $id, $lockMode, $lockVersion);    }