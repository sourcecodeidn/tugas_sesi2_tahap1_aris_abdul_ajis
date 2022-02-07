<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Jenis</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Jenis</a></li>
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
                        <a href="<?= base_url() ?>jenis/add" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah</a>
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
                                        <th>Nama Jenis</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) : ?>
                                        <tr>
                                            <td width="5%"><?= $key+1 ?></td>
                                            <td><?= $value->nama_jenis ?></td>
                                            <td width="25%">
                                                <a href="<?= base_url() ?>jenis/edit/<?= $value->id_jenis ?>" class="btn btn-warning"><i class="feather icon-edit"></i> Ubah</a>
                                                <a href="<?= base_url() ?>jenis/delete/<?= $value->id_jenis ?>" class="btn btn-danger hapus-jenis"><i class="feather icon-trash"></i> hapus</a>
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