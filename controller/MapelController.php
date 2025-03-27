<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Mapel.php';
require_once __DIR__ . '/../model/Kelas.php';

class MapelController
{
    private $mapel;
    private $kelas;
    private $active;

    public function __construct()
    {
        $pdo = Database::connect();
        $this->mapel = new Mapel($pdo);
        $this->kelas = new Kelas($pdo);
        $this->active = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function index()
    {
        $data = $this->mapel->getAll();
        include __DIR__ . '/../view/admin/mapel/index.php';
    }

    public function indexKelas()
    {
        $data = $this->kelas->getAll();
        include __DIR__ . '/../view/admin/mapel/indexKelas.php';
    }

    public function create()
    {
        $kelas = $this->kelas->getAll();
        include __DIR__ . '/../view/admin/mapel/create.php';
    }

    public function store()
    {
        $this->mapel->create($_POST);
        header('Location: /admin/mapel');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $mapel = $this->mapel->getById($id);
        $kelas = $this->kelas->getAll();
        include __DIR__ . '/../view/admin/mapel/edit.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        $this->mapel->update($id, $_POST);
        header('Location: /admin/mapel');
    }

    public function delete()
    {
        $this->mapel->delete($_POST['id']);
        header('Location: /admin/mapel');
    }

    public function isActive($active)
    {
        return $this->active === $active ? 'active' : '';
    }
}
