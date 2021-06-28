<?php

namespace App\Controller;

use App\Entity\Family;
use App\Form\Family1Type;
use App\Form\FamilyType;
use App\Repository\FamilyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/family")
 */
class FamilyController extends AbstractController
{



    /**
     * @Route("/{id}", name="family_show", methods={"GET"})
     */
    public function show(Family $family): Response
    {
        return $this->render('family/show.html.twig', [
            'family' => $family,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="family_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Family $family): Response
    {
        $form = $this->createForm(FamilyType::class, $family);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile_index');
        }

        return $this->render('family/edit.html.twig', [
            'family' => $family,
            'form' => $form->createView(),
        ]);
    }


}
