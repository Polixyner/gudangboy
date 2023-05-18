<?php
include_once('db/koneksi.php');

// Menghitung Banyak Barang
$barang = $mysqli->query("select * from tblbarang");

// Menghitung Banyak Barang Masuk
$barangMasuk = $mysqli->query("select * from tbltransaksi where statusTransaksi = 1");

// Menghitung Banyak Barang Keluar
$barangKeluar = $mysqli->query("select * from tbltransaksi where statusTransaksi = 0");

// Menghitung Banyak User
if ($_SESSION["role"] === "Owner") {
    $user = $mysqli->query("select * from tbluser WHERE roleUser!='Owner'");
} elseif ($_SESSION["role"] === "Manager") {
    $user = $mysqli->query("select * from tbluser WHERE roleUser='Staff'");
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php if ($_SESSION["role"] === "Owner" || $_SESSION["role"] === "Manager") : ?>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= mysqli_num_rows($barangMasuk) ?></h3>
                                <p>Total Barang Masuk</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-arrow-circle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= mysqli_num_rows($barangKeluar) ?></h3>
                                <p>Total Barang Keluar</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-arrow-circle-up"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?= mysqli_num_rows($user) ?></h3>
                                <p>Total User</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php elseif ($_SESSION["role"] === "Staff") : ?>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= mysqli_num_rows($barang) ?></h3>
                                <p>Total Barang</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-boxes"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= mysqli_num_rows($barangMasuk) ?></h3>
                                <p>Total Barang Masuk</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-arrow-circle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= mysqli_num_rows($barangKeluar) ?></h3>
                                <p>Total Barang Keluar</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-arrow-circle-up"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif ?>
            </div>
            <!-- /.row -->
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- Main content -->

    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div>