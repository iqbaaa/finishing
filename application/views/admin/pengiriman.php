    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php $this->view('admin/partial/alertsukses') ?>
                        <?php //$this->view('admin/partial/alerthapus') 
                        ?>
                        <?= form_error(); ?>
                        <div class="card">
                            <div class="card-header card-primary">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">tambah</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Qty</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Nomer Surat Jalan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pengiriman as $peng) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $peng->namaProduk ?></td>
                                                <td><?= $peng->qty ?></td>
                                                <td><?= $peng->tanggalKirim ?></td>
                                                <td><?= $peng->noSuratJalan ?></td>
                                                <td><?= $peng->status ?></td>
                                                <td>
                                                    <a type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $peng->idPengiriman; ?>"><i class="fas fa-edit"></i></a>
                                                    <a href="<?= site_url('Pengiriman/delete/' . $peng->idPengiriman) ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <!-- Modal ubah -->
                                            <div class="modal fade" id="edit<?= $peng->idPengiriman ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Form Ubah Produk</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= site_url('Pengiriman/edit') ?>" method="POST" role="form" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label for="">Produk</label>
                                                                        <input type="text" class="form-control" name="namaProduk" value="<?= $peng->namaProduk ?>" id="" disabled>
                                                                        <input type="hidden" class="form-control" name="id" value="<?= $peng->idPengiriman ?>" id="">
                                                                        <input type="hidden" name="idProdukFK" value="<?=$peng->idProdukFK ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Qty</label>
                                                                        <input class="form-control" type="text" name="qty" value="<?= $peng->qty ?>" placeholder="Qty" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Tanggal Kirim</label>
                                                                        <input class="form-control" type="date" name="tanggalKirim" placeholder="" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Nomer Surat Jalan</label>
                                                                        <input class="form-control" type="text" name="noSuratJalan" value="<?= $peng->noSuratJalan ?>" placeholder="Nomer Surat Jalan" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Status</label>
                                                                        <input class="form-control" type="text" name="status" placeholder="status" value="<?= $peng->status ?>" />
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Modal tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Form Tambah Produk</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('Pengiriman/add') ?>" method="POST" role="form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Pilih Produk</label>
                            <select name="idProdukFK" class="form-control" id="">
                                <?php foreach ($produk as $pro) { ?>
                                    <option value="<?= $pro->idProduk ?>"><?= $pro->namaProduk ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Qty</label>
                            <input class="form-control" type="text" name="qty" placeholder="Qty" />
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Kirim</label>
                            <input class="form-control" type="date" name="tanggalKirim" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="">Nomer Surat Jalan</label>
                            <input class="form-control" type="text" name="noSuratJalan" placeholder="Nomer Surat Jalan" />
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input class="form-control" type="text" name="status" placeholder="status" />
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>