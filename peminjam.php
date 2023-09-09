<?php

    // Memanggil koneksi menuju database
    include_once("connection.php");

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
        <div class="card" style="width: 60rem;">
            <div class="card-header d-flex">
                <a href="index.php" class="btn me-3 rounded-circle" style="padding:10px; border:none">
                    <i class="fa-solid fa-circle-xmark fa-2xl" style="color: #ff0000;"></i>
                </a>
                <h1>Data Peminjam</h1>
            </div>
            <div class="card-body">
                <a href="add.php">
                    <button type="button" class="btn btn-success mb-3">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </a>
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
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Hp</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        // Memanggil data dari database
                        $sql1 = "SELECT * FROM `peminjam`";
                        $k1 = mysqli_query($koneksi, $sql1);
                        $urut = 1;
                        while($peminjam = mysqli_fetch_assoc($k1)) {
            
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $urut++ ?></td>
                        <td><?php echo $peminjam['nama'] ?></td>
                        <td><?php echo $peminjam['alamat'] ?></td>
                        <td><?php echo $peminjam['no_handphone'] ?></td>
                        <td class="text-center">
                            <a href="update.php?id_peminjam=<?= $peminjam['id_peminjam'] ?>" role="button" class="btn btn-warning me-2">
                                <i class="fa-solid fa-pen-to-square" style="color: white;"></i>
                            </a>
                            <a href="delete.php?id_peminjam=<?= $peminjam['id_peminjam'] ?>" onclick="return confirm('Yakin mau delete data?')" role="button" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>