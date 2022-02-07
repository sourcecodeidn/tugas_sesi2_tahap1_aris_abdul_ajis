<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Kategori Obat</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Kategori Obat</a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Kategori Obat</a></li>
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
                        <a href="<?= base_url() ?>kategori" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="card-body table-border-style">
                        <?php
                        echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
                        ?>
                        <form action="<?= base_url() ?>kategori/add" method="post">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori Obat</label>
                                <input id="nama_kategori" class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori Obat" required>
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