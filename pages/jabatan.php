<?php
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'includes/sidebar.php'; ?>    
<div class="main-content" style="margin-left: 250px; padding: 20px;">
        
<h2>Daftar Jabatan</h2>

<a href="forms/add_jabatan.php"><button class="btn btn-primary" type="button" >+ Tambah Jabatan</button></a>
<br><br>
<table border="1" cellpadding="10" cellspacing="0" class="table text-center table-bordered table-hover">
    <tr class="table-dark">
        <th>No</th>
        <th>Nama Jabatan</th>
        <th>Gaji Pokok</th>
        <th>Tunjangan</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $query = mysqli_query($conn, "SELECT * FROM jabatan");
    while ($data = mysqli_fetch_assoc($query)) {
        echo "<tr>
                <td>$no</td>
                <td>{$data['nama']}</td>
                <td>Rp " . number_format($data['gaji_pokok']) . "</td>
                <td>Rp " . number_format($data['tunjangan']) . "</td>
                <td>
                    <div class='d-flex justify-content-center'>
                        <a href='forms/detail_jabatan.php?id={$data['id']}'><button class='btn btn-info btn-sm me-3 px-4' type='button' style='min-width: 80px;'>Detail</button></a> 
                        <a href='forms/edit_jabatan.php?id={$data['id']}'><button class='btn btn-warning btn-sm me-3 px-4' type='button' style='min-width: 80px;'>Edit</button></a> 
                        <a href='forms/hapus_jabatan.php?id={$data['id']}' onclick=\"return confirm('Yakin hapus?')\"><button class='btn btn-danger btn-sm px-4' type='button' style='min-width: 80px;'>Hapus</button></a>
                    </div>
                    
                </td>
              </tr>";
        $no++;
    }
    ?>
</table>
</div>

</body>
</html>