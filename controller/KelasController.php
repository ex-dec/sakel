<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Kelas.php';

class KelasController
{
    private $kelas;
    private $active;

    public function __construct()
    {
        $pdo = Database::connect();
        $this->kelas = new Kelas($pdo);
        $this->active = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function index()
    {
        $data = $this->kelas->getAll();
        include __DIR__ . '/../view/admin/kelas/index.php';
    }

    public function create()
    {
        include __DIR__ . '/../view/admin/kelas/create.php';
    }

    public function store()
    {
        $this->kelas->create($_POST);
        header('Location: /admin/kelas');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $kelas = $this->kelas->getById($id);
        include __DIR__ . '/../view/admin/kelas/edit.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        $this->kelas->update($id, $_POST);
        header('Location: /admin/kelas');
    }

    public function delete()
    {
        $this->kelas->delete($_POST['id']);
        header('Location: /admin/kelas');
    }

    public function isActive($active)
    {
        return $this->active === $active ? 'active' : '';
    }
}
