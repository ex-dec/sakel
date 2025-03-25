<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Daftar Mata Pelajaran</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="/mapel/create" class="btn btn-primary">Tambah Mapel</a>
        </div>
        <div class="row">
            <?php if (!empty($mapel)): ?>
                <?php foreach ($mapel as $m): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold"> <?= htmlspecialchars($m['name']) ?> </h5>
                                <div class="d-flex justify-content-center gap-2 mt-3">
                                    <a href="/mapel/edit?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/mapel/delete" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                        <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted text-center">Belum ada data mata pelajaran.</p>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
