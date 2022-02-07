<nav class="pcoded-navbar menupos-fixed menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <?php if ($this->session->userdata('level')=='manager'): ?>
                   <li class="nav-item"><a href="<?= base_url() ?>user" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Manajemen User</span></a></li>
                   <li class="nav-item"><a href="<?= base_url() ?>laporan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-printer"></i></span><span class="pcoded-mtext">Laporan</span></a></li>

                   <?php else: ?>
                     <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-grid"></i></span><span class="pcoded-mtext">Master Data</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url() ?>user">Data User</a></li>
                            <li><a href="<?= base_url() ?>satuan">Data Satuan</a></li>
                            <li><a href="<?= base_url() ?>jenis">Data Jenis</a></li>
                            <li><a href="<?= base_url() ?>kategori">Data Kategori</a></li>
                            
                            <li><a href="<?= base_url() ?>supplier">Data Suplier</a></li>
                            <li><a href="<?= base_url() ?>dokter">Data Dokter</a></li>
                            <li><a href="<?= base_url() ?>supplier">Tindakan & Tarif</a></li>
                            <li><a href="<?= base_url() ?>supplier">Tindakan Lab & Tarif</a></li>
                            <li><a href="<?= base_url() ?>supplier">Perusahaan Penjamin</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Apotek</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url() ?>obat">Daftar Obat</a></li>
                            <li><a href="<?= base_url() ?>obat_masuk">Pengadaan Obat</a></li>
                            <li><a href="<?= base_url() ?>obat_keluar">Obat Keluar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-edit"></i></span><span class="pcoded-mtext">Transaksi</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= base_url() ?>regis">Registrasi</a></li>
                            <li><a href="<?= base_url() ?>poli">Poli</a></li>
                            <li><a href="<?= base_url() ?>lab">Laboratorium</a></li>
                        </ul>
                    </li>
                   <!--  <li class="nav-item"><a href="<?= base_url() ?>laporan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-printer"></i></span><span class="pcoded-mtext">Laporan</span></a></li> -->
                    <li class="nav-item"><a href="<?= base_url() ?>pengaturan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Pengaturan</span></a></li>
                <?php endif ?>


                <li class="nav-item"><a href="<?= base_url() ?>login/logout" id="keluar" class="nav-link" ><span class="pcoded-micon"><i class="feather icon-log-out"></i></span><span class="pcoded-mtext">Keluar</span></a></li>
            </ul>
        </div>
    </div>
</nav>