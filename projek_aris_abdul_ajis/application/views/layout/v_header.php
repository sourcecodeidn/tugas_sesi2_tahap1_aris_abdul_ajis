<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
          <h3 class="text-white">POLIKLINIK</h3>
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li>
                <div class="dropdown drp-user">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (empty($data_user->foto)) : ?>
                            <img width="40" height="40" src="<?= base_url() ?>public/media/upload-user/no-img.jpg" class="img-radius" alt="User-Profile-Image">
                            <?php else : ?>
                                <img width="40" height="40" src="<?= base_url() ?>public/media/upload-user/<?= $data_user->foto ?>" class="img-radius" alt="User-Profile-Image">
                            <?php endif ?>
                            <span> <?= $data_user->nama ?> <i class="feather icon-chevron-down"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <?php if (empty($data_user->foto)) : ?>
                                    <img width="40" height="40" src="<?= base_url() ?>public/media/upload-user/no-img.jpg" class="img-radius" alt="User-Profile-Image">
                                    <?php else : ?>
                                        <img width="40" height="40" src="<?= base_url() ?>public/media/upload-user/<?= $data_user->foto ?>" class="img-radius" alt="User-Profile-Image">
                                    <?php endif ?>
                                    <span><?= $data_user->nama ?></span>
                            <!-- <a href="auth-signin.html" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a> -->
                        </div>
                        <ul class="pro-body">
                            <li><a href="<?= base_url() ?>user/profil/<?= $data_user->id_user ?>" class="dropdown-item"><i class="feather icon-user"></i> Profil</a></li>
                            <li><a href="<?= base_url() ?>user/ubahpassword/<?= $data_user->id_user ?>" class="dropdown-item"><i class="feather icon-lock"></i> Ubah Password</a></li>
                            <li><a href="<?= base_url() ?>login/logout" class="dropdown-item" id="keluar"><i class="feather icon-log-out"></i> Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>