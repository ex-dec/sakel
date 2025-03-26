<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Daftar Tugas</h2>
        
        <div class="d-flex justify-content-end mb-3">
            <a href="/tugas/create" class="btn btn-primary">Tambah Tugas</a>
        </div>

        <div class="row justify-content-center">
        <?php if (!empty($tugas)): ?>
            <?php foreach ($tugas as $t): ?>
                <div class="col-md-8 mb-4">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($t['name']) ?></h5> 
                            <p class="text-bold">Mata Pelajaran: <strong><?= htmlspecialchars($t['mapel_name']) ?></strong></p>
                            <p class="text-bold">Deskripsi tugas: <strong><?= htmlspecialchars($t['description']) ?></strong></p>
                            <?php if (!empty($t['lampiran'])): ?>
                                <a href="<?= htmlspecialchars($t['lampiran']) ?>" class="btn btn-sm btn-info" target="_blank">Lihat Lampiran</a>
                            <?php endif; ?>
                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <a href="/tugas/edit?id=<?= $t['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/tugas/delete" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                    <input type="hidden" name="id" value="<?= $t['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
                <p class="text-muted text-center">Belum ada data materi yang ditambahkan.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
