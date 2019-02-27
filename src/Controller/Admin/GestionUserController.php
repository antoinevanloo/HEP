<?php

namespace App\Controller\Admin;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/admin/gestion-utilisateurs") */
class GestionUserController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('admin/gestionuser/index.html.twig', ['mainNavAdmin' => true, 'title' => 'Gestion des utilisateurs']);
    }

    /**
     * @Route("/user/{id}", name="user_show")
     */
    public function show($id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id ' . $id
            );
        }

        // return new Response('Check out this great product: '.$user->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('admin/gestionuser/profil.user.html.twig', [
            'user' => $user,
            'mainNavAdmin' => true,
            'title' => 'Espace Admin'
        ]);
    }

    /**
     * @Route("/user/", name="user_show_all")
     */
    public function showAll()
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
        return $this->render('admin/gestionuser/listing.user.html.twig', [
            'users' => $users,
            'mainNavAdmin' => true,
            'title' => 'Liste des utilisateurs'
        ]);
    }

}