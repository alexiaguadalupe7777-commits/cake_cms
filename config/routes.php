<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {

    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {

        // Página principal
        $builder->connect('/', [
            'controller' => 'Articles',
            'action' => 'index',
        ]);

        // Login
        $builder->connect('/login', [
            'controller' => 'Users',
            'action' => 'login',
        ]);

        // Logout
        $builder->connect('/logout', [
            'controller' => 'Users',
            'action' => 'logout',
        ]);

        // Tags
        $builder->scope('/articles', function (RouteBuilder $builder) {
            $builder->connect('/tagged/*', [
                'controller' => 'Articles',
                'action' => 'tags',
            ]);
        });

        // Rutas automáticas
        $builder->fallbacks();
    });
};