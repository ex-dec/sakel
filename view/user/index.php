<a href="?action=create">Tambah User</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($data as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['name'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['role_name'] ?? '-' ?></td>
            <td>
                <a href="?action=edit&id=<?= $u['id'] ?>">Edit</a> |
                <a href="?action=delete&id=<?= $u['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>