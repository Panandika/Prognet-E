<?php
require 'admin.php';


function hapus($nim){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim'");

    return mysqli_affected_rows($conn);
}

$nim = $_GET["nim"];



if( hapus($nim) > 0){
    echo "
        <script>
            alert ('Data Berhasil Dihapus');
            document.location.href = 'admin.php';
        </script>
    ";

} else {
    echo "
        <script>
            alert ('Data Gagal Dihapus');
            document.location.href = 'admin.php';
        </script>
    ";
}

?>