<?php
session_start();
require 'function.php';


$id = $_GET["id"];
$edit = query("SELECT * FROM gugunn WHERE id = $id")[0];


if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        $_SESSION['message'] = "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                                    Data berhasil diupdate.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
    } else {
        $_SESSION['message'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    Data gagal diupdate.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
    }
    header('Location: index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <h1 style="text-align:center">Edit Mahasiswa</h1>
    <!-- <div class="container mt-5">
      -->
    <form action="" method="post" enctype="multipart/form-data"
        style="margin: 2rem 2rem; width:900px; justify-content:center; padding-left:30rem;">
        <div class="mb-3">
            <input class="form-control" type="hidden" id="id" name="id" value="<?= $edit["id"]; ?>">
        </div>
        <div class="mb-3">
            <input class="form-control" type="hidden" id="fotoLama" name="fotoLama" value="<?= $edit["foto"]; ?>">
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">Nim</label>
            <input class="form-control" type="text" id="nim" name="nim" autocomplete="off" value="<?= $edit["nim"]; ?>">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input class="form-control" type="text" id="nama" name="nama" autocomplete="off"
                value="<?= $edit["nama"]; ?>">
        </div>
        <div class="mb-3">
            <label for="tempat_tgl" class="form-label">Tempat Tanggal Lahir</label>
            <input class="form-control" type="text" id="tempat_tgl" name="tempat_tgl"
                value="<?= $edit["tempat_tgl"]; ?>">
        </div>
        <div class="mb-3">
            <label for="jenis_kl" class="form-label">jenis Kelamin</label>
            <select class="form-select" aria-label="Default select example" id="jenis_kl" name="jenis_kl">
                <option value="<?= $edit["jenis_kl"]; ?>"><?= $edit["jenis_kl"]; ?></option>
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
            <select class="form-select" aria-label="Default select example" id="agama" name="agama"
                value="<?= $edit["agama"]; ?>">
                <option value="<?= $edit["agama"]; ?>"><?= $edit["agama"]; ?></option>
                <option value="Konghucu">Konghucu</option>
                <option value="Islam">Islam</option>
                <option value="Kris10">Kris10</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Katalog">Katalog</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input class="form-control" type="text" id="alamat" name="alamat" placeholder="city or stret"
                autocomplete="off" value="<?= $edit["alamat"]; ?>">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Jurusan</label>
            <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan"
                value="<?= $edit["jurusan"]; ?>">
                <option value="<?= $edit["jurusan"]; ?>"><?= $edit["jurusan"]; ?></option>
                <option value="Pendidikan Mancing">Pendidikan mancing</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Farmasi">Farmasi</option>
                <option value="Matematika">Matematika</option>
            </select>
        </div>
        <div>
            <label for="foto" class="form-label">Foto</label>
            <img src="img/<?= $edit["foto"]; ?>" alt="foto" style="width: 50px; height: 30px;">
            <input class="form-control" id="foto" name="foto" type="file">
        </div>
        <div class="col-12" style="margin-top:0.8rem; margin-bottom:1rem;">

            <button type="submit" name="submit" id="submit" class="btn btn-primary"><i
                    data-feather="check-circle"></i></button>
            <button type="button" name="cancel" id="cancel" class="btn btn-warning"><a href="index.php"
                    style="text-decoration:none; color:white;"><i data-feather="x-circle"></i></a>

                <!-- <button type="button" id="submit" name="submit" class="btn btn-primary">
                <i data-feather="check-circle"></i>
            </button>
            <button type="button" id="cancel" name="cancel" class="btn btn-warning"><a
                    style="text-decoration: none; color:white;" href="index.php"><i data-feather="x-circle"></i></a>

            </button> -->
        </div>

    </form>
    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <!-- <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>