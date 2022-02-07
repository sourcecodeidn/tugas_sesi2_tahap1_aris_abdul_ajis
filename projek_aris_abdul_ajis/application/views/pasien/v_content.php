<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Pasien</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Pasien</a></li>
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
                            <a href="<?= base_url() ?>pasien/add" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah  Pasien Baru</a>
                        </div>
                        <div class="card-body table-border-style">

                            <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Registrasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Pasien Terdaftar</a>
                            </li>
                            
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="profile">
                           <div class="table-responsive">
                            <?php
                            if ($this->session->flashdata('sukses')) {
                                echo "<p class='alert alert-success alert-slide-up'>";
                                echo $this->session->flashdata('sukses');
                                echo "</p>";
                            }
                            ?>
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>TTL</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Telp</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) : ?>
                                        <tr>
                                            <td width="5%"><?= $key+1 ?></td>
                                            <td><?= $value->nik ?></td>
                                            <td><?= $value->nama ?></td>
                                            <td><?= $value->tempat_lahir ?>, <?= $value->tgl_lahir ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td><?= $value->jenis_kelamin ?></td>
                                            <td><?= $value->tlp ?></td>
                                            <td width="25%">
                                                <a href="<?= base_url() ?>pasien/edit/<?= $value->id_pasien ?>" class="btn btn-warning"><i class="feather icon-edit"></i> Ubah</a>
                                                <a href="<?= base_url() ?>pasien/delete/<?= $value->id_pasien ?>" class="btn btn-danger hapus-jenis"><i class="feather icon-trash"></i> hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="buzz">Ini Halaman Profile</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>