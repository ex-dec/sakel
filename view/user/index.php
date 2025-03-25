<a href="/user/create">Tambah User</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Nis</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($data as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['name'] ?></td>
            <td><?= $u['nis'] ?></td>
            <td><?= $u['role_name'] ?? '-' ?></td>
            <td>
                <a href="/user/edit?id=<?= $u['id'] ?>">Edit</a> |
                <form action="/user/delete" method="POST" style="display:inline;" onsubmit="return confirm('Hapus?')">
                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>