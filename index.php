<?php include('sidebar.php');?>

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
                            <h3><?= mysqli_num_rows($barang)?></h3>

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
                            <h3><?= mysqli_num_rows($barangMasuk)?></h3>

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
                            <h3><?= mysqli_num_rows($barangKeluar)?></h3>

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
                            <h3><?= mysqli_num_rows($user)?></h3>

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
    <section class="content">
        <!-- ./row -->
        <div class="row p-4">
            <div class="col-12 col-sm-12 ">
                <div class="card card-primary card-tabs card-outline">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                    href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                    aria-selected="true">Barang</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                aria-labelledby="custom-tabs-one-home-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Barang</th>
                                                    <th class="text-center">Status Transaksi</th>
                                                    <th>Tanggal</th>
                                                    <th>Stok Transaksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Shampo</td>
                                                    <td class="text-center"> <button
                                                            class="btn btn-sm btn-danger">keluar</button></td>
                                                    <td>12/05/2023</td>
                                                    <td>12</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Sabun Mandi</td>
                                                    <td class="text-center"><button
                                                            class="btn btn-sm btn-success">masuk</button></td>
                                                    <td>09/05/2023</td>
                                                    <td>120</td>
                                                </tr>
                                                </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</div>
</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->
</div>

<?php include('footer.php');?>