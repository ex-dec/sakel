<?php
require_once __DIR__ . '/../config/database.php';

class User
{
    private $db;

    public function __construct()
    {
        global $pdo;
        $this->db = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT users.*, roles.name as role_name 
                                  FROM users LEFT JOIN roles ON users.role_id = roles.id");
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, role_id) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['email'], $data['role_id']]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, role_id = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['email'], $data['role_id'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
