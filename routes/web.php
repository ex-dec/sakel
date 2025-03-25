<?php
require_once __DIR__ . '/../core/Router.php';

$router = new Router();

$router->get('/login', ['AuthController', 'loginForm']);
$router->post('/login', ['AuthController', 'login']);
$router->get('/logout', ['AuthController', 'logout']);

$router->get('/admin', ['AdminController', 'dashboard']);

$router->get('/admin/user', ['UserController', 'index']);
$router->get('/admin/user/create', ['UserController', 'create']);
$router->get('/admin/user/edit', ['UserController', 'edit']);
$router->post('/admin/user/store', ['UserController', 'store']);
$router->post('/admin/user/update', ['UserController', 'update']);
$router->post('/admin/user/delete', ['UserController', 'delete']);

$router->get('/admin/siswa', ['SiswaController', 'index']);
$router->get('/admin/siswa/create', ['SiswaController', 'create']);
$router->post('/admin/siswa/store', ['SiswaController', 'store']);
$router->get('/admin/siswa/edit', ['SiswaController', 'edit']);
$router->post('/admin/siswa/update', ['SiswaController', 'update']);
$router->post('/admin/siswa/delete', ['SiswaController', 'delete']);
return $router;
