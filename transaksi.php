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
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dasboard</a></li>
                                <li class="breadcrumb-item active">Transaksi</li>
                            </ol>
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
                            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Tambah</a>
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
                                        <th class="text-center">Status Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Stok Transaksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Shampo</td>
                                        <td class="text-center"> <button class="btn btn-sm btn-danger">keluar</button></td>
                                        <td>12/05/2023</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Sabun Mandi</td>
                                        <td class="text-center"><button class="btn btn-sm btn-success">masuk</button></td>
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
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Transaksi</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                    <div class="form-group">
                                        <label>Date and time:</label>
                                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Minimal</label>
                                        <select class="form-control select2" >
                                            <option>Pilih Barang</option>
                                            <option>Shampo</option>
                                            <option>Sabun Mandi</option>
                                            <option>Sapu</option>
                                            <option>Bola Bekel</option>
                                        </select>
                                        </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok</label>
                                        <input type="number" class="form-control" id="" placeholder="Masukkan Jumlah Stok">
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                                        <label for="customRadio1" class="custom-control-label">Tambah Stock</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" >
                                        <label for="customRadio2" class="custom-control-label">Kurangi Stock</label>
                                    </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Proses</button>
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