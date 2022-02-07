<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Satuan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Satuan</a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Data Satuan</a></li>
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
                        <a href="<?= base_url() ?>satuan" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="card-body table-border-style">
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama_satuan">nama Satuan Obat</label>
                                <input id="nama_satuan" class="form-control" type="text" name="nama_satuan" placeholder="Nama satuan obat" required>
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