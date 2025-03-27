<?php

class Kelas
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM kelas");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM kelas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByName($name)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM kelas WHERE name = ?");
        $stmt->execute([$name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO kelas (name) VALUES (?)");
        $stmt->execute([$data['name']]);
    }

    public function update($id, $kelas)
    {
        $stmt = $this->pdo->prepare("UPDATE kelas SET name = ? WHERE id = ?");
        $stmt->execute([$kelas['name'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM kelas WHERE id = ?");
        $stmt->execute([$id]);
    }
}
