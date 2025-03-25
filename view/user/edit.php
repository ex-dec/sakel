<h2>Edit User</h2>
<form method="post" action="/user/update?id=<?= $user['id'] ?>">
    Nama: <input type="text" name="name" value="<?= $user['name'] ?>"><br>
    NIS: <input type="text" name="nis" value="<?= $user['nis'] ?>"><br>
    <button type="submit">Update</button>
</form>