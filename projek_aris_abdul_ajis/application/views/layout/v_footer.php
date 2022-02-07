<div class="modal fade" id="ubah-data-supplier" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
        <h4>Ubah Data Supplier</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>supplier/edit" method="post">
        <div class="row">
          <input type="hidden" id="id_supplier" name="id_supplier">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_supplier">Nama</label>
              <input id="nama_supplier" class="form-control" type="text" name="nama_supplier" placeholder="Nama" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="telepon_supplier">Telepon</label>
              <input id="telepon_supplier" class="form-control" type="number" name="telepon_supplier" placeholder="Telepon" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="alamat_supplier">Alamat</label>
          <textarea name="alamat_supplier" id="alamat_supplier" class="form-control" placeholder="Alamat" required></textarea>
        </div>
        <div class="form-group">
          <label for="keterangan_supplier">Keterangan</label>
          <textarea name="keterangan_supplier" id="keterangan_supplier" class="form-control" placeholder="Keterangan" required></textarea>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
        <button type="reset" class="btn btn-info"><i class="feather icon-refresh-ccw"></i> Reset</button>
      </form>
    </div>
  </div>
</div>
</div>
<script src="<?= base_url() ?>public/template/assets/js/vendor-all.min.js"></script>
<script src="<?= base_url() ?>public/template/assets/js/plugins/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>public/template/assets/js/pcoded.min.js"></script>
<script src="<?= base_url() ?>public/template/assets/js/plugins/apexcharts.min.js"></script>
<script src="<?= base_url() ?>public/template/assets/js/pages/dashboard-main.js"></script>
<script src="<?= base_url() ?>public/template/assets/alert/js/sweetalert.min.js"></script>
<script src="<?= base_url() ?>public/template/assets/alert/js/qunit-1.18.0.js"></script>
<script type="text/javascript">
  $(".alert-slide-up").alert().delay(3000).slideUp('slow');
</script>
<script >
  $(document).ready(function() {
    var table = $('#example').DataTable( {
      rowReorder: {
        selector: 'td:nth-child(2)'
      },
      responsive: false
    } );
  } );

  $(document).on('click', '.hapus-kategori', function(){
    var getLink = $(this).attr('href');
    swal({
      title: 'Apakah anda yakin?',
      text:  'Kategori obat tidak bisa dikembalikan lagi setelah dihapus!',
      type: 'warning',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
      window.location.href = getLink
    });
    return false;
  });

  $(document).on('click', '.hapus-satuan', function(){
    var getLink = $(this).attr('href');
    swal({
      title: 'Apakah anda yakin?',
      text:  'Satuan obat tidak bisa dikembalikan lagi setelah dihapus!',
      type: 'warning',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
      window.location.href = getLink
    });
    return false;
  });

  $(document).on('click', '.hapus-jenis', function(){
    var getLink = $(this).attr('href');
    swal({
      title: 'Apakah anda yakin?',
      text:  'Data tidak bisa dikembalikan lagi setelah dihapus!',
      type: 'warning',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
      window.location.href = getLink
    });
    return false;
  });

  $(document).on('click', '.hapus-user', function(){
    var getLink = $(this).attr('href');
    swal({
      title: 'Apakah anda yakin?',
      text:  'User tidak bisa dikembalikan lagi setelah dihapus!',
      type: 'warning',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
      window.location.href = getLink
    });
    return false;
  });

 $(document).on('click', '.hapus-supplier', function(){
    var getLink = $(this).attr('href');
    swal({
      title: 'Apakah anda yakin?',
      text:  'Supplier tidak bisa dikembalikan lagi setelah dihapus!',
      type: 'warning',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
      window.location.href = getLink
    });
    return false;
  });

  $(document).on('click', '.hapus-obat', function(){
    var getLink = $(this).attr('href');
    swal({
      title: 'Apakah anda yakin?',
      text:  'Data obat tidak bisa dikembalikan lagi setelah dihapus!',
      type: 'warning',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
      window.location.href = getLink
    });
    return false;
  });

  $(document).on('click', '.hapus-keranjang', function(){
    var getLink = $(this).attr('href');
    swal({
      title: 'Apakah anda yakin?',
      type: 'warning',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
      window.location.href = getLink
    });
    return false;
  });

  $(document).on('click', '#keluar', function(){
    var getLink = $(this).attr('href');
    swal({
      title: 'Apakah anda yakin?',
      type: 'warning',
      html: true,
      confirmButtonColor: '#d9534f',
      showCancelButton: true,
    },function(){
      window.location.href = getLink
    });
    return false;
  });

  $(document).on('click', '.ubah-supplier', function(){
    var id_supplier = $(this).attr("id");
    $.ajax({
      url:"<?= base_url(); ?>supplier/data_supplier",
      method:"POST",
      data:{id_supplier:id_supplier},
      dataType:"JSON",
      success:function(data)
      {
        $('#ubah-data-supplier').modal('show');
        $('#id_supplier').val(data.id_supplier);
        $('#nama_supplier').val(data.nama_supplier);
        $('#telepon_supplier').val(data.telepon_supplier);
        $('#alamat_supplier').val(data.alamat_supplier);
        $('#keterangan_supplier').val(data.keterangan);
      }
    });
  });
</script>
</body>

</html>