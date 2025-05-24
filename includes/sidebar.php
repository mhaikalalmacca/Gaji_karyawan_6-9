<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sidebar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="position-fixed top-0 start-0 vh-100 bg-dark text-white p-3" style="width: 250px;">
  <a href="?page=dashboard" class="d-flex align-items-center mb-3 text-white text-decoration-none">
    <img src="assets/image/orcass.png" alt="Logo" width="50" class="me-2 rounded-circle">
    <span class="fs-6 fw-bold">SISTEM MANAJEMEN GAJI</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column gap-2">
    <li class="nav-item">
      <a href="?page=dashboard" class="nav-link <?php echo ($current_page == 'dashboard') ? 'active bg-primary text-white' : 'text-white'; ?>">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=karyawan" class="nav-link <?php echo ($current_page == 'karyawan') ? 'active bg-primary text-white' : 'text-white'; ?>">
        <i class="bi bi-people me-2"></i>Daftar Karyawan
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=jabatan" class="nav-link <?php echo ($current_page == 'jabatan') ? 'active bg-primary text-white' : 'text-white'; ?>">
        <i class="bi bi-briefcase me-2"></i>Daftar Jabatan
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=rating" class="nav-link <?php echo ($current_page == 'rating') ? 'active bg-primary text-white' : 'text-white'; ?>">
        <i class="bi bi-star me-2"></i>Daftar Rating
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=lembur" class="nav-link <?php echo ($current_page == 'lembur') ? 'active bg-primary text-white' : 'text-white'; ?>">
        <i class="bi bi-clock me-2"></i>Tarif Lembur
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=gaji" class="nav-link <?php echo ($current_page == 'gaji') ? 'active bg-primary text-white' : 'text-white'; ?>">
        <i class="bi bi-cash-coin me-2"></i>Gaji Karyawan
      </a>
    </li>
  </ul>
</div>
</body>
</html>
