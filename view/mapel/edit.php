<h2 class="mb-4">Edit Mata Pelajaran</h2>

<form action="/mapel/update?id=<?= htmlspecialchars($mapel['id']) ?>" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nama Mata Pelajaran</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($mapel['name']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="/mapel" class="btn btn-secondary">Batal</a>
</form>
