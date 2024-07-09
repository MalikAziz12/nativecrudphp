<?php

$conn = mysqli_connect("localhost", "root", "", "gugun");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($rows = mysqli_fetch_assoc($result)) {
        $row[] = $rows;
    }
    return $row;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM gugunn WHERE id = $id");
    return mysqli_affected_rows($conn);

}

function cari($keyword)
{
    $query = "SELECT*FROM gugunn
    WHERE
    id LIKE '%keyword%' OR
    nim LIKE '%$keyword%' OR
    nama LIKE '%$keyword%' OR
    tempat_tgl LIKE '%$keyword%' OR
    jenis_kl LIKE '%$keyword%' OR
    agama LIKE '%$keyword%' OR
    alamat LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' OR
    foto LIKE '%$keyword%'

    ";

    return query($query);
}
function tambah($add)
{
    global $conn;
    $id = htmlspecialchars($add["id"]);
    $nim = htmlspecialchars($add["nim"]);
    $nama = htmlspecialchars($add["nama"]);
    $tempat_tgl = htmlspecialchars($add["tempat_tgl"]);
    $jenis_kl = htmlspecialchars($add["jenis_kl"]);
    $agama = htmlspecialchars($add["agama"]);
    $alamat = htmlspecialchars($add["alamat"]);
    $jurusan = htmlspecialchars($add["jurusan"]);

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO gugunn VALUES ('$id','$nim','$nama','$tempat_tgl','$jenis_kl','$agama','$alamat','$jurusan','$foto')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $tempat_tgl = htmlspecialchars($data["tempat_tgl"]);
    $jenis_kl = htmlspecialchars($data["jenis_kl"]);
    $agama = htmlspecialchars($data["agama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    if ($_FILES["foto"]["error"] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE gugunn SET 
    id = '$id',
    nim = '$nim',
    nama = '$nama',
    tempat_tgl = '$tempat_tgl',
    jenis_kl = '$jenis_kl',
    agama = '$agama',
    alamat = '$alamat',
    jurusan = '$jurusan',
    foto = '$foto'

    WHERE id = $id ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // pengecekan gambar yang di uplload
    if ($error === 4) {
        echo "<script>
        alert('uplod gambar terlebih dahulu');
        </script>";

        return false;
    }

    // pengaplodan hanya gambar

    $eksentensiGambarValid = ['jpg', 'png', 'jpeg'];
    $eksentensiGambar = explode('.', $namaFile); //memcah string
    $eksentensiGambar = strtolower(end($eksentensiGambar)); //mengambil ekstensi

    if (!in_array($eksentensiGambar, $eksentensiGambarValid)) {
        echo "<script>
        alert('uplod gambar yang betul coi');
        </script>";
        return false;
    }

    //pengecekan ukuran file

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('uplod gambar terlebih besar');
        </script>";
        return false;
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $eksentensiGambar;

    //pengplodan foto
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

?>