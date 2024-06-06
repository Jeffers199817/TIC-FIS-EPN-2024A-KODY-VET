<?php

namespace Controllers;

use MVC\Router;

class PaginasController
{
    public static function login(Router $router)
    {
        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);
    }
     public static function chatdog(Router $router)
    {
        $router->render('paginas/chatdog', [
            'titulo' => 'Chat Dog'
        ]);
    }


    public static function evento(Router $router)
    {
        $router->render('paginas/milenyumdog', [
            'titulo' => 'Sobre Milenyum-Dog'
        ]);
    }

    public static function paquetes(Router $router)
    {
        $router->render('paginas/paquetes', [
            'titulo' => 'Paquetes Milenyum-Dog'
        ]);
    }

        public static function conferencias(Router $router)
    {
        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias & Workshops'
        ]);
    }
}
