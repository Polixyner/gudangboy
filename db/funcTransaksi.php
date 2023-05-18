<?php
session_start();
include_once 'koneksi.php';

if ((isset($_POST['proses']))) {
    if (isset($_POST['proses']) and $_POST['proses'] == 'masuk') {
        transaksiMasuk();
    } else if (isset($_POST['proses']) and $_POST["proses"] == 'keluar') {
        transaksiKeluar();
    }
} else {
    echo '<script>window.location.href = "../index.php";</script>';
}

function transaksiMasuk()
{
    global $mysqli;
    $tanggal = $_POST['tanggal'];
    $barang = $_POST['barang'];
    $stok = $_POST['stok'];

    $eksekusi = mysqli_query($mysqli, "INSERT INTO tbltransaksi (idBarang,statusTransaksi,tanggalTransaksi,stokTransaksi) VALUES ('$barang', '1', '$tanggal', '$stok')");

    if ($eksekusi) {

        // Get Stok
        $querySelect = mysqli_query($mysqli, "SELECT stokBarang FROM tblbarang WHERE idBarang = '$barang'")->fetch_assoc();
        $getStok = $querySelect['stokBarang'];
        $total = $getStok + $stok;

        // Update Stok
        $eksekusiUpdate = mysqli_query($mysqli, "UPDATE tblbarang SET stokBarang = '$total' WHERE idBarang = '$barang'");

        if ($eksekusiUpdate) {
            $_SESSION['flash_message'] = "Berhasil Melakukan Transaksi Masuk";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['flash_error'] = "Gagal Melakukan Transaksi Masuk";
        }
    } else {
        $_SESSION['flash_error'] = "Gagal Melakukan Transaksi Masuk";
    }
}

function transaksiKeluar()
{
    global $mysqli;
    $tanggal = $_POST['tanggal'];
    $barang = $_POST['barang'];
    $stok = $_POST['stok'];

    $eksekusi = mysqli_query($mysqli, "INSERT INTO tbltransaksi (idBarang,statusTransaksi,tanggalTransaksi,stokTransaksi) VALUES ('$barang', '0', '$tanggal', '$stok')");

    if ($eksekusi) {

        // Get Stok
        $querySelect = mysqli_query($mysqli, "SELECT stokBarang FROM tblbarang WHERE idBarang = '$barang'")->fetch_assoc();
        $getStok = $querySelect['stokBarang'];
        $total = $getStok - $stok;

        // Update Stok
        $eksekusiUpdate = mysqli_query($mysqli, "UPDATE tblbarang SET stokBarang = '$total' WHERE idBarang = '$barang'");

        if ($eksekusiUpdate) {
            $_SESSION['flash_message'] = "Berhasil Melakukan Transaksi Keluar";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['flash_error'] = "Gagal Melakukan Transaksi Keluar";
        }
    } else {
        $_SESSION['flash_error'] = "Gagal Melakukan Transaksi Keluar";
    }
}
