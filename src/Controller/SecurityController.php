<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/connexion',name: 'security.login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('page/security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    #[Route('/deconnexion', name:'security.logout')]
    public function logout()
    {

    }

    #[Route('/inscription',name:'security.registration', methods: ['GET', 'POST'])]
    public function registration(): \Symfony\Component\HttpFoundation\Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        return $this->render('page/security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}