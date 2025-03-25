<?php
require_once __DIR__ . '/../core/Router.php';

$router = new Router();

$router->get('/login', ['AuthController', 'loginForm']);
$router->post('/login', ['AuthController', 'login']);
$router->get('/logout', ['AuthController', 'logout']);

$router->get('/', ['UserController', 'index']);
$router->get('/user', ['UserController', 'index']);
$router->get('/user/create', ['UserController', 'create']);
$router->get('/user/edit', ['UserController', 'edit']);

$router->get('/admin', ['AdminController', 'dashboard']);

$router->post('/user/store', ['UserController', 'store']);
$router->post('/user/update', ['UserController', 'update']);
$router->post('/user/delete', ['UserController', 'delete']);

return $router;
