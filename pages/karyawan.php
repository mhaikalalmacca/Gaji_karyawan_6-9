<?php
include 'config/koneksi.php';

$query = "SELECT karyawan.*, jabatan.nama AS nama_jabatan, rating.rating
          FROM karyawan
          JOIN jabatan ON karyawan.id_jabatan = jabatan.id
          LEFT JOIN rating ON karyawan.id_rating = rating.id
          ORDER BY karyawan.id DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
  die("Query Error: " . mysqli_error($conn));
}

function generateStars($count) {
    $stars = '';
    $count = (int)$count;
    for ($i = 0; $i < $count; $i++) {
        $stars .= '⭐';
    }
    return $stars ?: '-';
}
?>

<!-- Tombol sidebar mobile -->

<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Karyawan</h2>
    <a href="forms/add_karyawan.php" class="btn btn-primary">+ Tambah Karyawan</a>
  </div>

  <div class="row">
  <?php while($row = mysqli_fetch_assoc($result)) : 
    $gender = $row['jenis_kelamin'] ?? 'Pria';
    $gambar = ($gender == 'Perempuan') ? 'girl.jpg' : 'man.jpg';
    $foto = !empty($row['foto']) ? $row['foto'] : $gambar;
  ?>
    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="assets/image/<?= htmlspecialchars($foto) ?>" class="card-img-top" alt="Foto Karyawan">
        <div class="card-body text-center">
          <h5 class="card-title"><?= htmlspecialchars($row['nama']) ?></h5>
          <p class="card-text star-rating"><?= generateStars($row['rating']) ?></p>
          <strong><p class="card-text"><?= htmlspecialchars($row['nama_jabatan']) ?></p></strong>
        </div>
        <div class="card-footer d-flex justify-content-between">
          <a href="forms/detail_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
          <a href="forms/edit_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="forms/hapus_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
</div>
