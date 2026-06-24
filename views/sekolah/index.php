<div class="container-fluid">
    <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <a href="<?= base_url('/sekolah/create') ?>"
                    class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Tambah Sekolah
                    </a>
                </div>
                <div class="col-md-8">
                    <form method="get">
                        <div class="input-group">
                            <input type="text"
                                name="keyword"
                                class="form-control"
                                placeholder="Cari NPSN atau Nama Sekolah..."
                                value="<?= $_GET['keyword'] ?? '' ?>">
                            <button class="btn btn-warning">
                                <i class="fas fa-search" style="font-size: 24px;"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
</div>

    <div class="card">
        <div class="card-body">
             <div class="mb-3">
                Total Data :
                <strong>
                    <?= number_format($totalData) ?>
                </strong>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NPSN</th>
                    <th>Nama Sekolah</th>
                    <th>Tingkat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($sekolah as $i => $row): ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $row['npsn'] ?></td>
                        <td><?= $row['sekolah'] ?></td>
                        <td><?= $row['tingkat'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a href="<?= base_url('/sekolah/edit') ?>?id=<?= $row['id'] ?>"
                            class="btn btn-warning btn-sm">
                            Edit
                            </a>
                            <a href="<?= base_url('/sekolah/delete') ?>?id=<?= $row['id'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus data sekolah ini?')">
                            Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="card-footer">
                <nav>
                    <ul class="pagination">
                        <!-- Previous -->
                        <?php if($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link"
                                href="<?= base_url('/sekolah') ?>?keyword=<?= urlencode($keyword) ?>&page=<?= ($page-1) ?>">
                                    &laquo;
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php
                        $start = max(1, $page - 2);
                        $end   = min($totalPage, $page + 2);
                        ?>
                        <!-- Halaman pertama -->
                        <?php if($start > 1): ?>
                            <li class="page-item">
                                <a class="page-link"
                                href="<?= base_url('/sekolah') ?>?keyword=<?= urlencode($keyword) ?>&page=1">
                                    1
                                </a>
                            </li>
                            <?php if($start > 2): ?>
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <!-- Halaman sekitar -->
                        <?php for($i = $start; $i <= $end; $i++): ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link"
                                href="<?= base_url('/sekolah') ?>?keyword=<?= urlencode($keyword) ?>&page=<?= $i ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        <!-- Halaman terakhir -->
                        <?php if($end < $totalPage): ?>
                            <?php if($end < ($totalPage - 1)): ?>
                                <li class="page-item disabled">
                                    <span class="page-link">...</span>
                                </li>
                            <?php endif; ?>
                            <li class="page-item">
                                <a class="page-link"
                                href="<?= base_url('/sekolah') ?>?keyword=<?= urlencode($keyword) ?>&page=<?= $totalPage ?>">
                                    <?= $totalPage ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <!-- Next -->
                        <?php if($page < $totalPage): ?>
                            <li class="page-item">
                                <a class="page-link"
                                href="<?= base_url('/sekolah') ?>?keyword=<?= urlencode($keyword) ?>&page=<?= ($page+1) ?>">
                                    &raquo;
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>