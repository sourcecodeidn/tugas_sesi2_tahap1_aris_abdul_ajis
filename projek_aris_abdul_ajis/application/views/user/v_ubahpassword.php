<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah Password</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">User</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Password</a></li>
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
                                <img class="img-thumbnail foto-profil" src="<?= base_url() ?>public/media/upload-user/user.png" alt="">
                                <?php else : ?>
                                    <img class="img-thumbnail foto-profil" src="<?= base_url() ?>public/media/upload-user/<?= $detail->foto ?>" alt="">
                                <?php endif ?>
                                <h6><?= $detail->nama ?></h6>
                                <p>
                                    <?php if ($detail->level == "manager") : ?>
                                        Manager
                                        <?php else : ?>
                                            Administrator
                                        <?php endif ?>
                                    </p>
                                    <a href="<?= base_url() ?>user/profil/<?= $detail->id_user ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah Profil</a>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h5>Ubah Password</h5>
                                <hr>
                            </div>
                            <div class="card-body table-border-style">
                              <div class="alert alert-info"><i class="feather icon-info"></i> Mohon untuk tidak memberitahukan password Anda kepada siapa pun!</div>
                              <hr>
                              <?php  
                              if ($this->session->flashdata('danger')) {
                                echo '<div class="alert alert-danger alert-slide-up">';
                                echo $this->session->flashdata('danger');
                                echo '</div>';
                            }

                            if ($this->session->flashdata('sukses')) {
                                echo '<div class="alert alert-success alert-slide-up">';
                                echo $this->session->flashdata('sukses');
                                echo '</div>';
                            }
                            ?>
                            <form action="<?= base_url() ?>user/ubahpassword/<?= $detail->id_user ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="username" value="<?= $detail->username ?>">
                                <div class="form-group">
                                    <label for="pass">Password Lama</label>
                                    <input id="pass" class="form-control" type="password" name="pass" placeholder="password Lama" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input id="password" class="form-control" type="password" name="password" placeholder="Password Baru" required>
                                </div>
                                <div class="form-group">
                                    <label for="repassword">Konfirmasi Password</label>
                                    <input id="repassword" class="form-control" type="password" name="repassword" placeholder="Konfirmasi Password" required>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary"><i class="feather icon-edit"></i> Ubah</button>
                                <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>