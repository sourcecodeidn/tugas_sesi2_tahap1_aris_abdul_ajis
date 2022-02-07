<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah User</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Manajemen User</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah User</a></li>
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
                            <a href="<?= base_url() ?>user" class="btn btn-warning"><i class="feather icon-chevron-left"></i> kembali</a>
                            <hr>
                        </div>
                        <div class="card-body table-border-style">
                          <?php
                          echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
                          ?>
                          <form action="<?= base_url() ?>user/edit/<?= $detail->id_user ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama Lengkap</label>
                                    <input id="nama" class="form-control" type="text" name="nama" value="<?= $detail->nama ?>" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input id="username" class="form-control" type="text" name="username" value="<?= $detail->username ?>" placeholder="username" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" value="<?= $detail->email ?>" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telepon">Telepon</label>
                                    <input id="telepon" class="form-control" type="number" name="telepon" value="<?= $detail->telepon ?>" placeholder="Telepon" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama">Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control" required="">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki" <?php if ($detail->jk=="Laki-Laki") {echo "selected";} ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($detail->jk=="Perempuan") {echo "selected";} ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php if (empty($detail->foto)): ?>
                                                <img width="100" class="img-thumbnail" src="<?= base_url() ?>public/media/upload-user/no-img.jpg" alt="">
                                                <?php else: ?>
                                                <img width="100" class="img-thumbnail" src="<?= base_url() ?>public/media/upload-user/<?= $detail->foto ?>" alt="">
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-9">
                                            <label for="foto">Foto</label>
                                            <input id="foto" class="form-control" type="file" name="foto">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control" required="">
                                        <option value="1" <?php if ($detail->status=="1") {echo "selected";} ?>>Active</option>
                                        <option value="0" <?php if ($detail->status=="0") {echo "selected";} ?>>Non Active</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap" required=""><?= $detail->alamat ?></textarea>
                                </div>

                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><i class="feather icon-edit"></i> Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>