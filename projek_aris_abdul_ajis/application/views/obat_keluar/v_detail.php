<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Detail Obat Keluar</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Transaksi</a></li>
                            <li class="breadcrumb-item"><a href="#!">Obat Keluar</a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail Obat Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url() ?>obat_keluar" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th width="15%">Kode Transaksi</th>
                                    <td width="6%">:</td>
                                    <td><?= $obat_keluar->kode_obat_keluar ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Keluar</th>
                                    <td>:</td>
                                    <td><?= tgl_indo($obat_keluar->tanggal_keluar) ?></td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Nama Suplier</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Total Belanja</th>
                                        <th>Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail_obat_keluar as $key => $value): ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $value->nama_obat ?></td>
                                            <td><?= $value->kategori_obat ?></td>
                                            <td><?= $value->jenis_obat ?></td>
                                            <td><?= $value->satuan_obat ?></td>
                                            <td><?= number_format($value->jumlah) ?></td>
                                            <td>Rp. <?= number_format($value->harga_jual) ?></td>
                                            <td>Rp. <?= number_format($value->subtotal) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="7" class="text-center">TOTAL</th>
                                        <th>Rp. <?= number_format($obat_keluar->total) ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>