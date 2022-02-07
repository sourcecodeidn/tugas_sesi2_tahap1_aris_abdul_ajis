<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Obat</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Obat</a></li>
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
                            <a href="<?= base_url() ?>obat" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Kembali</a>
                        </div>
                        <div class="card-body table-border-style">
                            <table class="table table-striped">
                                <tr>
                                    <th width="13%">Kode Obat</th>
                                    <th width="5%">:</th>
                                    <th><?= $detail->kode_obat ?></th>
                                </tr>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>:</th>
                                    <th><?= $detail->nama_obat ?></th>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <th>:</th>
                                    <th><?= $detail->nama_kategori ?></th>
                                </tr>
                                <tr>
                                    <th>Jenis</th>
                                    <th>:</th>
                                    <th><?= $detail->nama_jenis ?></th>
                                </tr>
                                <tr>
                                    <th>Satuan</th>
                                    <th>:</th>
                                    <th><?= $detail->nama_satuan ?></th>
                                </tr>
                            </table>
                            <div class="table-responsive">
                              <?php if (empty($stok)): ?>
                                <div class="alert alert-danger"><h6 class="text-center">Belum ada stok untuk obat ini!</h6></div class="alert alert-danger">
                                    <?php else: ?>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal Expired</th>
                                                    <th>Stok</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($stok as $key => $value): ?>
                                                    <tr>
                                                        <td width="5%"><?= $key+1 ?></td>
                                                        <td><?= $value->tanggal_expired ?></td>
                                                        <td><?= $value->stok ?></td>
                                                    </tr>
                                                <?php endforeach ?>

                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
