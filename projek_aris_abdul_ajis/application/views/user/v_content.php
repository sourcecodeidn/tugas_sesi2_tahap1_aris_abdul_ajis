<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Manajemen User</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Manajemen User</a></li>
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
                            <a href="<?= base_url() ?>user/add" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
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
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Hak Akses</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <style>
                                        .foto
                                        {
                                            border-radius: 50%;
                                            width: 70px;
                                            height: 70px;
                                        }
                                    </style>
                                    <tbody>
                                        <?php foreach ($data as $key => $value) : ?>
                                            <tr>
                                                <td width="5%"><?= $key + 1 ?></td>
                                                <td>
                                                    <?php if (empty($value->foto)) : ?>
                                                        <img class="foto img-thumbnail" src="<?= base_url() ?>public/media/upload-user/no-img.jpg" alt="">
                                                        <?php else : ?>
                                                            <img class="foto img-thumbnail" src="<?= base_url() ?>public/media/upload-user/<?= $value->foto ?>" alt="">
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?= $value->username ?>
                                                    </td>
                                                    <td>
                                                        <?= $value->nama ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($value->level == "manager") : ?>
                                                            <span class="badge badge-primary">Manager</span>
                                                            <?php else : ?>
                                                                <span class="badge badge-success">Administrator</span>
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($value->status == 1) : ?>
                                                                <span class="badge badge-success">Aktif</span>
                                                                <?php else : ?>
                                                                    <span class="badge badge-danger">Non Aktif</span>
                                                                <?php endif ?>
                                                            </td>
                                                            <td width="20%">
                                                                <?php if ($value->level=="manager"): ?>
                                                                 <a href="<?= base_url() ?>user/detail/<?= $value->id_user ?>" class="btn btn-info"><i class="feather icon-eye"></i> Detail</a>
                                                                 <a href="<?= base_url() ?>user/detail/<?= $value->id_user ?>" class="btn btn-warning disabled"><i class="feather icon-edit"></i> Ubah</a>
                                                                 <a href="<?= base_url() ?>user/delete/<?= $value->id_user ?>" class="btn btn-danger hapus-user disabled"><i class="feather icon-trash"></i> Hapus</a>
                                                                 <?php else: ?>
                                                                  <a href="<?= base_url() ?>user/detail/<?= $value->id_user ?>" class="btn btn-info"><i class="feather icon-eye"></i> Detail</a>
                                                                  <a href="<?= base_url() ?>user/edit/<?= $value->id_user ?>" class="btn btn-warning"><i class="feather icon-edit"></i> Ubah</a>
                                                                  <a href="<?= base_url() ?>user/delete/<?= $value->id_user ?>" class="btn btn-danger hapus-user"><i class="feather icon-trash"></i> Hapus</a>
                                                              <?php endif ?>

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
                  </div>
              </section>