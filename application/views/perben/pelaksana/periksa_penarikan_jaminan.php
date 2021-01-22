<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">List Jaminan Customs Bond</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('perbenpelaksana/rekam_penarikan_jaminan_act') ?>" method="post">
            <table class="table table-condensed table-hover">
              <?php foreach ($jaminan as $s) : ?>
                <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
                <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
                <input type="hidden" name="status" value="18" />

                <tr>
                  <td width="20%">Laporan Realisasi</td>
                  <td><a href="<?php echo site_url('createpdf/laporan/' . $s->id_surat) ?>" target="_blank" class="btn-sm btn-success">Lihat Laporan</a></td>
                </tr>
            </table>
            <div>
              <label for="exampleTextarea">Catatan *</label>
              <textarea class="form-control" id="cek" rows="3" name="catatan_periksa_penarikan"></textarea>
            </div>
            <div class="tile-footer">
              <input type="hidden" name="pelaksana" value="<?php echo $this->session->userdata('nama') ?>" placeholder="Custom Text Message">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check"></i>Ajukan ke kasubsi</button>
              <a class="btn btn-secondary" href="<?php echo site_url('perbenpelaksana/list_penarikan_jaminan') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
            </div>
          <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>