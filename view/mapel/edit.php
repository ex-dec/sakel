<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mata Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Edit Mata Pelajaran</h2>
            </div>
            <div class="card-body">
                <form action="/mapel/update?id=<?= htmlspecialchars($mapel['id']) ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?= htmlspecialchars($mapel['name']) ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/mapel" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
