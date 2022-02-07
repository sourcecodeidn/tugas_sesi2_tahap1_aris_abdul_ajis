<?php  
    $totobatmasuk = $this->public_model->totobatmasuk();
    $totobatkeluar = $this->public_model->totobatkeluar();
    $totobat = $this->public_model->totobat();
    $totuser = $this->public_model->totuser();
?>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <!-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- order-card start -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total Obat Masuk</h6>
                        <h2 class="text-right text-white"><i class="feather icon-download float-left"></i><span><?= $totobatmasuk ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total Obat Keluar</h6>
                        <h2 class="text-right text-white"><i class="feather icon-external-link float-left"></i><span><?= $totobatkeluar ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total Semua Obat</h6>
                        <h2 class="text-right text-white"><i class="feather icon-package float-left"></i><span><?= $totobat ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Total Pengguna</h6>
                        <h2 class="text-right text-white"><i class="feather icon-users float-left"></i><span><?= $totuser ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h4>Selamat Datang <?= $this->session->userdata('nama'); ?></h4>
                                <p>Anda login sebagai <?php if ($this->session->userdata('level')=='manager'): ?>
                                Manager, Berikut adalah statistik data yang tersimpan dalam sistem.<?php else: ?>
                                Administrator, Anda memiliki akses penuh terhadap sistem.
                                <?php endif ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>