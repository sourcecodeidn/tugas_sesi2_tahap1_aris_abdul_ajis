<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah Jenis Obat</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Jenis Obat</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Jenis Obat</a></li>
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
                        <a href="<?= base_url() ?>jenis" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                        <hr>
                    </div>
                    <div class="card-body table-border-style">
                        <form action="<?= base_url() ?>jenis/edit/<?= $detail->id_jenis ?>" method="post">
                            <?php
                            echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
                            ?>
                            <div class="form-group">
                                <label for="nama_jenis">Nama Jenis Obat</label>
                                <input id="nama_jenis" class="form-control" type="text" name="nama_jenis" value="<?= $detail->nama_jenis ?>" placeholder="Nama Jenis Obat" required>
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