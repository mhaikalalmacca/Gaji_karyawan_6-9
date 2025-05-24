<?php
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $gaji = $_POST['gaji_pokok'];

    $query = "INSERT INTO jabatan (nama, gaji_pokok) VALUES ('$nama', '$gaji')";
    mysqli_query($koneksi, $query);
    header("Location: ../pages/jabatan.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <h2>Tambah Jabatan</h2>
    <form method="POST">
        <label>Nama Jabatan:</label><br>
        <input type="text" name="nama" required><br><br>
        
        <label>Gaji Pokok:</label><br>
        <input type="number" name="gaji_pokok" required><br><br>
        
        <input type="submit" value="Simpan">
    </form>
</body>
</html>