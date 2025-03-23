<?php
require_once __DIR__ . '/../core/Router.php';

$router = new Router();

$router->get('/', ['UserController', 'index']);
$router->get('/user', ['UserController', 'index']);
$router->get('/user/create', ['UserController', 'create']);
$router->get('/user/edit', ['UserController', 'edit']);

$router->post('/user/store', ['UserController', 'store']);
$router->post('/user/update', ['UserController', 'update']);
$router->get('/user/delete', ['UserController', 'delete']);

return $router;
