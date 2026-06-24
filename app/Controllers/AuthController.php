<?php

require_once BASE_PATH . '/app/Models/User.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = User::findByUsername($username);

            if (!$user['is_active']) {
                $_SESSION['error'] =
                    'Akun tidak aktif';
                redirect('/login');
            } {

                $_SESSION['user'] = $user;
                // echo "LOGIN BERHASIL";
                // exit;
                header('Location: /fordas/public/dashboard');
                exit;
            }

            $error = 'Username atau password salah';
        }

        require BASE_PATH . '/views/auth/login.php';
    }

    public function logout()
    {
        session_destroy();

        header('Location: /fordas/public/');
        exit;
    }
}