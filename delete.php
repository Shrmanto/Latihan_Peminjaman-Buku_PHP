<?php

    // Memanggil koneksi menuju database
    include_once("connection.php");

    $id         = $_GET['id_peminjam'];
    $sql1       = "DELETE FROM peminjam WHERE id_peminjam = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $success = "Berhasil hapus data";
        header("refresh:1;url=peminjam.php");
    }else{
        $error  = "Gagal melakukan delete data";
        header("refresh:1;url=peminjam.php");
    }

?>