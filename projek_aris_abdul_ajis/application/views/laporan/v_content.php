<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Laporan Transaksi & Obat</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Laporan Transaksi & Laporan Data Obat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ tabs ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Laporan Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Laporan Data Obat</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card ">
                                            <div class="card-body">
                                                <h4 class="text-center">Laporan Transaksi Obat Masuk</h4>
                                                <hr>
                                                <form action="<?= base_url() ?>laporan/obm_perbulan" target="_blank">
                                                    <label for="">Perbulan</label>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <select name="bulan" id="" class="form-control" required="">
                                                                <option value="">- Pilih Bulan -</option>
                                                                <option value="01">Januari</option>
                                                                <option value="02">Februari</option>
                                                                <option value="03">Maret</option>
                                                                <option value="04">april</option>
                                                                <option value="05">Mei</option>
                                                                <option value="06">Juni</option>
                                                                <option value="07">Juli</option>
                                                                <option value="08">Agustus</option>
                                                                <option value="09">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Desember</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <select name="tahun" class="form-control" required="">
                                                                <option value="">- Pilih Tahun -</option>
                                                                <?php
                                                                $y = date('Y');
                                                                for ($i = 2020; $i <= $y + 10; $i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary"><i class="feather icon-printer"></i> Cetak</button>
                                                </form>
                                                <hr>
                                                <form action="<?= base_url() ?>laporan/obm_pertahun" target="_blank">
                                                    <label for="">Pertahun</label>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <select name="tahun" class="form-control" required="">
                                                                <option value="">- Pilih Tahun -</option>
                                                                <?php
                                                                $y = date('Y');
                                                                for ($i = 2020; $i <= $y + 10; $i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary"><i class="feather icon-printer"></i> Cetak</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card ">
                                            <div class="card-body">
                                                <h4 class="text-center">Laporan Transaksi Obat Keluar</h4>
                                                <hr>
                                                <form action="<?= base_url() ?>laporan/obk_perbulan" target="_blank">
                                                    <label for="">Perbulan</label>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <select name="bulan" id="" class="form-control" required="">
                                                                <option value="">- Pilih Bulan -</option>
                                                                <option value="01">Januari</option>
                                                                <option value="02">Februari</option>
                                                                <option value="03">Maret</option>
                                                                <option value="04">april</option>
                                                                <option value="05">Mei</option>
                                                                <option value="06">Juni</option>
                                                                <option value="07">Juli</option>
                                                                <option value="08">Agustus</option>
                                                                <option value="09">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Desember</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <select name="tahun" class="form-control" required="">
                                                                <option value="">- Pilih Tahun -</option>
                                                                <?php
                                                                $y = date('Y');
                                                                for ($i = 2019; $i <= $y + 10; $i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary"><i class="feather icon-printer"></i> Cetak</button>
                                                </form>
                                                <hr>
                                                <form action="<?= base_url() ?>laporan/obk_pertahun" target="_blank">
                                                    <label for="">Pertahun</label>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <select name="tahun" class="form-control" required="">
                                                                <option value="">- Pilih Tahun -</option>
                                                                <?php
                                                                $y = date('Y');
                                                                for ($i = 2019; $i <= $y + 10; $i++) {
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary"><i class="feather icon-printer"></i> Cetak</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="text-center">Laporan Semua Data Obat</h4>
                                                <hr>
                                                <form action="<?= base_url() ?>laporan/semuadataobat" method="post" target="_blank">
                                                    <button class="btn btn-primary btn-block"><i class="feather icon-printer"></i> Cetak</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>