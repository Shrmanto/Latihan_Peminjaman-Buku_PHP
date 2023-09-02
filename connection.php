<?php
    $host = 'localhost';
    $database_name = 'peminjaman_buku';
    $database_username = 'root'; // Nama pengguna yang telah Anda buat
    $database_password = ''; // Kata sandi yang telah Anda atur

    // Membuat koneksi
    $koneksi = mysqli_connect($host, $database_username, $database_password, $database_name);

    // Memeriksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

?>