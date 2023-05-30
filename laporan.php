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
                            <div class="div">
                                <label for="">Filter Berdasarkan Bulan : </label>
                                <select class="form-control mb-2" name="bulan" id="bulan">
                                    <option selected value="">*</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <form id="searchDate">
                                <div class="div mb-3 mt-3">
                                    <label for="">Filter Berdasarkan Rentang Tanggal :</label>
                                    <div class="row">
                                        <div class="col-5">
                                            Dari Tanggal:
                                            <input class="form-control" type="date" name="awal" id="awal" required>
                                        </div>
                                        <div class="col-5">
                                            Sampai Tanggal:
                                            <input class="form-control" type="date" name="akhir" id="akhir" required>
                                        </div>
                                        <div class="col-1">
                                            <br><button class="btn btn-primary btn-block" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        <div class="col-1">
                                            <br><button class="btn btn-warning btn-block" type="reset" id="dateReset">
                                                <i class="fas fa-sync"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Barang</th>
                                        <th class="text-center">Status Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Input By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once 'db/koneksi.php';
                                    $query = "SELECT tbltransaksi.idTransaksi, tbltransaksi.statusTransaksi, tbltransaksi.tanggalTransaksi, tbltransaksi.stokTransaksi, tblbarang.namaBarang, tbluser.namaUser
                                                FROM tbltransaksi
                                                INNER JOIN tblbarang ON tbltransaksi.idBarang=tblbarang.idBarang
                                                INNER JOIN tbluser ON tbltransaksi.idUser=tbluser.idUser";
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
                                        <td><?= $data['namaUser'] ?></td>
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