<?php
include 'config/koneksi.php';
$nama_user = $_SESSION['nama'] ?? 'User';

// Ambil total data
$total_karyawan = $conn->query("SELECT COUNT(*) AS total FROM karyawan")->fetch_assoc()['total'];
$total_jabatan  = $conn->query("SELECT COUNT(*) AS total FROM jabatan")->fetch_assoc()['total'];
$total_rating   = $conn->query("SELECT COUNT(*) AS total FROM rating")->fetch_assoc()['total'];

// Ambil 3 karyawan terbaru
$query = "SELECT karyawan.*, jabatan.nama AS nama_jabatan, rating.rating
          FROM karyawan
          JOIN jabatan ON karyawan.id_jabatan = jabatan.id
          LEFT JOIN rating ON karyawan.id_rating = rating.id
          ORDER BY karyawan.id DESC
          LIMIT 3";
$result = mysqli_query($conn, $query);

function generateStars($count) {
  $stars = '';
  $count = (int)$count;
  for ($i = 0; $i < $count; $i++) {
    $stars .= '⭐';
  }
  return $stars ?: '-';
}
?>
<body>

<div class="main-content">
  <div class="container">
  <marquee class="p-4 mb-4 bg-light rounded shadow-sm" behavior="scroll" direction="left" scrollamount="6" style=" color: black; font-weight: bold; padding: 10px; border-radius: 5px;">
    Selamat datang di PT. NOVA! Semoga harimu menyenangkan dan produktif 😊
  </marquee>

    <div class="p-4 mb-4 bg-light rounded shadow-sm text-center">
      <h1 class="display-5 fw-bold">Selamat Datang di PT. NOVA</h1>
      <p class="lead text-muted">Semoga harimu menyenangkan dan produktif 😊</p>
    </div>

    <!-- Total Summary -->
    <div class="row mb-4 text-white">
      <div class="col-md-4 mb-3">
        <div class="bg-primary p-4 rounded text-center">
          <i class="bi bi-people fs-2"></i>
          <h5>Total Karyawan</h5>
          <h2><?= $total_karyawan ?></h2>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="bg-success p-4 rounded text-center">
          <i class="bi bi-briefcase fs-2"></i>
          <h5>Total Jabatan</h5>
          <h2><?= $total_jabatan ?></h2>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="bg-dark p-4 rounded text-center">
          <i class="bi bi-star fs-2"></i>
          <h5>Total Rating</h5>
          <h2><?= $total_rating ?></h2>
        </div>
      </div>
    </div>


    <!-- Karyawan Terbaru -->
    <h3 class="mb-3">Karyawan Terbaru</h3>
    <div class="row">
      <?php while($row = mysqli_fetch_assoc($result)) : 
        $gender = $row['jenis_kelamin'] ?? 'Pria';
        $gambar = ($gender == 'Perempuan') ? 'girl.jpg' : 'man.jpg';
        $foto = !empty($row['foto']) ? $row['foto'] : $gambar;
      ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="assets/image/<?= htmlspecialchars($foto) ?>" class="card-img-top" alt="Foto Karyawan">
            <div class="card-body text-center">
              <h5 class="card-title"><?= htmlspecialchars($row['nama']) ?></h5>
              <p class="card-text star-rating"><?= generateStars($row['rating']) ?></p>
              <strong><p class="card-text"><?= htmlspecialchars($row['nama_jabatan']) ?></p></strong>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <a href="forms/detail_karyawan-1.php?id=<?= $row['id'] ?>&from=dashboard" class="btn btn-info btn-sm"><i class="bi bi-info-circle"></i></a>
              <a href="forms/edit_karyawan-1.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
              <a href="forms/hapus_karyawan-1.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>