<?php
if ((isset($_POST['proses']) and $_POST['proses'] == 'Tambah')) {
    add();
} elseif (isset($_GET['proses']) and $_GET['proses'] == 'hapus') {
    delete();
} else {
    edit();
}

function add()
{
    include_once('koneksi.php');
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $exec = mysqli_query($mysqli, "INSERT INTO tbluser VALUES ('','$nama','$email','$passwordHash','$role')");
    if ($exec) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function delete()
{
    include_once('koneksi.php');
    $id = $_GET['id'];
    $exec = $mysqli->query("DELETE FROM tbluser WHERE idUser='$id'");
    if ($exec) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

function edit()
{
    include_once('koneksi.php');
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if ($password == "") {
        $exec = mysqli_query($mysqli, "UPDATE tbluser SET namaUser='$nama', emailUser='$email', roleUser='$role' WHERE idUser='$id'");
    } else {
        $exec = mysqli_query($mysqli, "UPDATE tbluser SET namaUser='$nama', emailUser='$email', passwordUser='$passwordHash' , roleUser='$role' WHERE idUser='$id'");
    }


    if ($exec) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
