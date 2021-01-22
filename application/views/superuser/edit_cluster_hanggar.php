<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-text card-header-warning">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Data</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table">
            <?php foreach($hanggar as $u): ?>
              <tr>
                <td width="20%">Hanggar</td>
                <td><?php echo $u->keterangan_hanggar ?></td>
              </tr>
              <tr>
                <td width="20%">Nama Hanggar</td>
                <td><?php echo $u->nama_bc ?></td>
              </tr>
              <tr>
                <td width="20%">Id Telegram</td>
                <td><?php echo $u->telegram_id ?></td>
              </tr>
            </table>
            <?php endforeach;?>
            <div class="tile-footer">
              <a class="btn btn-primary pull-left" href="<?php echo site_url('superuser/clustering_hanggar') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title"><i class="material-icons">people</i>&nbsp Edit Cluster Perusahaan</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body table-responsive">
            <form action="<?php echo site_url('superuser/edit_cluster_hanggar_act')?>" method="post">
              <?php foreach ($hanggar as $p) : ?>
                <input type="hidden" name="id_bc" value="<?php echo $p->id_bc; ?>">
                <input type="hidden" name="id_hanggar" value="<?php echo $p->id_hanggar; ?>">
              <div class="row">
                <div class="col-md-12">
                  <div class="tile-footer">
                    <label>Hanggar</label>
                    <select name="id_bc" id="slc_nama" class="form-control" data-live-search="true" required="required">
                      <option disabled selected > -- Silahkan Pilih -- </option>
                      <?php foreach ($bchanggar as $p) : ?>
                      <option data-subtext="<?php echo $p->nama_bc; ?>" value="<?php echo $p->id_bc; ?>"><?php echo $p->nama_bc; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Id Telegram</label>
                    <input type="text" class="form-control" placeholder="" name="telegram_id" required="required">
                  </div>
                </div>
              </div>
              <div class="tile-footer">
                <button class="btn btn-success pull-right" type="submit"  ><i class="fa fa-fw fa-lg fa-save"></i>Simpan</a></button>
              </div>
              <div class="clearfix"></div>
              <?php endforeach; ?>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>