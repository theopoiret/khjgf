<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Acceuil extends AbstractController{

    #[Route('/', name: 'kernel_controller', defaults: ['ouverture' => "7/23"])]
    public function home(){
        return $this->render('ouverture.html.twig');
    }
}

?>