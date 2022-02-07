<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah User</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Manajemen User</a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah User</a></li>
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
                          <form action="<?= base_url() ?>user/add" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama Lengkap</label>
                                    <input id="nama" class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input id="username" class="form-control" type="text" name="username" placeholder="username" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telepon">Telepon</label>
                                    <input id="telepon" class="form-control" type="number" name="telepon" placeholder="Telepon" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama">Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="foto">Foto</label>
                                    <input id="foto" class="form-control" type="file" name="foto">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama">Hak Akses</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="">- Pilih Hak Akses -</option>
                                        <option value="manager">Manager</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
                                </div>

                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>