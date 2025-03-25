<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Materi.php';

class MateriController{
    private $materi;

    public function __construct(){
        $pdo = Database::connect();
        $this->materi = new Materi($pdo);
    }

    public function index(){
        $materi = $this->materi->getAllWithMapel();
        include __DIR__ . '/../view/materi/index.php';
    }

    public function create(){
        $stmt = $this->pdo->query("SELECT * FROM mapel");
        $mapel = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../view/materi/create.php';
    }

    public function store() {
        if (!empty($_POST['name']) && !empty($_POST['link']) && !empty($_POST['description']) && !empty($_POST['mapel_id'])) {
            $this->materi->create($_POST);
            header('Location: /materi'); 
        } else {
            echo "Semua field harus diisi!";
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $materi = $this->materi->getById($id);

        $stmt = $this->pdo->query("SELECT * FROM mapel");
        $mapel = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../view/materi/edit.php';
    }
    
    public function update()
    {
        $id = $_GET['id'];
        if (!empty($_POST['name']) && !empty($_POST['link']) && !empty($_POST['description']) && !empty($_POST['mapel_id'])) {
            $this->materi->update($id,$_POST);
            header('Location: /materi'); 
        } else {
            echo "Semua field harus diisi!";
        }
    }

    public function delete()
    {
        $this->materi->delete($_POST['id']);
        header('Location:/materi');
    }
}