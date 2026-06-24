<div class="container-fluid">

    <h1 class="mb-4">
        Tambah Sekolah
    </h1>

    <div class="card">

        <div class="card-body">

            <form method="post"
                  action="<?= base_url('/sekolah/store') ?>">

                <div class="mb-3">

                    <label>NPSN</label>

                    <input type="text"
                           name="npsn"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Nama Sekolah</label>

                    <input type="text"
                           name="sekolah"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Tingkat</label>

                    <select name="tingkat"
                            class="form-control">

                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Status</label>

                    <select name="status"
                            class="form-control">

                        <option value="Negeri">
                            Negeri
                        </option>

                        <option value="Swasta">
                            Swasta
                        </option>

                    </select>

                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

                <a href="<?= base_url('/sekolah') ?>"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>