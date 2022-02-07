<?php  
$data_instansi = $this->public_model->get_instansi();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>public/template/assets/css/style.css">
    <link rel="icon" href="<?= base_url() ?>public/media/upload-pengaturan/logoatas.png" type="image/x-icon">
</head>
<style>
    .laporan {
        margin-top: 50px;
        margin-left: 20px;
        margin-right: 20px;
    }
</style>

<body onLoad="window.print()">
    <div class="laporan">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center"><?= $data_instansi->instansi ?></h3>
                <h4 class="text-center"><u>LAPORAN SEMUA DATA OBAT</u></h4>
                <p class="text-center"><?= $data_instansi->alamat ?></p>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data)): ?>
                          <th colspan="8" class="text-center">Tidak ada laporan data obat untuk saat ini!</th>
                          <?php else: ?>
                              <?php foreach ($data as $key => $dt) : ?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $dt->nama_obat ?></td>
                                    <td><?= $dt->nama_kategori ?></td>
                                    <td><?= $dt->nama_jenis ?></td>
                                    <td><?= $dt->nama_satuan ?></td>
                                    <td>Rp. <?= number_format($dt->harga_beli) ?></td>
                                    <td>Rp. <?= number_format($dt->harga_jual) ?></td>
                                    <td>
                                        <?php  
                                        $stok = $this->db->where('id_obat',$dt->id_obat)->get('stok')->result();
                                        $stok_o = 0;
                                        ?>
                                        <?php foreach ($stok as $key => $value): ?>
                                            <?php  
                                            $stok_o += $value->stok;
                                            ?>
                                        <?php endforeach ?>
                                        <?= $stok_o ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
                <br><br>
                <table width="100%">
                    <tr>
                        <td></td>
                        <td width="300px">
                           <p>Pimpinan <?= $data_instansi->instansi ?>,</p>
                           <br>
                           <br>
                           <br>
                           <p>____________________</p>
                       </td>
                   </tr>
               </table>
           </div>
       </div>
   </div>
</body>

</html>