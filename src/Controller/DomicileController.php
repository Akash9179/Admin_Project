<?php

namespace App\Controller;

use App\Entity\Domicile;
use App\Form\Domicile1Type;
use App\Form\DomicileType;
use App\Repository\DomicileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/domicile")
 */
class DomicileController extends AbstractController
{



    /**
     * @Route("/{id}", name="domicile_show", methods={"GET"})
     */
    public function show(Domicile $domicile): Response
    {
        return $this->render('domicile/show.html.twig', [
            'domicile' => $domicile,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="domicile_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Domicile $domicile): Response
    {
        $form = $this->createForm(DomicileType::class, $domicile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile_index');
        }

        return $this->render('domicile/edit.html.twig', [
            'domicile' => $domicile,
            'form' => $form->createView(),
        ]);
    }


}
