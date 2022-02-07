<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Pengaturan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
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
                        <form action="<?= base_url() ?>pengaturan" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="id_pengaturan" value="<?= $data->id_pengaturan ?>">
                                <div class="form-group col-md-6">
                                    <label for="">Instansi</label>
                                    <input id="instansi" class="form-control" type="text" name="instansi" value="<?= $data->instansi ?>" placeholder="Instansi" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Pimpinan</label>
                                    <input id="pimpinan" class="form-control" type="text" name="pimpinan" value="<?= $data->pimpinan ?>" placeholder="Pimpinan" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Website</label>
                                    <input id="website" class="form-control" type="text" name="website" value="<?= $data->website ?>" placeholder="Website" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" value="<?= $data->email ?>" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Telepon</label>
                                    <input id="telepon" class="form-control" type="number" name="telepon" value="<?= $data->telepon ?>" placeholder="Telepon" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php if (empty($data->logo)): ?>
                                                <img width="100" class="img-thumbnail" src="<?= base_url() ?>public/media/upload-pengaturan/no-img.jpg" alt="">
                                                <?php else: ?>
                                                    <img width="100" class="img-thumbnail" src="<?= base_url() ?>public/media/upload-pengaturan/<?= $data->logo ?>" alt="">
                                                <?php endif ?>
                                            </div>
                                            <div class="col-md-9">
                                               <label for="">Logo</label>
                                               <input id="" class="form-control" type="file" name="logo">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="form-group col-md-12">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat lengkap"><?= $data->alamat ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>