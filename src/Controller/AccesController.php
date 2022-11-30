<?php

namespace App\Controller;

use App\EventListener\ExceptionListener;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

class AccesController extends AbstractController{

    private $requete;
    public function __construct(RequestStack $requete){
        $this->requestStack  = $requete;
    }

    public function onKernelController(ControllerEvent $event){
        $route = $this->requestStack->getCurrentRequest()->get('_route_params');

        if (isset($route["ouverture"])){
            $heure = explode("/", $route['ouverture']);

            if (!(date('G') > $heure[0]) || !(date('G') < $heure[1])) {

                $event->stopPropagation();
                $event->setController(function () {
                    return $this->render('fermeture.html.twig');
                });
            }
        }

    }

}

?>