<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Edit User</h3>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <form method="post"
                  action="<?= base_url('/user/update') ?>">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="mb-3">
                    <label>Nama User</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="<?= $user['nama'] ?>"
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
                            <option value="<?= $s['id'] ?>" <?= $user['sekolah_id'] == $s['id'] ? 'selected' : '' ?>>
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
                           value="<?= $user['username'] ?>"
                           required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <select name="role"
                            class="form-control">
                        <option value="operator" <?= $user['role'] == 'operator' ? 'selected' : '' ?>>
                            Operator
                        </option>
                        <option value="verifikator" <?= $user['role'] == 'verifikator' ? 'selected' : '' ?>>
                            Verifikator
                        </option>
                        <option value="superadmin" <?= $user['role'] == 'superadmin' ? 'selected' : '' ?>>
                            Superadmin
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="is_active"
                            class="form-control">
                        <option value="1" <?= $user['is_active'] == '1' ? 'selected' : '' ?>>
                            Aktif
                        </option>
                        <option value="0" <?= $user['is_active'] == '0' ? 'selected' : '' ?>>
                            Nonaktif
                        </option>
                    </select>
                </div>
                <button class="btn btn-warning">
                    Update
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