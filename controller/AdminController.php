<?php

require_once __DIR__ . '/../helper/auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Siswa.php';
require_once __DIR__ . '/../model/Kelas.php';
require_once __DIR__ . '/../model/Mapel.php';
require_once __DIR__ . '/../model/Tugas.php';

class AdminController
{
    private $active;
    private $siswa;
    private $kelas;
    private $mapel;
    private $tugas;

    public function __construct()
    {
        if (!isAuthenticated()) {
            header('Location: /login');
            exit;
        }
        $pdo = Database::connect();
        $this->siswa = new Siswa($pdo);
        $this->kelas = new Kelas($pdo);
        $this->mapel = new Mapel($pdo);
        $this->tugas = new Tugas($pdo);
        $this->active = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function dashboard()
    {
        $siswa = count($this->siswa->getAll());
        $kelas = count($this->kelas->getAll());
        $mapel = count($this->mapel->getAll());
        $tugas = count($this->tugas->getAll());
        require_once __DIR__ . '/../view/admin/dashboard.php';
    }

    public function isActive($active)
    {
        return $this->active === $active ? 'active' : '';
    }
}
