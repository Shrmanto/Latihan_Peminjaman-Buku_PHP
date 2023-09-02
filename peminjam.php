<?php

    // Memanggil koneksi menuju database
    include_once("connection.php");

    // var_dump($result)

    $nama = "";
    $alamat = "";
    $noHp = "";

    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }

    if ($op == 'edit'){
        $id     = $_GET['id_peminjam'];
        $sql1    = "select * from peminjam where id_peminjam = '$id'";
        $ql     = mysqli_query($koneksi, $sql1);
    }

    if($op == 'delete'){
        $id         = $_GET['id_peminjam'];
        $sql1       = "delete from peminjam where id_peminjam = '$id'";
        $q1         = mysqli_query($koneksi,$sql1);
        if($q1){
            $sukses = "Berhasil hapus data";
        }else{
            $error  = "Gagal melakukan delete data";
        }
    }

    if(isset($_POST['add'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $noHp = $_POST['noHandphone'];

        if ($nama && $alamat && $noHp){

            if ($op == 'edit'){
                $sql_edit = "update peminjam set nama = '$nama',alamat = '$alamat',no_handphone='$noHp' where id_peminjam = '$id'";
                $ql = mysqli_query($koneksi, $sql_edit);

                if($ql) {
                    echo "Berhasil Update Data peminjam";
                } else {
                    echo "Gagal Update Data peminjam: " . mysqli_error($koneksi);
                }
            }else{
                $sql = "INSERT INTO peminjam (nama, alamat, no_handphone) VALUES ('$nama', '$alamat', '$noHp')";
                $ql = mysqli_query($koneksi, $sql);
                
        
                if($ql) {
                    echo "Berhasil menambah data peminjam";
                } else {
                    echo "Gagal menambah data peminjam: " . mysqli_error($koneksi);
                }
            }
            
        }else{
            echo "Silahkan Masukan Data!!";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="style-peminjam.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="content-home">
        <div class="content">
            <div class="content-table">
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No. Hp</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                                // Memanggil data dari database
                                $sql_data = mysqli_query($koneksi, 'SELECT * FROM peminjam');
                                $urut = 1;
                                while($peminjam = mysqli_fetch_array($sql_data)) {
                            ?>
                            <tr>
                                <td><?php echo $urut++ ?></td>
                                <td><?php echo $peminjam['nama']; ?></td>
                                <td><?php echo $peminjam['alamat']; ?></td>
                                <td><?php echo $peminjam['no_handphone']; ?></td>
                                <td>
                                    <a href="peminjam.php?op=edit&id_peminjam=<?php echo $peminjam['id_peminjam']; ?>">
                                        <button type="button" class="btn btn-success me-2">
                                            Edit
                                        </button>
                                    </a>
                                    <a href="peminjam.php?op=delete&id_peminjam=<?php echo $peminjam['id_peminjam']; ?>" onclick="return confirm('Yakin mau delete data?')">
                                        <button type="button" class="btn btn-danger">
                                            Delete
                                        </button>
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
            <div class="content-form">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Input Data/Update Data</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?php echo $nama?>">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?php echo $alamat?>">
                            </div>
                            <div class="mb-3">
                                <label for="noHandphone" class="form-label">No. Hp</label>
                                <input type="text" name="noHandphone" class="form-control" id="noHandphone" placeholder="No. Handphone" value="<?php echo $noHp?>">
                            </div>
                            <div class="text-center">
                                <input type="submit" name="add" value="Simpan" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>