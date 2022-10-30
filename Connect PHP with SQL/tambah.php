<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","teknologi_informasi");

//cek apakah button simpan sudah ditekan atau belum
if(isset($_POST["submit"])) {
    //ambil data dari form
   $nim = $_POST["nim"];
   $namamhs = $_POST["namamhs"];
   $alamatmhs = $_POST["alamatmhs"];
   $kontakmhs = $_POST["kontakmhs"];
   
//query menginputkan data
$insert = "INSERT INTO mahasiswa
            VALUES 
            ('$nim' , '$namamhs' , '$alamatmhs' , '$kontakmhs')";
mysqli_query ($conn, $insert);
}

//cek data berhasil diinputkan

if(mysqli_affected_rows($conn) > 0 ) {
    echo "
        <script>
            alert ('Data Berhasil Ditambahkan');
            document.location.href = 'admin.php';
        </script>
    ";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa Baru</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required >
            </li>
            <li>
                <label for="namamhs">Nama Mahasiswa : </label>
                <input type="text" name="namamhs" id="namamhs" required>
            </li>
            <li>
                <label for="alamatmhs">Alamat Mahasiswa :</label>
                <input type="text" name="alamatmhs" id="alamatmhs">
            </li>
            <li>
                <label for="kontakmhs">Kontak Mahasiswa : </label>
                <input type="text" name="kontakmhs" id="kontakmhs" required>
            </li>
            <li>
                <button type="submit" name="submit">Simpan</button>
            </li>
        </ul>
    </form>
    
</body>
</html>