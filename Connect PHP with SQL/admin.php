<?php
//koneksi ke database
$conn = mysqli_connect ("localhost", "root", "", "teknologi_informasi");

//ambil data dari tabel mahasiswa
$hasil = mysqli_query($conn, "SELECT * FROM mahasiswa");

//cek ambil data di tabel mahasiswa
if(!$hasil){
    echo mysqli_error();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>
</head>
<body>

    <h1>DATA MAHASISWA</h1>

    <a href="tambah.php">TAMBAH DATA MAHASISWA BARU</a>
    <br><br>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>
        <!--sekarang perlu mengisi data tabel sesuai dengan tabel mahasiswa-->
        <!--perlu untuk perulangan (while) untuk mengisi data pada tabel-->
        <?php
        while ($row = mysqli_fetch_array($hasil)) :
        ?>

        <tr>
            <td><?= $row["nim"]?></td>
            <td><?= $row["namamhs"]?></td>
            <td><?= $row["alamatmhs"]?></td>
            <td><?= $row["kontakmhs"]?></td>
            <td>
                <a href="ubah.php?nim=<?= $row["nim"]; ?>">Edit</a> ||
                <a href="hapus.php?nim=<?= $row["nim"]; ?>" onclick="return confirm('yang bener?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    
</body>
</html>