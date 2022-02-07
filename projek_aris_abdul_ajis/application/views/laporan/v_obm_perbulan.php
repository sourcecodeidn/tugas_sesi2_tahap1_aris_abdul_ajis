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
             <h4 class="text-center"><u>LAPORAN OBAT MASUK PERBULAN</u></h4>
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
                        <th>Jumlah</th>
                        <th>Harga Beli</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                  <?php if (empty($data)): ?>
                    <th colspan="8" class="text-center">Tidak ada data obat masuk pada bulan & tahun yang Anda pilih!</th>
                    <?php else: ?>
                        <?php  
                        $totalsemua = 0;
                        ?>
                        <?php foreach ($data as $key => $dt) : ?>
                            <?php $totalsemua += $dt->subtotal ?>
                            <tr>
                                <td><?= $key+1 ?></td>
                                <td><?= $dt->nama_obat ?></td>
                                <td><?= $dt->kategori_obat ?></td>
                                <td><?= $dt->jenis_obat ?></td>
                                <td><?= $dt->satuan_obat ?></td>
                                <td><?= number_format($dt->jumlah) ?></td>
                                <td>Rp. <?= number_format($dt->harga_beli) ?></td>
                                <td>Rp. <?= number_format($dt->subtotal) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <th colspan="7" class="text-center">TOTAL</th>
                        <th><h5 >Rp. <?= number_format($totalsemua) ?></h5></th>
                    </tfoot>
                <?php endif ?>
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

</html>`