<?php

namespace Controllers;

use MVC\Router;

class PromptsController
{

    public static function index(Router $router){
        $router->render('admin/prompts/index',[
            'titulo' => 'Prompts'

        ]);
    }

}