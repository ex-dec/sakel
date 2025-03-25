<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Daftar Materi</h2>
        
        <div class="d-flex justify-content-end mb-3">
            <a href="/materi/create" class="btn btn-primary">Tambah Materi</a>
        </div>

        <div class="row justify-content-center">
            <?php if (!empty($materi)): ?>
                <?php foreach ($materi as $m): ?>
                    <div class="col-md-8 mb-4"> <!-- Card lebar 8 kolom biar lebih besar -->
                        <div class="card shadow-lg border-0">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= htmlspecialchars($m['name']) ?></h5> 
                                <p class="text-muted">Mata Pelajaran: <strong><?= htmlspecialchars($m['mapel_name']) ?></strong></p>
                                <p class="card-text"><?= htmlspecialchars($m['description']) ?></p>
                                <a href="<?= htmlspecialchars($m['link']) ?>" class="btn btn-sm btn-info" target="_blank">Lihat Materi</a>

                                <div class="d-flex justify-content-end gap-2 mt-3">
<<<<<<< HEAD
                                <a href="/materi/edit?id=<?= $m['id'] ?>&mapel_id=<?= $m['mapel_id'] ?>&mapel_name=<?= urlencode($m['mapel_name']) ?>" class="btn btn-warning btn-sm">Edit</a>
=======
                                    <a href="/materi/edit?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
>>>>>>> dbf1e1c (update materi)
                                    <form action="/materi/delete" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                        <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted text-center">Belum ada data materi yang ditambahkan.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
