<?php

namespace App\Controller;

use App\Entity\Login;
use App\Form\Type\LoginType;
use App\Form\Type\AuthType;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;

use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;

class ControllerFormulaire extends AbstractController{

    private $translator;
    public function __construct(TranslatorInterface  $translator){
        $this->translator = $translator;
    }

    // Partie Inscription
    #[Route('/formulaire/inscription', name: 'formulaire_affichage')]
    public function affichage_formulaire(Request $request){
        $dataEntity = new Login();
        $form = $this->createForm(LoginType::class,$dataEntity);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $dataEntity = $form->getData();
            $dataEntity->setEmail($form['email']->getData());
            $dataEntity->setMdp($form['mdp']->getData());
            return $this->forward("App\Controller\ControllerFormulaire::Affichage_Success",["data"=> $dataEntity]);
        }
        else{
            return $this->render("formulaire.html.twig",["var"=> 1, "login"=> $form->createView(), "Message"=> '']);
        }
    }
    
    public function Affichage_Success(Login $data){
        return new Response($this->translator->trans("The information is good"));
    }

    // Partie Authentification
    #[Route('/formulaire/authentification', name: 'authentification_affichage')]
    public function affichage_authentification(Request $request){
        $dataEntity = new Login();
        $form = $this->createForm(AuthType::class,$dataEntity);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($form['email']->getData() == "theo@gmail.com" && $form['mdp']->getData() == "theo1234"){
                $Message = $this->translator->trans("Authentification Success"); 
            }
            else{
                $Message = $this->translator->trans("Email or Password isn't correct"); 
            }
            return $this->render('authentification.html.twig',['auth'=>$form->createView(),'Message' => $Message]);
        }
        else{
            $Message = "";
            return $this->render('authentification.html.twig',['auth'=>$form->createView(),'Message' => $Message]);
        }
    }
}

?>  