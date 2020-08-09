<?php

namespace App\Controller;

use App\Entity\Physique;
use App\Form\PhysiqueType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
