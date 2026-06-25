<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'FORDAS' ?></title>
    <link rel="stylesheet" href="/fordas/adminlte/css/adminlte.min.css">
    <link rel="stylesheet" href="/fordas/adminlte/assets/plugins/select2/css/select2.min.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    <!-- Header -->
    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <span class="navbar-brand">
                FORDAS
            </span>

            <div class="ms-auto">
                <?= $_SESSION['user']['nama'] ?? '' ?>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="app-sidebar bg-body-secondary shadow">

        <div class="sidebar-brand">
            <a href="#" class="brand-link">
                <span class="brand-text fw-light">
                    FORDAS
                </span>
            </a>
        </div>

        <div class="sidebar-wrapper">
            <nav class="mt-2">

                <ul class="nav sidebar-menu flex-column">

                    <li class="nav-item">
                        <a href="/fordas/public/dashboard"
                           class="nav-link">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('/sekolah') ?>" class="nav-link">
                            <i class="nav-icon fas fa-school"></i>
                            <p>Master Sekolah</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('/user') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Master User</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('/jenis-pengajuan') ?>" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>Jenis Pengajuan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/fordas/public/logout"
                           class="nav-link text-danger">
                            Logout
                        </a>
                    </li>

                </ul>

            </nav>
        </div>

    </aside>

    <!-- Content -->
    <main class="app-main">
        <div class="app-content p-4">

            <?= $content ?>

        </div>
    </main>

</div>

<script src="/fordas/adminlte/js/adminlte.min.js"></script>
<script src="/fordas/adminlte/assets/plugins/select2/js/select2.full.min.js"></script>

</body>
</html>