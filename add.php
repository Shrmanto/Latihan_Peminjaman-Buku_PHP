<?php

    // Memanggil koneksi menuju database
    include_once("connection.php");

    // Digunakan Untuk Insert Data

    if(isset($_POST['add'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $noHp = $_POST['noHandphone'];

        if ($nama && $alamat && $noHp){
            
            $sql = "INSERT INTO peminjam (nama, alamat, no_handphone) VALUES ('$nama', '$alamat', '$noHp')";
            $ql = mysqli_query($koneksi, $sql);
    
            if($ql) {
                $success = "Berhasil menambah data peminjam";
                // header("refresh:2;url=peminjam.php");
            } else {
                $error = "Gagal menambah data peminjam: " . mysqli_error($koneksi);
                // header("refresh:2;url=peminjam.php");
            }

            
        }else{
            $error = "Silahkan Masukan Data!!";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/regular.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/solid.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center" style="min-height:100vh; align-items:center">
        <div class="card" style="width: 40rem;">
            <div class="card-header">
                <h2 class="text-center">Tambah Data</h2>
            </div>
            <?php
            if ($error) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php
            }
            ?>
            <?php
            if ($success) {
            ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success ?>
                </div>
            <?php
            }
            ?>
            <div class="card-body my-2">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                    </div>
                    <div class="mb-3">
                        <label for="noHandphone" class="form-label">No. Hp</label>
                        <input type="text" name="noHandphone" class="form-control" id="noHandphone" placeholder="No. Handphone">
                    </div>
                    <a href="peminjam.php" role="button" class="btn btn-secondary me-2">Close</a>
                    <button type="submit" name="add" value="simpan" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>