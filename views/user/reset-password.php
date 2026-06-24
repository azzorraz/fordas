<div class="container-fluid">

    <div class="card">

        <div class="card-header">

            <h3>Reset Password</h3>

        </div>

        <div class="card-body">

            <?php if(isset($_SESSION['error'])): ?>

                <div class="alert alert-danger">

                    <?= $_SESSION['error']; ?>

                </div>

                <?php unset($_SESSION['error']); ?>

            <?php endif; ?>

            <form method="post"
                  action="<?= base_url('/user/update-password') ?>">

                <input type="hidden"
                       name="id"
                       value="<?= $user['id'] ?>">

                <div class="mb-3">

                    <label>User</label>

                    <input type="text"
                           class="form-control"
                           value="<?= $user['nama'] ?>"
                           readonly>

                </div>

                <div class="mb-3">

                    <label>Password Baru</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Konfirmasi Password</label>

                    <input type="password"
                           name="password_confirm"
                           class="form-control"
                           required>

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