<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Profil</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">User</a></li>
                            <li class="breadcrumb-item"><a href="#!">Profil</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body table-border-style">
                        <style>
                            .foto-profil {
                                border-radius: 50%;
                                width: 150px;
                                height: 150px;
                                margin-bottom: 20px;
                            }
                        </style>
                        <center>
                            <?php if (empty($detail->foto)) : ?>
                                <img class="img-thumbnail foto-profil" src="<?= base_url() ?>public/media/upload-user/no-img.jpg" alt="">
                                <?php else : ?>
                                    <img class="img-thumbnail foto-profil" src="<?= base_url() ?>public/media/upload-user/<?= $detail->foto ?>" alt="">
                                <?php endif ?>
                                <h6><?= $detail->nama ?></h6>
                                <p>
                                    <?php if ($detail->level=="manager") : ?>
                                        Manager
                                        <?php else : ?>
                                            Administrator
                                        <?php endif ?>
                                    </p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h5>Profil</h5>
                                <hr>
                            </div>
                            <div class="card-body table-border-style">
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
                                <form action="<?= base_url() ?>user/profil/<?= $detail->id_user ?>" method="post" enctype="multipart/form-data">
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
                                            <input id="email" class="form-control" type="email" name="email" value="<?= $detail->email ?>" placeholder="Konfirmasi Password" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="telepon">Telepon</label>
                                            <input id="telepon" class="form-control" type="number" name="telepon" value="<?= $detail->telepon ?>" placeholder="Konfirmasi Password" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama">Jenis Kelamin</label>
                                            <select name="jk" id="jk" class="form-control">
                                                <option value="">- Pilih Jenis Kelamin -</option>
                                                <option value="Laki-Laki" <?php if($detail->jk=="Laki-Laki"){echo"selected";} ?>>Laki-Laki</option>
                                                <option value="Perempuan" <?php if($detail->jk=="Perempuan"){echo"selected";} ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="foto">Foto</label>
                                            <input id="foto" class="form-control" type="file" name="foto">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="nama">Alamat Lengkap</label>
                                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap"><?= $detail->alamat ?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary"><i class="feather icon-edit"></i> Ubah</button>
                                    <a href="<?= base_url() ?>user/ubahpassword/<?= $detail->id_user ?>" class="btn btn-success"><i class="feather icon-lock"></i> Ubah Password</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>