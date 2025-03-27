<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Absensi.php';
require_once __DIR__ . '/../model/Siswa.php';
require_once __DIR__ . '/../model/Kelas.php';

class AbsensiController
{
    private $absensi;
    private $siswa;
    private $kelas;
    private $active;

    public function __construct()
    {
        $pdo = Database::connect();
        $this->absensi = new Absensi($pdo);
        $this->siswa = new Siswa($pdo);
        $this->kelas = new Kelas($pdo);
        $this->active = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function kelas()
    {
        $kelas = $this->kelas->getAll();
        include __DIR__ . '/../view/admin/absensi/indexKelas.php';
    }

    public function tgl()
    {
        $kelas_id = $_GET['kelas_id'];
        $tgl = $this->absensi->getTglAbsensi($kelas_id);
        include __DIR__ . '/../view/admin/absensi/indexTgl.php';
    }

    public function index()
    {
        $kelas_id = $_GET['kelas_id'];
        $tgl = $_GET['tgl'];
        $kelas = $this->kelas->getById($kelas_id);
        $data = $this->absensi->getByTglKelas($kelas_id, $tgl);
        include __DIR__ . '/../view/admin/absensi/index.php';
    }

    public function isActive($active)
    {
        return $this->active === $active ? 'active' : '';
    }
}
