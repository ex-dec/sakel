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

$router->get('/admin/kelas', ['KelasController', 'index']);
$router->get('/admin/kelas/create', ['KelasController', 'create']);
$router->get('/admin/kelas/edit', ['KelasController', 'edit']);
$router->post('/admin/kelas/store', ['KelasController', 'store']);
$router->post('/admin/kelas/update', ['KelasController', 'update']);
$router->post('/admin/kelas/delete', ['KelasController', 'delete']);

$router->get('/admin/siswa', ['SiswaController', 'index']);
$router->get('/admin/siswa/create', ['SiswaController', 'create']);
$router->post('/admin/siswa/store', ['SiswaController', 'store']);
$router->get('/admin/siswa/edit', ['SiswaController', 'edit']);
$router->post('/admin/siswa/update', ['SiswaController', 'update']);
$router->post('/admin/siswa/delete', ['SiswaController', 'delete']);

$router->get('/admin/absensi', ['AbsensiController', 'kelas']);
$router->get('/admin/absensi/tgl', ['AbsensiController', 'tgl']);
$router->get('/admin/absensi/index', ['AbsensiController', 'index']);

$router->get('/admin/mapel', ['MapelController', 'index']);
$router->get('/admin/mapel/create', ['MapelController', 'create']);
$router->get('/admin/mapel/edit', ['MapelController', 'edit']);
$router->post('/admin/mapel/store', ['MapelController', 'store']);
$router->post('/admin/mapel/update', ['MapelController', 'update']);
$router->post('/admin/mapel/delete', ['MapelController', 'delete']);

$router->get('/admin/materi', ['MateriController', 'index']);
$router->get('/admin/materi/create', ['MateriController', 'create']);
$router->get('/admin/materi/edit', ['MateriController', 'edit']);
$router->post('/admin/materi/store', ['MateriController', 'store']);
$router->post('/admin/materi/update', ['MateriController', 'update']);
$router->post('/admin/materi/delete', ['MateriController', 'delete']);

$router->get('/admin/tugas', ['TugasController', 'index']);
$router->get('/admin/tugas/create', ['TugasController', 'create']);
$router->get('/admin/tugas/edit', ['TugasController', 'edit']);
$router->post('/admin/tugas/store', ['TugasController', 'store']);
$router->post('/admin/tugas/update', ['TugasController', 'update']);
$router->post('/admin/tugas/delete', ['TugasController', 'delete']);

return $router;
