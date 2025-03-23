<h2>Edit User</h2>
<form method="post" action="?action=update&id=<?= $user['id'] ?>">
    Nama: <input type="text" name="name" value="<?= $user['name'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $user['email'] ?>"><br>
    Role:
    <select name="role_id">
        <?php foreach ($roles as $r): ?>
            <option value="<?= $r['id'] ?>" <?= $r['id'] == $user['role_id'] ? 'selected' : '' ?>>
                <?= $r['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Update</button>
</form>