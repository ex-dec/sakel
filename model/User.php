<?php

class User
{
    private $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT users.*, roles.name AS role_name
                                  FROM users LEFT JOIN roles ON users.role_id = roles.id");
        return $stmt->fetchAll();
    }

    public function getAllUser()
    {
        $stmt = $this->db->query("SELECT users.*, roles.name AS role_name
                                  FROM users LEFT JOIN roles ON users.role_id = roles.id
                                  WHERE roles.name = 'user'");
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByNis($nis)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE nis = ?");
        $stmt->execute([$nis]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, nis, role_id, password) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['name'], $data['nis'], $data['role_id'], $data['password']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, nis = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['nis'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
