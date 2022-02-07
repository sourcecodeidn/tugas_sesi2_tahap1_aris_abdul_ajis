<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Pengadaan Obat</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Apotek</a></li>
                            <li class="breadcrumb-item"><a href="#!">Pengadaan Obat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url() ?>obat_masuk/transaksi" class="btn btn-primary"><i class="feather icon-plus"></i> Transaksi Baru</a>
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
                                        <th>Nama Suplier</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Total Belanja</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value): ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $value->kode_obat_masuk ?></td>
                                            <td><?= $value->nama_supplier ?></td>
                                            <td><?= tgl_indo($value->tanggal_masuk) ?></td>
                                            <td>Rp. <?= number_format($value->total) ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>obat_masuk/detail/<?= $value->id_obat_masuk ?>" class="btn btn-info"><i class="feather icon-eye"></i> Detail</a>
                                                <a href="<?= base_url() ?>obat_masuk/nota/<?= $value->id_obat_masuk ?>" class="btn btn-success" target="_blank"><i class="feather icon-printer"></i> Cetak Nota</a>
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