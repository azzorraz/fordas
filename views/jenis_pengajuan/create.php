<div class="card">

    <div class="card-header">

        <h3>Tambah Jenis Pengajuan</h3>

    </div>

    <div class="card-body">

        <?php if(isset($_SESSION['error'])): ?>

            <div class="alert alert-danger">

                <?= $_SESSION['error']; ?>

            </div>

            <?php unset($_SESSION['error']); ?>

        <?php endif; ?>

        <form method="post"
              action="<?= base_url('/jenis-pengajuan/store') ?>">

            <div class="mb-3">

                <label>Nama Jenis Pengajuan</label>

                <input
                    type="text"
                    name="nama"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select
                    name="aktif"
                    class="form-control">

                    <option value="1">

                        Aktif

                    </option>

                    <option value="0">

                        Nonaktif

                    </option>

                </select>

            </div>

            <button
                class="btn btn-success">

                Simpan

            </button>

            <a href="<?= base_url('/jenis-pengajuan') ?>"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>