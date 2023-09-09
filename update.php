<?php

    // Memanggil koneksi menuju database
    include_once("connection.php");

    $id     = $_GET['id_peminjam'];
    $sql1   = "SELECT * FROM peminjam WHERE id_peminjam = '$id'";
    $ql     = mysqli_query($koneksi, $sql1);
    $r1     = mysqli_fetch_assoc($ql);
    
    // Digunakan Untuk Update Data

    if(isset($_POST['update'])) {
        $id = $_POST['id_peminjam'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $noHp = $_POST['noHandphone'];

        if ($id && $nama && $alamat && $noHp){
            
            $sql = "UPDATE peminjam SET nama='$nama', alamat='$alamat', no_handphone='$noHp' WHERE id_peminjam='$id'";
            $ql = mysqli_query($koneksi, $sql);
            
    
            if($ql) {
                $success = "Berhasil Update data peminjam";
                header("refresh:1;url=peminjam.php");
            } else {
                $error = "Gagal Update data peminjam: " . mysqli_error($koneksi);
                header("refresh:1;url=peminjam.php");
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
    <div class="container d-flex justify-content-center" style="margin-top: 250px;">
        <div class="card" style="width: 40rem;">
            <div class="card-header">
                <h2 class="text-center">Edit Data</h2>
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
                    <input type="hidden" name="id_peminjam" class="form-control" id="id" value="<?php echo $r1['id_peminjam']?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $r1['nama']?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $r1['alamat']?>">
                    </div>
                    <div class="mb-3">
                        <label for="noHandphone" class="form-label">No. Hp</label>
                        <input type="text" name="noHandphone" class="form-control" id="noHandphone" value="<?php echo $r1['no_handphone']?>">
                    </div>
                    <a href="peminjam.php" role="button" class="btn btn-secondary me-2">Close</a>
                    <button type="submit" name="update" value="simpan" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>