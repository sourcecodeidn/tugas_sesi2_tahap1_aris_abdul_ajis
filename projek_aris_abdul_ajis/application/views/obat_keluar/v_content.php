<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Obat Keluar</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Transaksi</a></li>
                            <li class="breadcrumb-item"><a href="#!">Obat Keluar</a></li>
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
                            <a href="<?= base_url() ?>obat_keluar/transaksi" class="btn btn-primary"><i class="feather icon-plus"></i> Transaksi Baru</a>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <?php
                                if ($this->session->flashdata('sukses')) {
                                    echo "<p class='alert alert-success alert-slide-up'>";
                                    echo $this->session->flashdata('sukses');
                                    echo "</p>";
                                }
                                ?>
                                <table class="table table-striped table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Total</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $value): ?>
                                            <tr>
                                                <td width="6%"><?= $key+1 ?></td>
                                                <td><?= $value->kode_obat_keluar ?></td>
                                                <td><?= tgl_indo($value->tanggal_keluar) ?></td>
                                                <td>Rp. <?= number_format($value->total) ?></td>
                                                <td width="20%">
                                                    <a href="<?= base_url() ?>obat_keluar/detail/<?= $value->id_obat_keluar ?>" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a>
                                                    <a href="<?= base_url() ?>obat_keluar/nota/<?= $value->id_obat_keluar ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Cetak Nota</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>