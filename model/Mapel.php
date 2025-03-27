<?php
require_once __DIR__ . '/../config/database.php';

class Mapel
{
    private $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT mapel.* , kelas.name as kelas_name FROM mapel JOIN kelas ON mapel.kelas_id = kelas.id");
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM mapel WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getByName($name)
    {
        $stmt = $this->db->prepare("SELECT * FROM mapel WHERE name = ?");
        $stmt->execute([$name]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO mapel (name, kelas_id) VALUES (?, ?)");
        return $stmt->execute([$data['name'], $data['kelas_id']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE mapel SET name = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM mapel WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
