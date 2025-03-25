<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Siswa.php';
require_once __DIR__ . '/../model/Kelas.php';

class SiswaController
{
    private $siswa;
    private $kelas;
    private $active;

    public function __construct()
    {
        $pdo = Database::connect();
        $this->siswa = new Siswa($pdo);
        $this->kelas = new Kelas($pdo);
        $this->active = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function index()
    {
        $data = $this->siswa->getAll();
        include __DIR__ . '/../view/siswa/index.php';
    }

    public function create()
    {
        $kelas = $this->kelas->getAll();
        include __DIR__ . '/../view/siswa/create.php';
    }

    public function store()
    {
        $this->siswa->create($_POST);
        header('Location: /admin/siswa');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $siswa = $this->siswa->getById($id);
        $kelas = $this->kelas->getAll();
        include __DIR__ . '/../view/siswa/edit.php';
    }

    public function update()
    {
        $this->siswa->update($_POST);
        header('Location: /admin/siswa');
    }

    public function delete()
    {
        $this->siswa->delete($_POST['id']);
        header('Location: /admin/siswa');
    }

    public function isActive($active)
    {
        return $this->active === $active ? 'active' : '';
    }
}
