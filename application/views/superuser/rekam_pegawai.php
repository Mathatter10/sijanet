<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">people</i>&nbsp Rekam Pegawai</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('superuser/tambah_pegawai_act')?>" method="post">
            <input type="hidden" name="id_bc"/>
            <div class="row">
              <div class="col-md-6">
                <label><strong>Data Detail</strong></label>
                <div class="form-group">
                  <label class="bmd-label-floating">Nama Pegawai</label>
                  <input type="text" class="form-control" placeholder="" name="nama_bc" required="required">
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
                  <label class="bmd-label-floating">NIP Pegawai</label>
                  <input type="text" class="form-control" placeholder="" name="nip" required="required">
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
                  <label class="bmd-label-floating"></label>
                  <select id="unit_pegawai" class="form-control " name="unit">
                    <option class="bmd-label-floating" disabled selected value>-- Pilih Unit --</option>
                    <option value="1">PKC</option>
                    <option value="2">Perben</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating"></label>
                  <select id="level_pegawai" class="form-control " name="level">
                    <option class="bmd-label-floating" disabled selected value>-- Pilih Level --</option>
                    <option value="1">Kepala Seksi</option>
                    <option value="2">Kepala Subseksi</option>
                    <option value="3">Pelaksana</option>
                  </select>
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