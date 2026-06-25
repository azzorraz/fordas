<?php

require_once BASE_PATH . '/app/Middleware/AuthMiddleware.php';
require_once BASE_PATH . '/app/Models/JenisPengajuan.php';

class JenisPengajuanController
{
    public function index()
    {
        AuthMiddleware::handle();
            $keyword = $_GET['keyword'] ?? '';
            $page = max(1, (int)($_GET['page'] ?? 1));
            $perPage = 10;
            $data = JenisPengajuan::all(
                $keyword,
                $page,
                $perPage
            );
            $totalData = JenisPengajuan::countFiltered($keyword);
            $totalPage = ceil($totalData / $perPage);
        ob_start();
        require BASE_PATH . '/views/jenis_pengajuan/index.php';
        $content = ob_get_clean();
        $title = 'Jenis Pengajuan';
        require BASE_PATH . '/views/layouts/admin.php';
    }

        public function create()
    {
        AuthMiddleware::handle();
        ob_start();
        require BASE_PATH . '/views/jenis_pengajuan/create.php';
        $content = ob_get_clean();
        $title = 'Tambah Jenis Pengajuan';
        require BASE_PATH . '/views/layouts/admin.php';
    }

        public function store()
    {
        AuthMiddleware::handle();

        if (JenisPengajuan::findByNama($_POST['nama'])) {

            $_SESSION['error'] =
                'Nama jenis pengajuan sudah ada';

            redirect('/jenis-pengajuan/create');
        }

        JenisPengajuan::create([

            'nama' => $_POST['nama'],

            'aktif' => $_POST['aktif']

        ]);

        $_SESSION['success'] =
            'Data berhasil disimpan';

        redirect('/jenis-pengajuan');
    }

        public function edit()
    {
        AuthMiddleware::handle();

        $id=$_GET['id'];

        $jenis=JenisPengajuan::find($id);

        ob_start();

        require BASE_PATH.'/views/jenis_pengajuan/edit.php';

        $content=ob_get_clean();

        $title='Edit Jenis Pengajuan';

        require BASE_PATH.'/views/layouts/admin.php';
    }

        public function update()
    {
        AuthMiddleware::handle();

        $id=$_POST['id'];

        JenisPengajuan::updateData($id,[

            'nama'=>$_POST['nama'],

            'aktif'=>$_POST['aktif']

        ]);

        $_SESSION['success']="Data berhasil diperbarui";

        redirect('/jenis-pengajuan');
    }

        public function toggleStatus()
    {
        AuthMiddleware::handle();

        JenisPengajuan::toggleStatus($_GET['id']);

        redirect('/jenis-pengajuan');
    }


}