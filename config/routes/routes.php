<?php
use App\Controller\BlogController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('client_php', '/client/prenom/php/{nom}')
        ->controller([\App\Controller\ClientController::class, 'info'])
        ->requirements(['nom' => '^[A-Za-z]+(?:-?[A-Za-z]+)+$'])
    ;
};