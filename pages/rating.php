<?php
include 'config/koneksi.php';
?>

        
<h2>Daftar Rating</h2>

<a href="../forms/add_rating.php"><button class="btn btn-primary" type="button" >+ Tambah Rating</button></a>
<br><br>
<table border="1" cellpadding="10" cellspacing="0" class="table text-center table-bordered table-hover">
    <tr class="table-dark">
        <th>No</th>
        <th>Rating</th>
        <th>Bonus</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $query = mysqli_query($conn, "SELECT * FROM rating");
    while ($data = mysqli_fetch_assoc($query)) {
        echo "<tr>
                <td>$no</td>
                <td>" . number_format($data['rating']) . "</td>
                <td>" . number_format($data['presentase_bonus']) ."%</td>
                <td>
                    <div class='d-flex justify-content-center flex-wrap gap-2'>
                        <a href='forms/detail_rating.php?id={$data['id']}'>
                            <button class='btn btn-info btn-sm px-3' type='button'><i class='bi bi-info-circle'></i></button>
                        </a> 
                        <a href='forms/edit_rating.php?id={$data['id']}'>
                            <button class='btn btn-warning btn-sm px-3' type='button'><i class='bi bi-pencil'></i></button>
                        </a> 
                        <a href='forms/hapus_rating.php?id={$data['id']}' onclick=\"return confirm('Yakin hapus?')\">
                            <button class='btn btn-danger btn-sm px-3' type='button'><i class='bi bi-trash3-fill'></i></button>
                        </a>
                    </div>              
                </td>
              </tr>";
        $no++;
    }
    ?>
</table>