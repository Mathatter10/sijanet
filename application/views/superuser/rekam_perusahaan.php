<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">people</i>&nbsp Rekam Perusahaan</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('superuser/tambah_perusahaan_act')?>" method="post">
            <?php foreach ($perusahaan as $s) : ?>
              <input type="hidden" name="id_tpb" value="<?php echo $s->id_tpb +1?>" />
            <?php endforeach; ?>
            <div class="row">
              <div class="col-md-6">
                <label><strong>Data Detail</strong></label>
                <div class="form-group">
                  <label class="bmd-label-floating">Nama Perusahaan</label>
                  <input type="text" class="form-control" placeholder="" name="nama_tpb" required="required">
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
                  <label class="bmd-label-floating">NPWP Perusahaan</label>
                  <input type="text" class="form-control" placeholder="" name="npwp_tpb" required="required">
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
                  <label class="bmd-label-floating">Alamat Perusahaan</label>
                  <input type="text" class="form-control" placeholder="" name="alamat_tpb" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nomor SKEP</label>
                  <input type="text" class="form-control" placeholder="" name="no_skep" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nomor Telepon</label>
                  <input type="text" class="form-control" placeholder="" name="telepon_tpb" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nomor Faksimili</label>
                  <input type="text" class="form-control" placeholder="" name="faksimili_tpb" required="required">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Id Hanggar</label>
                  <input type="text" class="form-control" placeholder="" name="id_hanggar">
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