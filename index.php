<?php include('sidebar.php'); ?>

<?php
include_once('db/koneksi.php');

// Menghitung Banyak Barang
$barang = $mysqli->query("select * from tblbarang");

// Menghitung Banyak Barang Masuk
$barangMasuk = $mysqli->query("select * from tbltransaksi where statusTransaksi = 1");

// Menghitung Banyak Barang Keluar
$barangKeluar = $mysqli->query("select * from tbltransaksi where statusTransaksi = 0");

// Menghitung Banyak User
$user = $mysqli->query("select * from tbluser");
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= mysqli_num_rows($barang) ?></h3>

                            <p>Total Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= mysqli_num_rows($barangMasuk) ?></h3>

                            <p>Total Barang Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= mysqli_num_rows($barangKeluar) ?></h3>

                            <p>Total Barang Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= mysqli_num_rows($user) ?></h3>

                            <p>Total User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
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

<?php include('footer.php'); ?>