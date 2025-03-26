<?php
require_once __DIR__ . '/../config/database.php';

class Materi{
    private $db;

    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }

    // Mengambil semua materi dengan JOIN ke tabel mapel untuk mendapatkan nama mapelnya
    public function getAllWithMapel() {
        $stmt = $this->db->query("
            SELECT materi.*, mapel.name AS mapel_name 
            FROM materi 
            JOIN mapel ON materi.mapel_id = mapel.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll(){
        $stmt = $this->db->query("SELECT * FROM materi");
        return $stmt->fetchAll();
    }

    public function getById($id){
        $stmt = $this->db->prepare("SELECT * FROM materi WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getByName($name){
        $stmt = $this->db->prepare("SELECT * FROM materi WHERE name = ?");
        $stmt->execute([$name]);
        return $stmt->fetch();
    }

    public function create($data){
        $stmt = $this->db->prepare("INSERT INTO materi (name, link, description, mapel_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['name'],$data['link'],$data['description'],$data['mapel_id'] ]);
    }

    public function update($id, $data){
        $stmt = $this->db->prepare("UPDATE materi SET name = ?, link = ?, description = ?, mapel_id = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['link'], $data['description'], $data['mapel_id'], $id]);
    }

    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM materi WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
