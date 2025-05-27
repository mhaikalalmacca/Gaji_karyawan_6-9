<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main {
            flex: 1;
            display: flex;
        }
        .content {
            flex: 1;
            padding: 1.5rem;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="main">
        <?php include 'includes/sidebar.php'; ?>

        <div class="content">
            <?php
                $page = $_GET['page'] ?? 'dashboard';
                include "pages/$page.php";
            ?>
        </div>
    </div>

    <footer class="bg-light text-end text-muted py-3">
        <div class="container">
            <small>Copyright &copy; Nova 2025. All rights reserved.</small>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
