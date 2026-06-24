<?php

require_once BASE_PATH . '/app/Config/Database.php';

class HomeController
{
    public function index()
    {
        $db = Database::connect();

        $stmt = $db->query("SELECT 1");

        $hasil = $stmt->fetch();

        ob_start();

        require BASE_PATH . '/views/home.php';

        $content = ob_get_clean();

        $title = 'Dashboard';

        require BASE_PATH . '/views/layouts/main.php';
    }
}
echo $_ENV['APP_NAME'];
exit;