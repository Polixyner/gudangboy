<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Transaksi</h1>
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
                <div class="card-body">
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
                                    $query = "SELECT tbltransaksi.idTransaksi, tbltransaksi.statusTransaksi, tbltransaksi.tanggalTransaksi, tbltransaksi.stokTransaksi, tblbarang.namaBarang
                                                FROM tbltransaksi
                                                INNER JOIN tblbarang ON tbltransaksi.idBarang=tblbarang.idBarang;";
                                    $result = $mysqli->query($query);
                                    $no = 1;
                                    if ($result->num_rows > 0) {
                                        while ($data = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?></td>
                                                <td>
                                                    <?= $data['namaBarang'] ?></td>
                                                <td class="text-center">
                                                    <?php if ($data['statusTransaksi'] == '1') { ?>
                                                        <button class="btn btn-sm btn-success">Masuk</button>
                                                    <?php } else { ?>
                                                        <button class="btn btn-sm btn-danger">Keluar</button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?= $data['tanggalTransaksi'] ?></td>
                                                <td>
                                                    <?= $data['stokTransaksi'] ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?></tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
</div>
</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->
</div>