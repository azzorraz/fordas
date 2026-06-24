<?php

require_once BASE_PATH .
'/app/Middleware/AuthMiddleware.php';

require_once BASE_PATH .
'/app/Models/User.php';

require_once BASE_PATH . 
'/app/Models/Sekolah.php';

class UserController
{
    public function index()
    {
        AuthMiddleware::handle();
        $users = User::all();
        ob_start();
        require BASE_PATH .
            '/views/user/index.php';
        $content = ob_get_clean();
        $title = 'Master User';
        require BASE_PATH .
            '/views/layouts/admin.php';
    }

    public function create()
    {
        AuthMiddleware::handle();
        $sekolah = Sekolah::dropdownAvailable();
        ob_start();
        require BASE_PATH .
        '/views/user/create.php';
        $content = ob_get_clean();
        $title = 'Tambah User';
        require BASE_PATH .
        '/views/layouts/admin.php';
    }

    public function store()
        {
            AuthMiddleware::handle();
            // cek username
            if (User::findByUsername($_POST['username'])) {
                $_SESSION['error'] =
                    'Username sudah digunakan';
                redirect('/user/create');
            }
            // cek sekolah sudah punya akun
            if ($_POST['role'] == 'operator') {
                if (User::findBySekolah($_POST['sekolah_id'])) {
                    $_SESSION['error'] =
                        'Sekolah tersebut sudah memiliki akun';
                    redirect('/user/create');
                }
            }
            User::create([
                'sekolah_id' => $_POST['sekolah_id'],
                'nama' => $_POST['nama'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'role' => $_POST['role'],
                'is_active' => $_POST['is_active']
            ]);
            $_SESSION['success'] =
                'User berhasil ditambahkan';
            redirect('/user');
        }
}