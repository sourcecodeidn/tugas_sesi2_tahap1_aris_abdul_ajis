<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Dokter</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Dokter</a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Dokter</a></li>
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
                        <a href="<?= base_url() ?>dokter" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="card-body table-border-style">
                        <form action="<?= base_url() ?>dokter/add" method="post">
                            <?php
                            echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
                            ?>
                            <?php  
                            print_r($detail);
                            ?>
                            <div class="form-group">
                                <label for="">Nama Dokter</label>
                                <input id="nama" class="form-control" type="text" name="nama" placeholder="Nama Dokter" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Dokter</label>
                                <input id="alamat" class="form-control" type="text" name="alamat" placeholder="Alamat Dokter" required>
                            </div>
                            <div class="form-group">
                                <label for="">No. Telp</label>
                                <input id="telp" class="form-control" type="text" name="telp" placeholder="No. Telp" required>
                            </div>
                            <div class="form-group">
                                <label for="">Bidang Keahlian</label>
                                <input id="bidang" class="form-control" type="text" name="bidang" placeholder="Bidang keahlian" required>
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