<?php  
$instansi = $this->public_model->get_instansi();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title><?= $title ?></title>
  <link href="../styles/styles_cetak.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
    window.print();
    window.onfocus=function(){ window.close();}
  </script>
  <style>
    .nota {
      margin-bottom: 20px;
      background-color: #fff;
      border: 1px solid transparent;
      -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
      box-shadow: 0 1px 1px rgba(0,0,0,.05);
      width: 800px;
    }
  </style>
</head>
<body onLoad="window.print()">
  <center>
    <div style="border-color:#202020;" class="nota"><br>
      <table class="table-list" width="90%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td height="87" colspan="3" align="center">
            <strong><?= $instansi->instansi ?></strong><br />
            <strong><?= $instansi->alamat ?></strong>
            <hr>
          </td>
        </tr>
        <tr>
          <td><b>Kode Transaksi</b></td>
          <td>:</td>
          <td><?= $obat_masuk->kode_obat_masuk ?></td>
        </tr>
        <tr>
          <td><b>Tanggal Obat Masuk</b></td>
          <td>:</td>
          <td><?= tgl_indo( $obat_masuk->tanggal_masuk) ?></td>
        </tr>
        <tr>
          <td width="40%"><b>Suplier</b></td>
          <td width="6%">:</td>
          <td><?= $obat_masuk->nama_supplier ?></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
      </table>
      <table class="table-list" width="90%" border="1" cellspacing="0" cellpadding="2">
       <tr>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Jenis</th>
        <th>Satuan</th>
        <th>Jumlah</th>
        <th>Harga Beli</th>
      </tr>
      <?php foreach ($detail_obat_masuk as $key => $value): ?>
        <tr>
          <td><?= $key+1 ?></td>
          <td><?= $value->nama_obat ?></td>
          <td><?= $value->kategori_obat ?></td>
          <td><?= $value->jenis_obat ?></td>
          <td><?= $value->satuan_obat ?></td>
          <td><?= $value->jumlah ?></td>
          <td>Rp. <?= number_format($value->harga_beli) ?></td>
        </tr>
      <?php endforeach ?>
      <tr>
        <th colspan="6"> Total</th>
        <th>Rp. <?=  number_format($obat_masuk->total) ?></th>
      </tr>
    </table><br><br>
  </div>
</center>
</body>
</html>
