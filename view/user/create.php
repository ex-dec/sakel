<h2>Tambah User</h2>
<form method="post" action="?action=store">
    Nama: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Role:
    <select name="role_id">
        <?php foreach ($roles as $r): ?>
            <option value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Simpan</button>
</form>