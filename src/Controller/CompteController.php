<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;
use App\Repository\CompteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte/new", name="compte_new")
     */
    public function new(Request $request): Response
    {
        $compte = new Compte();
        $form = $this->createForm(CompteType::class, $compte);
        // traitement du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // if($request->request->get('moral') != 0){

            // }
            $em = $this->getDoctrine()->getManager();
            $em->persist($compte);
            $em->flush();
            return $this->redirectToRoute('compte_show');
        }
        return $this->render('compte/new.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/compte/show", name="compte_show")
     */
    public function show(CompteRepository $repo)
    {
        $comptes = $repo->findAll();
        return $this->render(
            'compte/show.html.twig',
            [
                'comptes' => $comptes,
            ]
        );
    }

    /**
     * @Route("/compte/{id}/edit", name="compte_edit")
     */
    public function edit(Compte $compte, Request $request): Response
    {
        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('compte_show');
        }

        return $this->render('compte/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/compte/{id}/delete", name="compte_delete")
     */
    public function delete(Compte $compte): RedirectResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($compte);
        $entityManager->flush();

        return $this->redirectToRoute('compte_show');
    }
}
