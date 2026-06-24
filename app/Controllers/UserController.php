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
        $keyword = $_GET['keyword'] ?? '';
        $role = $_GET['role'] ?? '';
        $status = $_GET['status'] ?? '';
        $page = $_GET['page'] ?? 1;
        $perPage = 15;
        $users = User::all(
            $keyword,
            $role,
            $status,
            $page,
            $perPage
        );
        $totalData = User::countFiltered(
        $keyword,
        $role,
        $status
        );
        $totalPage = ceil(
            $totalData / $perPage
        );
        $totalUser = User::countData();
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

    public function edit()
        {
            AuthMiddleware::handle();
            $id = $_GET['id'] ?? 0;
            $user = User::find($id);
            if (!$user) {
                die('User tidak ditemukan');
            }
            $sekolah = Sekolah::dropdown();
            ob_start();
            require BASE_PATH .
                '/views/user/edit.php';
            $content = ob_get_clean();
            $title = 'Edit User';
            require BASE_PATH .
                '/views/layouts/admin.php';
        }

    public function update()
        {
            AuthMiddleware::handle();
            $id = $_POST['id'];
            $userLama = User::find($id);
            if (!$userLama) {
                die('User tidak ditemukan');
            }
            $cekUsername = User::findByUsername(
                $_POST['username']
            );
            if (
                $cekUsername &&
                $cekUsername['id'] != $id
            ) {
                $_SESSION['error'] =
                    'Username sudah digunakan';
                redirect('/user/edit?id=' . $id);
            }
            User::updateData($id, [
                'sekolah_id' => $_POST['sekolah_id'],
                'nama' => $_POST['nama'],
                'username' => $_POST['username'],
                'role' => $_POST['role'],
                'is_active' => $_POST['is_active']
            ]);
            $_SESSION['success'] =
                'User berhasil diperbarui';
            redirect('/user');
        }

    public function resetPassword()
        {
            AuthMiddleware::handle();

            $id = $_GET['id'] ?? 0;

            $user = User::find($id);

            if (!$user) {
                die('User tidak ditemukan');
            }

            ob_start();

            require BASE_PATH .
                '/views/user/reset-password.php';

            $content = ob_get_clean();

            $title = 'Reset Password';

            require BASE_PATH .
                '/views/layouts/admin.php';
        }

    public function updatePassword()
        {
            AuthMiddleware::handle();

            $id = $_POST['id'];

            if (
                $_POST['password']
                !=
                $_POST['password_confirm']
            ) {

                $_SESSION['error'] =
                    'Konfirmasi password tidak cocok';

                redirect(
                    '/user/reset-password?id=' . $id
                );
            }

            User::updatePassword(
                $id,
                $_POST['password']
            );

            $_SESSION['success'] =
                'Password berhasil diubah';

            redirect('/user');
        }

    public function toggleStatus()
        {
            AuthMiddleware::handle();

            $id = $_GET['id'] ?? 0;

            User::toggleStatus($id);

            redirect('/user');
        }
}