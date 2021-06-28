<?php

namespace App\Controller;

use App\Entity\UserProfile;
use App\Form\UserProfileType;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/profile")
 */
class UserProfileController extends AbstractController
{
    /**
     * @Route("/", name="user_profile_index", methods={"GET"})
     */
    public function index(UserProfileRepository $userProfileRepository): Response
    {
        if(empty($this->get('security.token_storage')->getToken())){
            return $this->redirectToRoute('login');

        }
        $userProfile = $userProfileRepository->findOneBy([
            'account' => $this->get('security.token_storage')->getToken()->getUser()->getId()
        ]);
        return $this->render('user_profile/show.html.twig', [
            'user_profile' => $userProfile,
        ]);
    }

    /**
     * @Route("/new", name="user_profile_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userProfile = new UserProfile();
        $form = $this->createForm(UserProfileType::class, $userProfile);
        if(empty($this->get('security.token_storage')->getToken())){
            return $this->redirectToRoute('login');

        }
        $userProfile->setAccount($this->get('security.token_storage')->getToken()->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dd($form->getData());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userProfile);
            $entityManager->flush();

            return $this->redirectToRoute('user_profile_index');
        }

        return $this->render('user_profile/new.html.twig', [
            'user_profile' => $userProfile,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_profile_show", methods={"GET"})
     */
    public function show(UserProfile $userProfile): Response
    {
        return $this->render('user_profile/show.html.twig', [
            'user_profile' => $userProfile,
        ]);
    }


}
