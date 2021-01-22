<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">business</i>&nbsp Rekam Perusahaan</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('perbenpelaksana/tambah_pengusaha_act')?>" method="post">
            <table>
              <?php foreach ($perusahaan as $s) : ?>
                <input type="hidden" name="id_tpb" value="<?php echo $s->id_detail +1?>" />
                <input type="hidden" name="telepon_tpb" value="-" />
                <input type="hidden" name="faksimili_tpb" value="-" />
                <input type="hidden" name="id_hanggar" value="-" />
                <input type="hidden" name="telegram_id" value="-" />
              <?php endforeach; ?>
            </table>
            <div class="form-group">
              <label>NPWP Pengusaha</label>
              <input type="text" class="form-control" placeholder="" name="npwp_tpb">
            </div>
            <div class="form-group">
              <label>Nama Pengusaha</label>
              <input type="text" class="form-control" placeholder="" name="nama_tpb">
            </div>
            <div class="form-group">
              <label>Alamat Pengusaha</label>
              <input type="text" class="form-control" placeholder="" name="alamat_tpb">
            </div>
            <div class="form-group">
              <label>Nomor SKEP</label>
              <input type="text" class="form-control" placeholder="" name="no_skep">
            </div>
            <div class="tile-footer">
              <button class="btn btn-success" type="submit"  ><i class="fa fa-fw fa-lg fa-save"></i>Simpan</a></button>
              <a class="btn btn-primary pull-right" href="<?php echo site_url('perbenpelaksana/rekam_izin') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>