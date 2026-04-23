<?php

require_once __DIR__ . '/../app/core/Autoload.php';
require_once __DIR__ . '/../app/config/Config.php';

use app\core\Router;

$router = new Router();

$router->get('/', 'ModuloController@listarTodos');
$router->get('/modulos', 'ModuloController@listarTodos');
$router->get('/modulos/modulo', 'ModuloController@listarModulo');

//Modulos
$router->get('/modulos/cadastrar', 'ModuloController@criar');
$router->post('/modulos/salvar', 'ModuloController@salvar');
$router->get('/modulos/editar', 'ModuloController@editar');
$router->post('/modulos/atualizar', 'ModuloController@atualizar');
$router->get('/modulos/excluir', 'ModuloController@excluir');

//Fases
$router->get('/fases/fases_list', 'FaseController@listarFases');  // Nova rota para listagem de fases por módulo
$router->get('/fases/cadastrar', 'FaseController@criar');
$router->post('/fases/salvar', 'FaseController@salvar');
$router->get('/fases/editar', 'FaseController@editar');
$router->post('/fases/atualizar', 'FaseController@atualizar');
$router->get('/fases/excluir', 'FaseController@excluir');

$router->run();