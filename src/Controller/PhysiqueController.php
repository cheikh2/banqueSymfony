<?php

namespace App\Controller;

use App\Entity\Physique;
use App\Form\PhysiqueType;
use App\Repository\PhysiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhysiqueController extends AbstractController
{
    /**
     * @Route("/physique/new", name="physique_new")
     */
    public function new(Request $request): Response
    {
        $physique = new Physique();
        $form = $this->createForm(PhysiqueType::class, $physique);
        // traitement du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($physique);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('physique/new.html.twig', [
            "form" => $form->createView()
        ]);
    }

     /**
     * @Route("/physique/show", name="physique_show")
     */
    public function show(PhysiqueRepository $repo)
    {
        $physiques = $repo->findAll();
        return $this->render(
            'physique/show.html.twig',
            [
                'physiques' => $physiques,
            ]
        );
    }

    /**
     * @Route("/physique/{id}/edit", name="physique_edit")
     */
    public function edit(Physique $physique, Request $request):Response
    {
        $form = $this->createForm(PhysiqueType::class, $physique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('physique_show');
        }

        return $this->render('physique/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/physique/{id}/delete", name="physique_delete")
     */
    public function delete(Physique $physique):RedirectResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
           $entityManager->remove($physique);
           $entityManager->flush();

           return $this->redirectToRoute('physique_show');
    }
}
