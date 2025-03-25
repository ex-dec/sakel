<?php

class siswa
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT siswa.*, kelas.name as kelas_name
                                     FROM siswa LEFT JOIN kelas ON siswa.kelas_id = kelas.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM siswa WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO siswa (nis, name, kelas_id) VALUES (?, ?, ?)");
        $stmt->execute([$data['nis'], $data['name'], $data['kelas_id']]);
    }

    public function update($data)
    {
        $stmt = $this->pdo->prepare("UPDATE siswa SET nis = ?, name = ?, kelas_id = ? WHERE id = ?");
        $stmt->execute([$data['nis'], $data['name'], $data['kelas_id'], $data['id']]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM siswa WHERE id = ?");
        $stmt->execute([$id]);
    }
}
