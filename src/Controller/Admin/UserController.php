<?php

namespace App\Controller\Admin;

use App\Form\Admin\UserEdit;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/admin/user") */
class UserController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function index()
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        if (!$users) {
            throw $this->createNotFoundException(
                'No user(s) found'
            );
        }

        // return new Response('Check out this great product: '.$user->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('admin/user/listing.user.html.twig', [
            'users' => $users,
            'mainNavAdmin' => true,
            'title' => 'Liste des utilisateurs'
        ]);
    }

    /**
     * @Route("/{id}")
     */
    public function showOne($id,Request $request)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id ' . $id
            );
        }
        // 1) build the form
        $form = $this->createForm(UserEdit::class, $user);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$user->addRole("ROLE_ADMIN");
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'Votre compte à bien été enregistré.');
            //return $this->redirectToRoute('login');
        }

        return $this->render('admin/user/profil.user.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'mainNavAdmin' => true,
            'title' => 'Modification utilisateur'
        ]);
    }


}