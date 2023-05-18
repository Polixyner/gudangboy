<?php
session_start();
if ((isset($_POST['proses']) and $_POST['proses'] == 'Tambah')) {
    add();
} elseif (isset($_GET['proses']) and $_GET['proses'] == 'hapus') {
    delete();
} elseif (isset($_POST['proses']) and $_POST['proses'] == 'Update') {
    edit();
} else {
    echo '<script>window.location.href = "../index.php";</script>';
}

function add()
{
    include_once('koneksi.php');
    $nama = $_POST['nama'];
    $exec = mysqli_query($mysqli, "INSERT INTO tblbarang VALUES ('','$nama','')");
    if ($exec) {
        $_SESSION['flash_message'] = "Berhasil Menambah Data Barang";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function delete()
{
    include_once('koneksi.php');
    $id = $_GET['id'];
    $exec = $mysqli->query("DELETE FROM tblbarang WHERE idBarang='$id'");
    if ($exec) {
        $_SESSION['flash_message'] = "Berhasil Menghapus Data Barang";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function edit()
{
    include_once('koneksi.php');
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $exec = mysqli_query($mysqli, "UPDATE tblbarang SET namaBarang='$nama' WHERE idBarang='$id'");
    if ($exec) {
        $_SESSION['flash_message'] = "Berhasil Mengupdate Data Barang";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
