<?php

namespace App\Controller;

use App\Entity\Moral;
use App\Form\MoralType;
use App\Repository\MoralRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoralController extends AbstractController
{
    /**
     * @Route("/moral/new", name="moral_new")
     */
    public function new(Request $request): Response
    {
        $moral = new Moral();
        $form = $this->createForm(MoralType::class, $moral);
        // traitement du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($moral);
            $em->flush();
            return $this->redirectToRoute('moral_show');
        }
        return $this->render('moral/new.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/moral/show", name="moral_show")
     */
    public function show(MoralRepository $repo)
    {
        $morals = $repo->findAll();
        return $this->render(
            'moral/show.html.twig',
            [
                'morals' => $morals,
            ]
        );
    }

    /**
     * @Route("/moral/{id}/edit", name="moral_edit")
     */
    public function edit(Moral $moral, Request $request): Response
    {
        $form = $this->createForm(MoralType::class, $moral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('moral_show');
        }

        return $this->render('moral/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/moral/{id}/delete", name="moral_delete")
     */
    public function delete(Moral $moral): RedirectResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($moral);
        $entityManager->flush();

        return $this->redirectToRoute('moral_show');
    }
}
