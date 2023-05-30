<?php
include_once('db/koneksi.php');
$awal = $_GET['awal'];
$akhir = $_GET['akhir'];

if (empty($awal) && empty($akhir)) {
    $query = "SELECT tbltransaksi.idTransaksi, tbltransaksi.statusTransaksi, tbltransaksi.tanggalTransaksi, tbltransaksi.stokTransaksi, tblbarang.namaBarang, tbluser.namaUser
    FROM tbltransaksi
    INNER JOIN tblbarang ON tbltransaksi.idBarang=tblbarang.idBarang
    INNER JOIN tbluser ON tbltransaksi.idUser=tbluser.idUser";
}else{
    $query = "SELECT tbltransaksi.idTransaksi, tbltransaksi.statusTransaksi, tbltransaksi.tanggalTransaksi, tbltransaksi.stokTransaksi, tblbarang.namaBarang, tbluser.namaUser
    FROM tbltransaksi
    INNER JOIN tblbarang ON tbltransaksi.idBarang=tblbarang.idBarang
    INNER JOIN tbluser ON tbltransaksi.idUser=tbluser.idUser WHERE tanggalTransaksi BETWEEN '$awal' AND '$akhir'";
}

$result = $mysqli->query($query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($data);



?>