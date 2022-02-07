<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Supplier</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Supplier</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h5>Striped Table</h5>
                            <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span> -->
                            <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#supplierModal" data-whatever="@mdo"><i class="feather icon-plus"></i> Tambah</button>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($this->session->flashdata('sukses')) {
                                echo "<p class='alert alert-success alert-slide-up'>";
                                echo $this->session->flashdata('sukses');
                                echo "</p>";
                            }
                            ?>
                            <?php
                            echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
                            ?>
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Keterangan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) : ?>
                                        <tr>
                                            <td width="5%"><?= $key + 1 ?></td>
                                            <td width="20%"><?= $value->nama_supplier ?></td>
                                            <td width="10%"><?= $value->telepon_supplier ?></td>
                                            <td><?= $value->alamat_supplier ?></td>
                                            <td width="15%"><?= $value->keterangan ?></td>
                                            <td width="20%">
                                                <button type="button" name="supplier" id="<?= $value->id_supplier ?>" class="btn btn-warning ubah-supplier"><i class="fa fa-edit"></i> Ubah</button>
                                              <a href="<?= base_url() ?>supplier/delete/<?= $value->id_supplier ?>" class="btn btn-danger hapus-supplier"><i class="feather icon-trash"></i> hapus</a>
                                          </td>
                                      </tr>
                                  <?php endforeach ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>supplier" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input id="nama" class="form-control" type="text" name="nama" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input id="telepon" class="form-control" type="number" name="telepon" placeholder="Telepon" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" required></textarea>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>