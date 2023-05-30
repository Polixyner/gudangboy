<?php
include_once('db/koneksi.php');
$bulan = $_GET['bulan'];
$date = date("Y/m/d");

if (empty($bulan)) {
    $query = "SELECT tbltransaksi.idTransaksi, tbltransaksi.statusTransaksi, tbltransaksi.tanggalTransaksi, tbltransaksi.stokTransaksi, tblbarang.namaBarang, tbluser.namaUser
    FROM tbltransaksi
    INNER JOIN tblbarang ON tbltransaksi.idBarang=tblbarang.idBarang
    INNER JOIN tbluser ON tbltransaksi.idUser=tbluser.idUser";
}else{
    $query = "SELECT tbltransaksi.idTransaksi, tbltransaksi.statusTransaksi, tbltransaksi.tanggalTransaksi, tbltransaksi.stokTransaksi, tblbarang.namaBarang, tbluser.namaUser
    FROM tbltransaksi
    INNER JOIN tblbarang ON tbltransaksi.idBarang=tblbarang.idBarang
    INNER JOIN tbluser ON tbltransaksi.idUser=tbluser.idUser WHERE DATE_FORMAT(tanggalTransaksi, '%m') = '$bulan' ;";
}

$result = $mysqli->query($query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($data);



?>