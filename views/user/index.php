<div class="container-fluid">
    <h1 class="mb-3">
        Master User
    </h1>
    <div class="card">
        <div class="card-body">
            <a href="<?= base_url('/user/create') ?>"
            class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i>
                Tambah User
            </a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Sekolah</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($users as $i => $user): ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $user['nama'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['sekolah'] ?></td>
                        <td><?= $user['role'] ?></td>
                        <td>
                            <?= $user['is_active']
                                ? 'Aktif'
                                : 'Nonaktif' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>