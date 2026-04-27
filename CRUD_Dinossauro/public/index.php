<?php

session_start(); 

require_once __DIR__ . '/../app/core/Autoload.php';
require_once __DIR__ . '/../app/config/Config.php';

use app\core\Router;

$router = new Router();

// HOME
$router->get('/', 'DinossauroController@listarTodos');

// =========================
// DINOSSAUROS
// =========================
$router->get('/dinossauros', 'DinossauroController@listarTodos');
$router->get('/dinossauros/dinossauro', 'DinossauroController@verDinossauro');
$router->get('/dinossauros/cadastrar', 'DinossauroController@criar');

$router->post('/dinossauros/salvar', 'DinossauroController@salvar');

$router->get('/dinossauros/editar', 'DinossauroController@editar');
$router->post('/dinossauros/atualizar', 'DinossauroController@atualizar');
$router->get('/dinossauros/excluir', 'DinossauroController@excluir');

// =========================
// USUÁRIOS 
// =========================
$router->get('/usuarios', 'UsuarioController@index');
$router->get('/usuarios/cadastrar', 'UsuarioController@cadastrar');

$router->post('/usuarios/salvar', 'UsuarioController@salvar');

$router->get('/usuarios/editar', 'UsuarioController@editar');     // 🔥 ESSENCIAL
$router->post('/usuarios/atualizar', 'UsuarioController@atualizar'); // 🔥 ESSENCIAL
$router->get('/usuarios/excluir', 'UsuarioController@excluir');   // 🔥 ESSENCIAL

// =========================
// LOGIN
// =========================
$router->get('/login', 'AutenticacaoController@login');
$router->post('/logar', 'AutenticacaoController@logar');

$router->run();