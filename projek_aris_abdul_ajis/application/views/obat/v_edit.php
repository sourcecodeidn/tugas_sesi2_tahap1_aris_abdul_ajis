<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ubah Data Obat</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Obat</a></li>
                            <li class="breadcrumb-item"><a href="#!">Ubah Data Obat</a></li>
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
                            <a href="<?= base_url() ?>obat" class="btn btn-warning"><i class="feather icon-chevron-left"></i> Kembali</a>
                            <hr>
                        </div>
                        <div class="card-body table-border-style">
                            <form action="<?= base_url() ?>obat/edit/<?= $detail->id_obat ?>" method="post">
                                <?php
                                echo validation_errors('<div class="alert alert-danger alert-slide-up">', '</div>');
                                ?>
                                <div class="row">
                                    <div class="form-grou col-md-6">
                                        <label for="kode">Kode Obat</label>
                                        <input id="kode" class="form-control" type="text" name="kode" value="<?= $detail->kode_obat ?>" readonly>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="nama_obat">Nama Obat</label>
                                        <input id="nama_obat" class="form-control" type="text" name="nama_obat" value="<?= $detail->nama_obat ?>" placeholder="Nama Obat" required>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="id_kategori">Kategori</label>
                                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                                            <?php foreach ($kategori as $kategori) : ?>
                                                <option value="<?= $kategori->id_kategori ?>" <?php if ($kategori->id_kategori == $detail->id_kategori) {
                                                    echo "selected";
                                                } ?>><?= $kategori->nama_kategori ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="id_jenis">Jenis</label>
                                        <select name="id_jenis" id="id_jenis" class="form-control" required>
                                            <?php foreach ($jenis as $jenis) : ?>
                                                <option value="<?= $jenis->id_jenis ?>" <?php if ($jenis->id_jenis == $detail->id_jenis) {
                                                    echo "selected";
                                                } ?>><?= $jenis->nama_jenis ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="id_satuan">Satuan</label>
                                        <select name="id_satuan" id="id_satuan" class="form-control" required>
                                            <?php foreach ($satuan as $satuan) : ?>
                                                <option value="<?= $satuan->id_satuan ?>" <?php if ($satuan->id_satuan == $detail->id_satuan) {
                                                    echo "selected";
                                                } ?>><?= $satuan->nama_satuan ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="harga_beli">Harga Beli</label>
                                        <input id="harga_beli" class="form-control" type="number" name="harga_beli" value="<?= $detail->harga_beli ?>" placeholder="Harga Beli" required>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="harga_jual">Harga Jual</label>
                                        <input id="harga_jual" class="form-control" type="number" name="harga_jual" value="<?= $detail->harga_jual ?>" placeholder="Harga Jual" required>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="brand">Brand</label>
                                        <input id="brand" class="form-control" type="text" name="brand" value="<?= $detail->brand ?>" placeholder="Brand" required>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="indikasi">Indikasi</label>
                                        <textarea name="indikasi" id="indikasi" class="form-control" placeholder="Indikasi" required><?= $detail->indikasi ?></textarea>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="dosis">Dosis</label>
                                        <input id="dosis" class="form-control" type="text" name="dosis" value="<?= $detail->dosis ?>" placeholder="Dosis" required>
                                    </div>
                                    <div class="form-grou col-md-6">
                                        <label for="kemasan">Kemasan</label>
                                        <input id="kemasan" class="form-control" type="text" name="kemasan" value="<?= $detail->kemasan ?>" placeholder="Kemasan" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="message-text" class="col-form-label">Letak Obat</label>
                                        <input type="text" name="letak_obat" class="form-control" value="<?= $detail->letak_obat ?>" placeholder="Letak Obat" required>
                                    </div>
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