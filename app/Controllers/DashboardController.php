<?php

require_once BASE_PATH .
'/app/Middleware/AuthMiddleware.php';

class DashboardController
{
    public function index()
    {
        AuthMiddleware::handle();

        ob_start();

        require BASE_PATH .
            '/views/dashboard/index.php';

        $content = ob_get_clean();

        $title = 'Dashboard';

        require BASE_PATH .
            '/views/layouts/admin.php';
    }
}