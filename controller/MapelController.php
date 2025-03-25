<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Mapel.php';

class MapelController{

    private $mapel;

    public function __construct()
    {
        $pdo = Database::connect();
        $this->mapel = new Mapel($pdo); 
    }

    public function index(){
        $mapel = $this->mapel->getAll();
        //var_dump($data);
        include __DIR__ . '/../view/mapel/index.php';
    }

    public function create (){
        include __DIR__ . '/../view/mapel/create.php';
    }

    public function store (){
        //var_dump($_POST);
        if (isset($_POST['name']) && !empty($_POST['name'])) { 
            $this->mapel->create($_POST); 
            header('Location: /mapel'); 
        } else {
            echo "Nama mapel harus diisi!"; 
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $mapel = $this->mapel->getById($id);
        include __DIR__ . '/../view/mapel/edit.php';
    }

    public function update()
    {
        $id = $_GET['id'];
        if (isset($_POST['name']) && !empty($_POST['name'])){
            $this->mapel->update($id, $_POST);
            header('Location: /mapel');
        }else {
            echo "Nama mapel harus diisi!"; 
        }
    }

    public function delete()
    {
        $this->mapel->delete($_POST['id']);
        header('Location:/mapel');
    }
}