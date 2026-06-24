<?php

require_once BASE_PATH .
'/app/Middleware/AuthMiddleware.php';

require_once BASE_PATH .
'/app/Models/Sekolah.php';

class SekolahController
{
    public function index()
    {
        AuthMiddleware::handle();

        $keyword = $_GET['keyword'] ?? '';
        $page = (int)($_GET['page'] ?? 1);
        if ($page < 1) {
            $page = 1;
        }
        $limit = 15;
        $offset = ($page - 1) * $limit;
        $totalData = Sekolah::countData($keyword);
        $totalPage = ceil($totalData / $limit);
        $sekolah = Sekolah::all(
            $keyword,
            $limit,
            $offset
        );

        ob_start();

        require BASE_PATH .
            '/views/sekolah/index.php';

        $content = ob_get_clean();

        $title = 'Master Sekolah';

        require BASE_PATH .
            '/views/layouts/admin.php';
    }

    public function create()
    {
        AuthMiddleware::handle();

        ob_start();

        require BASE_PATH .
            '/views/sekolah/create.php';

        $content = ob_get_clean();

        $title = 'Tambah Sekolah';

        require BASE_PATH .
            '/views/layouts/admin.php';
    }

    public function store()
    {
        AuthMiddleware::handle();

        Sekolah::create([
            'npsn'     => $_POST['npsn'],
            'sekolah'  => $_POST['sekolah'],
            'tingkat'  => $_POST['tingkat'],
            'status'   => $_POST['status'],
            'alamat'   => $_POST['alamat']
    ]);
    redirect('/sekolah');
    }

    public function edit()
    {
        AuthMiddleware::handle();

        $id = $_GET['id'];

        $sekolah = Sekolah::find($id);

        ob_start();

        require BASE_PATH .
            '/views/sekolah/edit.php';

        $content = ob_get_clean();

        $title = 'Edit Sekolah';

        require BASE_PATH .
            '/views/layouts/admin.php';
    }

    public function update()
    {
        AuthMiddleware::handle();

        $id = $_POST['id'];

        Sekolah::updateData($id, [

            'npsn'     => $_POST['npsn'],
            'sekolah'  => $_POST['sekolah'],
            'tingkat'  => $_POST['tingkat'],
            'status'   => $_POST['status']

        ]);

        redirect('/sekolah');
    }

    public function delete()
    {
        AuthMiddleware::handle();

        $id = $_GET['id'] ?? 0;

        Sekolah::deleteData($id);

        redirect('/sekolah');
    }
}