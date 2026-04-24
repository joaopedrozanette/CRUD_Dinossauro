<?php

require_once __DIR__ . '/../app/core/Autoload.php';
require_once __DIR__ . '/../app/config/Config.php';

use app\core\Router;

$router = new Router();

$router->get('/', 'JogadorController@listarTodos');

// Jogador Routes
$router->get('/jogadores', 'JogadorController@listarTodos');
$router->get('/jogadores/jogador', 'JogadorController@verJogador');
$router->get('/jogadores/cadastrar', 'JogadorController@criar');

$router->post('/jogadores/salvar', 'JogadorController@salvar');
$router->get('/jogadores/editar', 'JogadorController@editar');
$router->post('/jogadores/atualizar', 'JogadorController@atualizar');
$router->get('/jogadores/excluir', 'JogadorController@excluir');


$router->get('/usuarios', 'UsuarioController@index');
$router->get('/usuarios/cadastrar', 'UsuarioController@cadastrar');
$router->post('/usuarios/salvar', 'UsuarioController@salvar');
$router->get('/usuarios/editar', 'UsuarioController@editar');
$router->post('/usuarios/atualizar', 'UsuarioController@atualizar');
$router->get('/usuarios/excluir', 'UsuarioController@excluir');

//Autenticacao
$router->get('/login', 'AutenticacaoController@login');
$router->post('/logar', 'AutenticacaoController@logar');



$router->get('/dinossauros', 'DinossauroController@index');
$router->get('/dinossauros/ver', 'DinossauroController@show');

// Rotas Protegidas (Sugerido usar o middleware de Auth se o projeto suportar)
$router->post('/dinossauros/cadastrar', 'DinossauroController@store');
$router->get('/dinossauros/editar', 'DinossauroController@edit');
$router->post('/dinossauros/atualizar', 'DinossauroController@update');
$router->get('/dinossauros/excluir', 'DinossauroController@delete');

$router->get('/teste', 'JogadorController@redirecionarTeste');


$router->run();
