<?php
session_start();
require 'function.php';
$mahasiswa = mysqli_query($conn, 'SELECT * FROM gugunn');

// add user
if (isset($_POST["add"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil ditambah',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            });
            </script>   
                ";
    } else {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Data gagal ditambah',
                    icon: 'error'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            });
            </script>
            ";
    }
}
//function cari 

if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Gugun Gunawan</title>
</head>

<body>
    <!-- Nav start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Crud Sederhana</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="" method="post">
                    <input class="form-control me-2" type="text" placeholder="Search" name="keyword"
                        aria-label="Search">
                    <button class="btn btn-outline-info" type="submit" name="cari"><i
                            data-feather="search"></i></button>
                </form>
            </div>
        </div>
    </nav>
    <!-- nav end -->
    <!-- Table section -->
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
    }
    ?>
    <div class="button-add">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i data-feather="user-plus"></i>
        </button>
        <button class="btn btn-info" onclick="printPage()"><i data-feather="printer"></i>
        </button>
        <script>
            function printPage() {
                window.print();
            }

            feather.replace();
        </script>
    </div>
    <form method="post" class="" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:black;">Add Mahasiswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="color:black; justify-content:left; text-align:left;">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" id="id" name="id">
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">Nim</label>
                            <input class="form-control" type="text" id="nim" name="nim" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input class="form-control" type="text" id="nama" name="nama" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="tempat_tgl" class="form-label">Tempat Tanggal Lahir</label>
                            <input class="form-control" type="text" id="tempat_tgl" name="tempat_tgl">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kl" class="form-label">jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" id="jenis_kl"
                                name="jenis_kl">
                                <option selected>Lanang</option>
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="Another Gender">Another gender</option>
                                <option value="Anton">Anton</option>
                                <option value="Burhan">Burhan</option>
                                <option value="Adit">Adit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" aria-label="Default select example" id="agama" name="agama">
                                <option selected>Konghucu</option>
                                <option value="Islam">Islam</option>
                                <option value="Kris10">Kris10</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Katalog">Katalog</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input class="form-control" type="text" id="alamat" name="alamat"
                                placeholder="city or stret" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Jurusan</label>
                            <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
                                <option selected>Pendidikan mancing</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Farmasi">Farmasi</option>
                                <option value="Matematika">Matematika</option>
                            </select>
                        </div>
                        <div>
                            <label for="foto" class="form-label">Foto</label>
                            <input class="form-control" id="foto" name="foto" type="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                data-feather="x-circle"></i></button>
                        <button type="add" class="btn btn-primary" id="add" name="add"><i
                                data-feather="check-circle"></i></button>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end modal -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <th scope="col">Tempat Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Agama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Foto</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $rows): ?>
                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <?= $rows["nim"]; ?>
                    </td>
                    <td>
                        <?= $rows["nama"]; ?>
                    </td>
                    <td>
                        <?= $rows["tempat_tgl"]; ?>
                    </td>
                    <td>
                        <?= $rows["jenis_kl"]; ?>
                    </td>
                    <td>
                        <?= $rows["agama"]; ?>
                    </td>
                    <td>
                        <?= $rows["alamat"]; ?>
                    </td>
                    <td>
                        <?= $rows["jurusan"]; ?>
                    </td>
                    <td>
                        <img src="img/<?= $rows["foto"]; ?>" alt="foto" style="width: 60px; height: 35px;">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('<?= $rows['id']; ?>')">
                            <a style="text-decoration: none; color:white" href="#"><i data-feather="trash-2"></i></a>
                        </button>

                        <script>
                            function confirmDelete(id) {
                                Swal.fire({
                                    title: 'Yakin es?',
                                    text: 'Gampang banget menghapus',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Gasss!!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'hapus.php?id=' + id;
                                    }
                                });
                            }
                        </script>


                        <button type="button" class="btn btn-warning">
                            <a style="text-decoration: none; color:white;" href="edit.php ? id=<?= $rows["id"]; ?>"><i
                                    data-feather="edit"></i></a>
                        </button>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
