<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Transaksi Obat keluar</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Transaksi</a></li>
                            <li class="breadcrumb-item"><a href="#!">Obat Keluar</a></li>
                            <li class="breadcrumb-item"><a href="#!">Transaksi Obat keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#transaksiModal" data-whatever="@mdo"><i class="feather icon-plus"></i> Tambah</button>
                    </div>
                    <div class="card-body table-border-style">
                        <?php
                        if ($this->session->flashdata('danger')) {
                            echo '<div class="alert alert-danger alert-slide-up">';
                            echo $this->session->flashdata('danger');
                            echo '</div>';
                        }
                        if ($this->session->flashdata('sukses')) {
                            echo "<p class='alert alert-success alert-slide-up'>";
                            echo $this->session->flashdata('sukses');
                            echo "</p>";
                        }
                        ?>
                        <form method="post" action="<?= base_url() ?>obat_keluar/checkout">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Kode Transaksi</label>
                                    <input type="text" class="form-control" name="kode" value="<?= strtoupper('TOK' . random_string('alnum', 3)); ?><?= date('Hi') ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <input type="date" class="form-control" name="tgl_keluar" value="<?= date('Y-m-d') ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Nama Obat</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->cart->contents() as $key => $items): ?>
                                        <tr>
                                            <td><?= $items['kategori'] ?></td>
                                            <td><?= $items['name'] ?></td>
                                            <td><?= $items['qty'] ?></td>
                                            <td>Rp. <?= number_format($items['price']) ?></td>
                                            <td>Rp. <?= number_format($items['subtotal']) ?></td>
                                            <td width="10%">
                                                <a href="<?= base_url() ?>obat_keluar/hapuskeranjang?rowid=<?=$items['rowid'];?>&qty=0" class="btn btn-danger hapus-keranjang"><i class="feather icon-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <hr>
                            <input type="hidden" name="total" value="<?= $this->cart->total() ?>">
                            <button type="submit" class="btn btn-success"><i class="feather icon-shopping-cart"></i> Simpan</button>
                            <a href="<?= base_url() ?>obat_keluar/batal" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                            <h4 style="float: right;">Total : <u>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></u></h4>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>obat_keluar/masukankeranjang" method="post">
                        <div class="form-group">
                            <label for="id_obat">Obat</label>
                            <select name="id_obat" id="id_obat" class="form-control" required>
                                <option value="">- Plih Obat -</option>
                                <?php foreach ($obat as $obat) : ?>
                                    <option value="<?= $obat->id_obat ?>"><?= $obat->nama_obat ?> | <?= $obat->nama_kategori ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>