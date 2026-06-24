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

            <form method="get">
                <div class="row mb-3">
                    <div class="col-md-2">
                        <select
                            name="role"
                            class="form-control">
                            <option value="">
                                Semua Role
                            </option>
                            <option value="superadmin"
                                <?= ($role=='superadmin')
                                    ? 'selected' : '' ?>>
                                Superadmin
                            </option>
                            <option value="verifikator"
                                <?= ($role=='verifikator')
                                    ? 'selected' : '' ?>>
                                Verifikator
                            </option>
                            <option value="operator"
                                <?= ($role=='operator')
                                    ? 'selected' : '' ?>>
                                Operator
                            </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select
                            name="status"
                            class="form-control">
                            <option value="">
                                Semua Status
                            </option>
                            <option value="1"
                                <?= ($status==='1')
                                    ? 'selected' : '' ?>>
                                Aktif
                            </option>
                            <option value="0"
                                <?= ($status==='0')
                                    ? 'selected' : '' ?>>
                                Nonaktif
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input
                            type="text"
                            name="keyword"
                            class="form-control"
                            placeholder="Cari nama / username / sekolah"
                            value="<?= $keyword ?>">
                    </div>
                    <div class="col-md-2">
                        <button
                            class="btn btn-primary">
                            Cari
                        </button>
                    </div>
                </div>
            </form>
            <div class="mb-3">
                <strong>Total User: <?= $totalUser ?></strong>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Sekolah</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($users as $i => $user): ?>
                    <tr>
                        <td><?= (($page - 1) * $perPage) + $i + 1 ?></td>
                        <td><?= $user['nama'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['sekolah'] ?></td>
                        <td><?php
                        $roleClass = [
                            'superadmin' => 'bg-danger',
                            'verifikator' => 'bg-warning',
                            'operator' => 'bg-primary'
                        ];
                        ?>
                        <span class="badge <?= $roleClass[$user['role']] ?>">
                            <?= ucfirst($user['role']) ?>
                        </span></td>
                        <td>
                            <?php if($user['is_active']): ?>
                                <span class="badge bg-success">
                                    Aktif
                                </span>
                            <?php else: ?>
                                <span class="badge bg-danger">
                                    Nonaktif
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('/user/edit') ?>?id=<?= $user['id'] ?>"
                            class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            Edit
                            </a>
                            <a href="<?= base_url('/user/reset-password?id=' . $user['id']) ?>"
                            class="btn btn-info btn-sm">
                                <i class="fas fa-key"></i>
                            Reset Password
                            </a>
                            <a href="<?= base_url('/user/toggle-status?id=' . $user['id']) ?>"
                            class="btn btn-secondary btn-sm"
                            onclick="return confirm('Ubah status user ini?')">
                                <i class="fas fa-power-off"></i>
                            Disable
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
                <nav>
                    <div class="mb-2">
                        Menampilkan
                        <strong>
                        <?= count($users) ?>
                        </strong>
                        dari
                        <strong>
                        <?= number_format($totalData) ?>
                        </strong>
                        user
                    </div>
                    <ul class="pagination">
                        <?php if($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link"
                            href="?page=<?= $page-1 ?>
                            &keyword=<?= urlencode($keyword) ?>
                            &role=<?= urlencode($role) ?>
                            &status=<?= urlencode($status) ?>">
                            &laquo;
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php
                        $start = max(1, $page - 2);
                        $end   = min($totalPage, $page + 2);
                        ?>
                        <?php for($i=$start; $i<=$end; $i++): ?>
                        <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                            <a class="page-link"
                            href="?page=<?= $i ?>
                            &keyword=<?= urlencode($keyword) ?>
                            &role=<?= urlencode($role) ?>
                            &status=<?= urlencode($status) ?>">
                            <?= $i ?>
                            </a>
                        </li>
                        <?php endfor; ?>
                        <?php if($page < $totalPage): ?>
                        <li class="page-item">
                            <a class="page-link"
                            href="?page=<?= $page+1 ?>
                            &keyword=<?= urlencode($keyword) ?>
                            &role=<?= urlencode($role) ?>
                            &status=<?= urlencode($status) ?>">
                            &raquo;
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
        </div>
    </div>
</div>