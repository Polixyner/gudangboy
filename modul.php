<?php

$halaman = isset($_GET['page']) ? $_GET['page'] : ""; // Mengakses Variabel URL
if ($_SESSION["role"] === "Owner") {
    if ($halaman == "dashboard" || $halaman == "") {
        include("dashboard.php");
    } elseif ($halaman == "laporan") {
        include("laporan.php");
    } elseif ($halaman == "user") {
        include("user.php");
    } else {
        echo '<script>window.location.href = "index.php";</script>';
    }
} elseif ($_SESSION["role"] === "Manager") {
    if ($halaman == "dashboard" || $halaman == "") {
        include("dashboard.php");
    } elseif ($halaman == "laporan") {
        include("laporan.php");
    } elseif ($halaman == "user") {
        include("user.php");
    } else {
        echo '<script>window.location.href = "index.php";</script>';
    }
} elseif ($_SESSION["role"] === "Staff") {
    if ($halaman == "dashboard" || $halaman == "") {
        include("dashboard.php");
    } elseif ($halaman == "barang") {
        include("barang.php");
    } elseif ($halaman == "transaksi") {
        include("transaksi.php");
    } else {
        echo '<script>window.location.href = "index.php";</script>';
    }
}
