<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Materi.php';
require_once __DIR__ . '/../model/Mapel.php';

class MateriController
{
    private $materi;
    private $mapel;
    private $active;

    public function __construct()
    {
        $pdo = Database::connect();
        $this->materi = new Materi($pdo);
        $this->mapel = new Mapel($pdo);
        $this->active = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function index()
    {
        $data = $this->materi->getAll();
        include __DIR__ . '/../view/admin/materi/index.php';
    }

    public function create()
    {
        $mapel = $this->mapel->getAll();
        include __DIR__ . '/../view/admin/materi/create.php';
    }

    public function store()
    {
        $this->materi->create($_POST);
        header('Location: /admin/materi');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $data = $this->materi->getById($id);
        $mapel = $this->mapel->getAll();
        include __DIR__ . '/../view/admin/materi/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $this->materi->update($id, $_POST);
        header('Location: /admin/materi');
    }

    public function delete()
    {
        $this->materi->delete($_POST['id']);
        header('Location: /admin/materi');
    }

    public function isActive($active)
    {
        return $this->active === $active ? 'active' : '';
    }
}
