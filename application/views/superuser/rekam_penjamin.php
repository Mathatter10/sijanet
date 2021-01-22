<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">people</i>&nbsp Rekam Penjamin</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('superuser/tambah_penjamin_act')?>" method="post">
            <?php foreach ($penjamin as $s) : ?>
              <input type="hidden" name="id_penjamin" value="<?php echo $s->id_penjamin +1?>" />
            <?php endforeach; ?>
            <div class="row">
              <div class="col-md-6">
                <label><strong>Data Detail</strong></label>
                <div class="form-group">
                  <label class="bmd-label-floating">Nama Penjamin</label>
                  <input type="text" class="form-control" placeholder="" name="nama_penjamin" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <label><strong>Data Login</strong></label>
                <div class="form-group">
                  <label class="bmd-label-floating">Username</label>
                  <input type="text" class="form-control" placeholder="" name="username" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">NPWP Penjamin</label>
                  <input type="text" class="form-control" placeholder="" name="npwp_penjamin" required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Password</label>
                  <input type="text" class="form-control" placeholder="" name="password" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Alamat Penjamin</label>
                  <input type="text" class="form-control" placeholder="" name="alamat_penjamin" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nomor Telepon</label>
                  <input type="text" class="form-control" placeholder="" name="telepon" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nomor Faksimili</label>
                  <input type="text" class="form-control" placeholder="" name="faksimili" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Id Telegram</label>
                  <input type="text" class="form-control" placeholder="" name="telegram_id">
                </div>
              </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-success" type="submit"  ><i class="fa fa-fw fa-lg fa-save"></i>Simpan</a></button>
              <a class="btn btn-primary pull-right" href="<?php echo site_url('superuser') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
            </div>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>