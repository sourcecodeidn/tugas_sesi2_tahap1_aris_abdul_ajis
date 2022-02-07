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
                            <button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="feather icon-plus"></i> Tambah</button>
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
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Jenis</th>
                                            <th>Satuan</th>
                                            <th>Letak</th>
                                            <th>Stok</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $value) : ?>
                                            <tr>
                                                <td width="5%"><?= $key + 1 ?></td>
                                                <td><?= $value->nama_obat ?></td>
                                                <td><?= $value->nama_kategori ?></td>
                                                <td><?= $value->nama_jenis ?></td>
                                                <td><?= $value->nama_satuan ?></td>
                                                <td><?= $value->letak_obat ?></td>
                                                <td>
                                                    <?php  
                                                    $stok = $this->db->where('id_obat',$value->id_obat)->get('stok')->result();
                                                    $stok_o = 0;
                                                    ?>
                                                    <?php foreach ($stok as $key => $value): ?>
                                                        <?php  
                                                        $stok_o += $value->stok;
                                                        ?>
                                                    <?php endforeach ?>
                                                    <?= $stok_o ?>
                                                </td>
                                                <td width="17%">
                                                    <a href="<?= base_url() ?>obat/detail/<?= $value->id_obat ?>" class="btn btn-info btn-sm"><i class="feather icon-box"></i> Detail</a>
                                                    <a href="<?= base_url() ?>obat/edit/<?= $value->id_obat ?>" class="btn btn-warning btn-sm"><i class="feather icon-edit"></i> Ubah</a>
                                                    <a href="<?= base_url() ?>obat/delete/<?= $value->id_obat ?>" class="btn btn-danger btn-sm hapus-obat"><i class="feather icon-trash"></i> hapus</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>obat" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Kode Obat</label>
                                <input type="text" name="kode" class="form-control" value="<?= strtoupper('OB' . random_string('alnum', 3)); ?><?= date('Hi') ?>" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Kategori Obat</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="">- Pilih Kategori -</option>
                                    <?php foreach ($kategori as $kategori) : ?>
                                        <option value="<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Jenis Obat</label>
                                <select name="jenis" id="jenis" class="form-control" required>
                                    <option value="">- Pilih Jenis -</option>
                                    <?php foreach ($jenis as $jenis) : ?>
                                        <option value="<?= $jenis->id_jenis ?>"><?= $jenis->nama_jenis ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Satuan Obat</label>
                                <select name="satuan" id="satuan" class="form-control" required>
                                    <option value="">- Pilih Satuan -</option>
                                    <?php foreach ($satuan as $satuan) : ?>
                                        <option value="<?= $satuan->id_satuan ?>"><?= $satuan->nama_satuan ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="message-text" class="col-form-label">Nama Obat</label>
                                <input type="text" name="nama_obat" class="form-control" placeholder="Contoh : DECADRYL EKSPEKTORAN SIRUP 120mL" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="message-text" class="col-form-label">Brand</label>
                                <input type="text" name="brand" class="form-control" placeholder="Contoh : Harsen" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Dosis</label>
                                <input type="text" name="dosis" class="form-control" placeholder="Contoh : 3 x 1 Hari" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="message-text" class="col-form-label">Kemasan</label>
                                <input type="text" name="kemasan" class="form-control" placeholder="Contoh : Sirup 120mL x 1" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="message-text" class="col-form-label">Letak Obat</label>
                                <input type="text" name="letak_obat" class="form-control" placeholder="Letak Obat" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="message-text" class="col-form-label">Indikasi</label>
                                <textarea name="indikasi" id="indikasi" class="form-control" placeholder="Contoh : Batuk, pilek, asma, sesak nafas, gangguan perut"></textarea>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn  btn-primary"><i class="feather icon-save"></i> Simpan</button>
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal"><i class="feather icon-x-circle"></i> Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>