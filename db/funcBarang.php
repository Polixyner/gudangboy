<?php   
    if ((isset($_POST['proses']) and $_POST['proses'] == 'Tambah')) {
        add();
    } elseif (isset($_GET['proses']) and $_GET['proses'] == 'hapus') {
        delete();
    } else {
        edit();
    }

    function add(){
        include_once('koneksi.php');
        $nama = $_POST['nama'];
        $exec = mysqli_query($mysqli, "INSERT INTO tblbarang VALUES ('','$nama','')");
        if ($exec) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    function delete(){
        include_once('koneksi.php');
        $id = $_GET['id'];
        $exec = $mysqli->query("DELETE FROM tblbarang WHERE idBarang='$id'");
        if ($exec) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    function edit(){
        include_once('koneksi.php');
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $exec = mysqli_query($mysqli, "UPDATE tblbarang SET namaBarang='$nama' WHERE idBarang='$id'");
        if ($exec) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>