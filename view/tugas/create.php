<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../model/Mapel.php';

// Buat objek Mapel dan ambil data semua mapel
$pdo = Database::connect(); 
$mapelModel = new Mapel($pdo);
$mapelList = $mapelModel->getAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-3">Tambah Tugas</h2>

    <form action="/tugas/store" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Tugas</label>
            <input type="text" name="name" id="name" class="form-control" required>

            <label for="description" class="form-label">Deskripsi Tugas</label>
            <input type="text" name="description" id="description" class="form-control" required>

            <label for="lampiran" class="form-label">lampiran Tugas</label>
            <input type="text" name="lampiran" id="lampiran" class="form-control" required>

            <label for="mapel_id" class="form-label">Mata Pelajaran</label>
            <select name="mapel_id" id="mapel_id" class="form-control" required>
                <option value="">-- Pilih Mata Pelajaran --</option>
                <?php foreach ($mapelList as $m): ?>
                    <option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/tugas" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
