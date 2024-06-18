<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIEventos;
use Controllers\APIRegalos;
use Controllers\APIPonentes;
use Controllers\AuthController;
use Controllers\EventosController;
use Controllers\PaginasController;
use Controllers\PromptsController;
use Controllers\RegalosController;
use Controllers\PonentesController;
use Controllers\RegistroController;
use Controllers\DashboardController;
use Controllers\RegistradosController;

$router = new Router();

// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Area de administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);
$router->get('/admin/ponentes', [PonentesController::class, 'index']);

// ponentes crear
$router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);

// ponentes editar
$router->get('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/editar', [PonentesController::class, 'editar']);

// ponenetes eliminar
$router->get('/admin/ponentes/eliminar', [PonentesController::class, 'eliminar']);
$router->post('/admin/ponentes/eliminar', [PonentesController::class, 'eliminar']);

// eventos
$router->get('/admin/eventos', [EventosController::class, 'index']);
$router->get('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->post('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->get('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/eliminar', [EventosController::class, 'eliminar']);

// Api para horario

$router->get('/api/eventos-horario', [APIEventos::class, 'index']);

// Api ponentes

$router->get('/api/ponentes', [APIPonentes::class, 'index']);
$router->get('/api/ponente', [APIPonentes::class, 'ponente']);

//Api Registrados
$router->get('/admin/registrados', [RegistradosController::class, 'index']);

//CHAT DOG
//Api Prompts
$router->get('/admin/prompts', [PromptsController::class, 'index']);
$router->get('/admin/prompts/crear', [PromptsController::class, 'crear']);
$router->post('/admin/prompts/crear', [PromptsController::class, 'crear']);
$router->get('/admin/prompts/editar', [PromptsController::class, 'editar']);
$router->post('/admin/prompts/editar', [PromptsController::class, 'editar']);
$router->post('/admin/prompts/eliminar', [PromptsController::class, 'eliminar']);


//Api Regalos
$router->get('/admin/regalos', [RegalosController::class, 'index']);
$router->get('/api/regalos', [APIRegalos::class, 'index']);

//Registro de Usuarios
$router->get('/finalizar-registro', [RegistroController::class, 'crear']);

//Boleto Gratis
$router->post('/finalizar-registro/gratis', [RegistroController::class, 'gratis']);

//Boleto Presencial

$router->post('/finalizar-registro/pagar', [RegistroController::class, 'pagar']);

//Conferencias
$router->get('/finalizar-registro/conferencias', [RegistroController::class, 'conferencias']);
$router->post('/finalizar-registro/conferencias', [RegistroController::class, 'conferencias']);

//Boleto Virtual

$router->get('/boleto', [RegistroController::class, 'boleto']);

// Área Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/chat-dog', [PaginasController::class, 'chatdog']);
$router->get('/milenyum-dog', [PaginasController::class, 'evento']);
$router->get('/paquetes', [PaginasController::class, 'paquetes']);
$router->get('/conferencias-workshops', [PaginasController::class, 'conferencias']);

//Error 404
$router->get('/404', [PaginasController::class, 'error']);

$router->comprobarRutas();
