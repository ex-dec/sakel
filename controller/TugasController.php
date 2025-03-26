<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Tugas.php';

class TugasController{
    private $tugas;

    public function __construct(){
        $this->pdo = Database::connect();
        $this->tugas = new Tugas($this->pdo);
    }

    public function index(){
        $tugas = $this->tugas->getAllWithMapel();
        include __DIR__ . '/../view/tugas/index.php';
    }

    public function create(){
        $stmt = $this->pdo->query("SELECT * FROM mapel");
        $tugas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../view/tugas/create.php';
    }

    public function store() {
        if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['lampiran']) && !empty($_POST['mapel_id'])) {
            $this->tugas->create($_POST);
            header('Location: /tugas'); 
        } else {
            echo "Semua field harus diisi!";
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $tugas = $this->tugas->getById($id);

        $stmt = $this->pdo->query("SELECT * FROM mapel");
        // cek hasil query

        $mapelList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($mapelList); exit();
        include __DIR__ . '/../view/tugas/edit.php';
    }
    
    public function update()
    {
        $id = $_POST['id'];
        //var_dump($id);exit();
        if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['lampiran']) && !empty($_POST['mapel_id'])) {
            $this->tugas->update($id,$_POST);
            header('Location: /tugas'); 
        } else {
            echo "Semua field harus diisi!";
        }
    }

    public function delete()
    {
        $this->tugas->delete($_POST['id']);
        header('Location:/tugas');
    }
}