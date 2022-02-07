<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Detail User</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">User</a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail User</a></li>
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
                                <a href="<?= base_url() ?>user" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                                <hr>
                            </div>
                            <div class="card-body table-border-style">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td><?= $detail->nama ?></td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>:</td>
                                        <td><?= $detail->username ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td><?= $detail->email ?></td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>:</td>
                                        <td><?= $detail->telepon ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td><?= $detail->jk ?></td>
                                    </tr>
                                    <tr>
                                        <th>Level</th>
                                        <td>:</td>
                                        <td><?= $detail->level ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td><?= $detail->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>:</td>
                                        <td>
                                            <?php if ($detail->status==1): ?>
                                                <span class="badge badge-success">Active</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Non Active</span>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>