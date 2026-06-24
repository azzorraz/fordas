<div class="container-fluid">

    <h1>Edit Sekolah</h1>

    <div class="card">
        <div class="card-body">

            <form method="post"
                  action="<?= base_url('/sekolah/update') ?>">

                <input type="hidden"
                       name="id"
                       value="<?= $sekolah['id'] ?>">

                <div class="mb-3">
                    <label>NPSN</label>
                    <input type="text"
                           name="npsn"
                           class="form-control"
                           value="<?= $sekolah['npsn'] ?>">
                </div>

                <div class="mb-3">
                    <label>Nama Sekolah</label>
                    <input type="text"
                           name="sekolah"
                           class="form-control"
                           value="<?= $sekolah['sekolah'] ?>">
                </div>

                <div class="mb-3">
                    <label>Tingkat</label>
                    <input type="text"
                           name="tingkat"
                           class="form-control"
                           value="<?= $sekolah['tingkat'] ?>">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <input type="text"
                           name="status"
                           class="form-control"
                           value="<?= $sekolah['status'] ?>">
                </div>

                <button class="btn btn-success">
                    Update
                </button>

                <a href="<?= base_url('/sekolah') ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>