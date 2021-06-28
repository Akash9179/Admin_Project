<?php

namespace App\Controller;

use App\Entity\Education;
use App\Form\Education1Type;
use App\Form\EducationType;
use App\Repository\EducationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/education")
 */
class EducationController extends AbstractController
{




    /**
     * @Route("/{id}", name="education_show", methods={"GET"})
     */
    public function show(Education $education): Response
    {
        return $this->render('education/show.html.twig', [
            'education' => $education,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="education_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Education $education): Response
    {
        $form = $this->createForm(EducationType::class, $education);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile_index');
        }

        return $this->render('education/edit.html.twig', [
            'education' => $education,
            'form' => $form->createView(),
        ]);
    }


}
