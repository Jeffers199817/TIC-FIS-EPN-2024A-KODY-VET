<?php

namespace Controllers;

use MVC\Router;
use Model\Prompt;
use Classes\Paginacion;

class PromptsController
{

    public static function index(Router $router){



         if (!is_admin()) {
                header('Location: /login');
            } 


        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
  
        if (!$pagina_actual || $pagina_actual < 1) {
            header('location: /admin/prompts?page=1');
        }

        $por_pagina = 10;
        $total = Prompt::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

        $prompts = Prompt::paginar($por_pagina, $paginacion->offset());
        
          $router->render('admin/prompts/index',[
            'titulo' => 'Prompts',
            'prompts' => $prompts,
            'paginacion' => $paginacion->paginacion()


]);
    }

    public static function crear(Router $router)
    {
         if (!is_admin()) {
                header('Location: /login');
            }
        $alertas = [];
        $prompt = new Prompt;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

             if (!is_admin()) {
                header('Location: /login');
            }

            $prompt->sincronizar($_POST);
            $alertas = $prompt->validar();

            if (empty($alertas)) {
                $resultado = $prompt->guardar();

                if ($resultado) {
                    header('Location: /admin/prompts');
                    return;
                }
            }
        }

        $router->render('admin/prompts/crear', [
            'titulo' => 'Registrar Prompts',
            'alertas' => $alertas,
            'prompt' => $prompt
        ]);
    }

    public static function editar(Router $router)
    {
        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /admin/prompts');
        }

        $prompt = Prompt::find($id);
        if(!$prompt) {
            header('Location: /admin/prompts');
        }
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {

             if (!is_admin()) {
                header('Location: /login');
            }

            $prompt->sincronizar($_POST);
            $alertas = $prompt->validar();

            if (empty($alertas)) {
                $resultado = $prompt->guardar();

                if ($resultado) {
                    header('Location: /admin/prompts');
                    return;
                }
            }
        }

        $router->render('admin/prompts/editar', [
            'titulo' => 'Editar Prompts',
            'alertas' => $alertas,
            'prompt' => $prompt
        ]);
    }

     public static function eliminar(Router $router)
    {
        // condición para no entrar a enlaces si no eres admin
        if (!is_admin()) {
            header('Location: /login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // condición para no entrar a enlaces si no eres admin
            if (!is_admin()) {
                header('Location: /login');
            }

            $id = $_POST['id'];
            $prompt = Prompt::find($id);
            if (!isset($evento)) {
                header('location: /admin/prompts');
            }

            $resultado = $prompt->eliminar();

            if ($resultado) {
                header('location: /admin/prompts');
            }
        }
    }
}
