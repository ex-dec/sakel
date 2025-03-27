<?php

class Absensi
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getTglAbsensi($kelas_id)
    {
        $stmt = $this->pdo->prepare("SELECT DISTINCT tgl FROM absensi 
                                     LEFT JOIN siswa ON absensi.siswa_id = siswa.id
                                     WHERE siswa.kelas_id = ?");
        $stmt->execute([$kelas_id]);
        return $stmt->fetchAll();
    }

    public function getByTglKelas($kelas_id, $tgl)
    {
        $stmt = $this->pdo->prepare("SELECT absensi.*, siswa.nis, siswa.name as siswa_name
                                     FROM absensi LEFT JOIN siswa ON absensi.siswa_id = siswa.id
                                     WHERE absensi.tgl = ? AND siswa.kelas_id = ?");
        $stmt->execute([$tgl, $kelas_id]);
        return $stmt->fetchAll();
    }
}
