<?php include('sidebar.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
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
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once('db/koneksi.php');
                                                $no = 1;
                                                $query = "SELECT * FROM tbluser";
                                                $result = $mysqli->query($query);
                                                if ($result->num_rows > 0) {
                                                    while ($data = $result->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $data['namaUser'] ?></td>
                                                            <td><?= $data['emailUser'] ?></td>
                                                            <td><?= $data['roleUser'] ?></td>
                                                            <?php if ($data['roleUser'] != "Owner") { ?>
                                                                <td>
                                                                    <button id="btnEdit" class="btn btn-sm btn-primary" onclick="editUser('<?= $data['idUser'] ?>','<?= $data['namaUser'] ?>','<?= $data['emailUser'] ?>','<?= $data['roleUser'] ?>')">Edit</button>
                                                                    <a href="db/funcUser.php?id=<?= $data['idUser'] ?>&proses=hapus" class="btn btn-sm btn-danger">Delete</a>
                                                                </td>
                                                            <?php } ?>
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
                                    <form action="db/funcUser.php" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="hidden" name="id" id="idUser">
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama User" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email User" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select class="custom-select rounded-0" name="role" id="role" required>
                                                    <option selected disabled value>Pilih Role</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
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