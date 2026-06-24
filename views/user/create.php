<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Tambah User</h3>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <form method="post"
                  action="<?= base_url('/user/store') ?>">
                <div class="mb-3">
                    <label>Nama User</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           required>
                </div>
                <div class="mb-3">
                    <label>Sekolah</label>
                    <select name="sekolah_id"
                            class="form-control select2"
                            required>
                        <option value="">
                            Pilih Sekolah
                        </option>
                        <?php foreach($sekolah as $s): ?>
                            <option value="<?= $s['id'] ?>">
                                <?= $s['sekolah'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <select name="role"
                            class="form-control">
                        <option value="operator">
                            Operator
                        </option>
                        <option value="verifikator">
                            Verifikator
                        </option>
                        <option value="superadmin">
                            Superadmin
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="is_active"
                            class="form-control">
                        <option value="1">
                            Aktif
                        </option>
                        <option value="0">
                            Nonaktif
                        </option>
                    </select>
                </div>
                <button class="btn btn-success">
                    Simpan
                </button>
                <a href="<?= base_url('/user') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>

<script>
$(function(){
    $('.select2').select2({
        placeholder : 'Ketik nama sekolah...',
        allowClear : true,
        width : '100%'
    });
});
</script>