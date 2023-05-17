<?php include('sidebar.php');?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6"></div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- ./row -->
        <div class="row p-4">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                    href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                    aria-selected="true">Riwayat Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-three-profile" role="tab"
                                    aria-controls="custom-tabs-three-profile" aria-selected="false">Tambah Transaksi
                                    Masuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                                    href="#custom-tabs-three-messages" role="tab"
                                    aria-controls="custom-tabs-three-messages" aria-selected="false">Tambah Transaksi
                                    Keluar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                                aria-labelledby="custom-tabs-three-home-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Barang</th>
                                                    <th class="text-center">Status Transaksi</th>
                                                    <th>Tanggal</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once 'db/koneksi.php';
                                                $query ="SELECT tbltransaksi.idTransaksi, tbltransaksi.statusTransaksi, tbltransaksi.tanggalTransaksi, tbltransaksi.stokTransaksi, tblbarang.namaBarang
                                                FROM tbltransaksi
                                                INNER JOIN tblbarang ON tbltransaksi.idBarang=tblbarang.idBarang;";
                                                $result = $mysqli->query($query); $no = 1; if ($result->num_rows > 0) { while ($data = $result->fetch_assoc()) { ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++?></td>
                                                    <td>
                                                        <?= $data['namaBarang']?></td>
                                                    <td class="text-center">
                                                        <?php if ($data['statusTransaksi'] == '1') {?>
                                                        <button class="btn btn-sm btn-success">Masuk</button>
                                                        <?php }else{?>
                                                        <button class="btn btn-sm btn-danger">Keluar</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['tanggalTransaksi']?></td>
                                                    <td>
                                                        <?= $data['stokTransaksi']?></td>
                                                </tr>
                                                <?php
                                                }}
                                            ?></tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-three-profile-tab">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Tambah Transaksi Masuk</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="db/funcTransaksi.php" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <div class="input-group date" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input class="form-control" type="date" name="tanggal" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <select class="form-control select2" name="barang" required>
                                                    <option disabled selected value>Pilih Barang</option>
                                                    <?php
                                                include_once 'koneksi.php';
                                                $query ="select * from tblbarang";
                                                $result = $mysqli->
												query($query); $no = 1; if ($result->num_rows > 0) { while ($data = $result->fetch_assoc()) { ?>
                                                    <option value="<?= $data['idBarang']?>"><?= $data['namaBarang']?>
                                                    </option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Stok</label>
                                                <input type="number" class="form-control" name="stok"
                                                    placeholder="Masukkan Jumlah Stok" required>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" name="proses" value="masuk"
                                                class="btn btn-primary">Proses</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-three-messages-tab">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Tambah Transaksi Keluar</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="db/funcTransaksi.php" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <div class="input-group date" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input class="form-control" type="date" name="tanggal" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <select class="form-control select2" name="barang" id="barangid"
                                                    required>
                                                    <option disabled selected value>Pilih Barang</option>
                                                    <?php
                                                include_once 'koneksi.php';
                                                $query ="select * from tblbarang";
                                                $result = $mysqli->
												query($query); $no = 1; if ($result->num_rows > 0) { while ($data = $result->fetch_assoc()) { ?>
                                                    <option value="<?= $data['idBarang']?>"><?= $data['namaBarang']?>
                                                    </option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <select class="form-control select2" required name="stok" id="stok">
                                                    <option disabled selected value>0</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" name="proses"
                                                value="keluar">Proses</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
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