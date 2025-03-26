<?php
require_once __DIR__ . '/../config/database.php';

class Tugas{
    private $db;

    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }

    // Mengambil semua materi dengan JOIN ke tabel mapel untuk mendapatkan nama mapelnya
    public function getAllWithMapel() {
        $stmt = $this->db->query("
            SELECT tugas.*, mapel.name AS mapel_name 
            FROM tugas 
            JOIN mapel ON tugas.mapel_id = mapel.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll(){
        $stmt = $this->db->query("SELECT * FROM tugas");
        return $stmt->fetchAll();
    }

    public function getById($id){
        $stmt = $this->db->prepare("SELECT * FROM tugas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getByName($name){
        $stmt = $this->db->prepare("SELECT * FROM tugas WHERE name = ?");
        $stmt->execute([$name]);
        return $stmt->fetch();
    }

    public function create($data){
        $stmt = $this->db->prepare("INSERT INTO tugas (name, description, lampiran, mapel_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['name'],$data['description'],$data['lampiran'],$data['mapel_id'] ]);
    }

    public function update($id, $data){
        $stmt = $this->db->prepare("UPDATE tugas SET name = ?,  description = ?,  lampiran= ?, mapel_id = ? WHERE id = ?");
        return $stmt->execute([$data['name'],$data['description'],$data['lampiran'],$data['mapel_id'] , $id]);
    }

    public function delete($id){
        $stmt = $this->db->prepare("DELETE FROM tugas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
