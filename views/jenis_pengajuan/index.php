<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Master Jenis Pengajuan

        </h3>

    </div>

    <div class="card-body">

        <div class="row mb-3">

            <div class="col-md-4">
                <a href="<?= base_url('/jenis-pengajuan/create') ?>"
                class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Jenis Pengajuan
                </a>

            </div>

            <div class="col-md-8">
                <form method="get">
                    <div class="input-group">
                        <input
                            type="text"
                            name="keyword"
                            class="form-control"
                            placeholder="Cari Jenis Pengajuan..."
                            value="<?= htmlspecialchars($keyword ?? '') ?>">
                        <button
                            type="submit"
                            class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            Cari
                        </button>
                        <?php if(!empty($keyword)): ?>
                        <a href="<?= base_url('/jenis-pengajuan') ?>"
                        class="btn btn-secondary">
                            Reset
                        </a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th width="60">No</th>
                    <th>Nama Jenis Pengajuan</th>
                    <th width="120">Status</th>
                    <th width="120">Aksi</th>

                </tr>

            </thead>

            <tbody>

            <?php if(empty($data)): ?>

                <tr>

                    <td colspan="3" class="text-center">

                        Belum ada data

                    </td>

                </tr>

            <?php else: ?>

                <?php foreach($data as $i=>$row): ?>

                <tr>
                    <td><?= (($page - 1) * $perPage) + $i + 1 ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td>
                        <?= $row['aktif']
                            ? 'Aktif'
                            : 'Nonaktif' ?>
                    </td>
                    <td>
                        <a href="<?= base_url('/jenis-pengajuan/edit?id='.$row['id']) ?>"
                        class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('/jenis-pengajuan/toggle-status?id='.$row['id']) ?>"
                        class="btn btn-secondary btn-sm"
                        onclick="return confirm('Ubah status data ini?')">
                        <i class="fas fa-power-off"></i>
                        </a>
                    </td>
                </tr>

                <?php endforeach; ?>

            <?php endif; ?>

            </tbody>

        </table>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                Menampilkan
                <strong><?= count($data) ?></strong>
                dari
                <strong><?= $totalData ?></strong>
                data
            </div>
        </div>

        <?php if($totalPage > 1): ?>
        <nav class="mt-3">
            <ul class="pagination justify-content-end">
                <?php if($page > 1): ?>
                <li class="page-item">
                    <a class="page-link"
                    href="?page=<?= $page-1 ?>&keyword=<?= urlencode($keyword) ?>">
                    &laquo;
                    </a>
                </li>
                <?php endif; ?>
                <?php
                $start = max(1, $page - 2);
                $end   = min($totalPage, $page + 2);
                ?>
                <?php for($i=$start; $i<=$end; $i++): ?>
                <li class="page-item <?= ($page==$i)?'active':'' ?>">
                    <a class="page-link"
                    href="?page=<?= $i ?>&keyword=<?= urlencode($keyword) ?>">
                    <?= $i ?>
                    </a>
                </li>
                <?php endfor; ?>
                <?php if($page < $totalPage): ?>
                <li class="page-item">
                    <a class="page-link"
                    href="?page=<?= $page+1 ?>&keyword=<?= urlencode($keyword) ?>">
                    &raquo;
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php endif; ?>
    </div>

</div>