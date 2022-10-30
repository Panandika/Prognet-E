<?php


//koneksi ke database
$conn = mysqli_connect("localhost","root","","teknologi_informasi");

// ambil data url

$nim = $_GET["nim"];



// query data mahasiswa berdasarkan id

$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = $nim");


$rows = [] ;
$mhs = $rows;

while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}

$mhs = $rows [0];

//cek apakah button sudah ditekan atau belum
if(isset($_POST["submit"])) {
    //ambil data dari form
   $nim = $_POST["nim"];
   $namamhs = $_POST["namamhs"];
   $alamatmhs = $_POST["alamatmhs"];
   $kontakmhs = $_POST["kontakmhs"];
   
//query menginputkan data
$update = "UPDATE mahasiswa SET
            namamhs = '$namamhs',
            alamatmhs = '$alamatmhs',
            kontakmhs = '$kontakmhs'
        
            WHERE nim = '$nim' 
            ";
mysqli_query($conn, $update);


//cek data berhasil diubah

 if(mysqli_affected_rows($conn) > 0 ) {
     echo "
         <script>
             alert ('Data Berhasil Diubah');
             document.location.href = 'admin.php';
         </script>
     ";
 }
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
    <h1>Edit Data Mahasiswa Baru</h1>

    <form action="" method="POST">
        <input type="hidden" name="nim" id="nim" value="<?= $mhs["nim"]; ?>">
        <ul>
            
            <li>
                <label for="namamhs">Nama Mahasiswa : </label>
                <input type="text" name="namamhs" id="namamhs" required 
                value="<?= $mhs["namamhs"]; ?>">
            </li>
            <li>
                <label for="alamatmhs">Alamat Mahasiswa :</label>
                <input type="text" name="alamatmhs" id="alamatmhs" 
                value="<?= $mhs["alamatmhs"]; ?>">
            </li>
            <li>
                <label for="kontakmhs">Kontak Mahasiswa : </label>
                <input type="text" name="kontakmhs" id="kontakmhs" required 
                value="<?= $mhs["kontakmhs"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>
    
</body>
</html>