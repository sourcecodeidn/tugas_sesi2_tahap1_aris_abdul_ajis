<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Detail Obat Masuk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Transaksi</a></li>
                            <li class="breadcrumb-item"><a href="#!">Obat Masuk</a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail Obat Masuk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url() ?>obat_masuk" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th width="15%">Kode Transaksi</th>
                                    <td width="6%">:</td>
                                    <td><?= $obat_masuk->kode_obat_masuk ?></td>
                                </tr>
                                 <tr>
                                    <th>Tanggal Masuk</th>
                                    <td>:</td>
                                    <td><?= tgl_indo($obat_masuk->tanggal_masuk) ?></td>
                                </tr>
                                <tr>
                                    <th>Supplier</th>
                                    <td>:</td>
                                    <td><?= $obat_masuk->nama_supplier ?></td>
                                </tr>
                            </table>
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Kategori</th>
                                        <th>Jenis</th>
                                        <th>Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Harga Beli</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail_obat_masuk as $key => $value): ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $value->nama_obat ?></td>
                                            <td><?= $value->kategori_obat ?></td>
                                            <td><?= $value->jenis_obat ?></td>
                                            <td><?= $value->satuan_obat ?></td>
                                            <td><?= number_format($value->jumlah) ?></td>
                                            <td>Rp. <?= number_format($value->harga_beli) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-center">TOTAL</th>
                                        <th>Rp. <?= number_format($obat_masuk->total) ?></th>
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