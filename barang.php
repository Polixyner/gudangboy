<?php include('sidebar.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barang</h1>
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
        <!-- ./row -->
        <div class="row p-4">
            <div class="col-12 col-sm-12 ">
                <div class="card card-primary card-tabs card-outline">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Barang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Tambah & Edit</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Barang</th>
                                                    <th>Stok</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once('db/koneksi.php');
                                                $no = 1;
                                                $query = "SELECT * FROM tblbarang";
                                                $result = $mysqli->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($data = $result->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $data['namaBarang'] ?></td>
                                                            <td><?= $data['stokBarang'] ?></td>
                                                            <td>
                                                                <button id="btnEdit" class="btn btn-sm btn-primary" onclick="editBarang('<?= $data['idBarang'] ?>','<?= $data['namaBarang'] ?>')">Edit</button>
                                                                <a href="db/funcBarang.php?id=<?= $data['idBarang'] ?>&proses=hapus" class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                                </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Tambah & Edit Barang</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="db/funcBarang.php" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Barang</label>
                                                <input type="hidden" name="id" id="idBarang">
                                                <input type="text" class="form-control" id="namaBarang" name="nama" placeholder="Masukkan Nama Barang">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <input type="submit" name="proses" id="proses" value="Tambah" class="btn btn-primary">
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


<?php include('footer.php'); ?>