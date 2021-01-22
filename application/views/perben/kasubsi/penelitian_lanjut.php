<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">Penerbitan e-BPJ</h4>
          <p class="card-category"></p>
        </div>

        <div class="card-body table-responsive">
          <form action="<?php echo site_url('perbenkasubsi/tambah_jaminan_act')?>" method="post">
            <table class="table">
              <?php foreach ($jaminan as $s): ?>
              <input type="text" name="nomor_bpj" value="<?php echo $nomor ?>" />
              <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
              <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
              <input type="hidden" name="nama_teliti" value="<?php echo $this->session->userdata('nama') ?>" />
              <input type="hidden" name="waktu_teliti" value="<?php echo date('Y-m-d H:i:sa') ?>" />                                
              <input type="hidden" name="tanggal_bpj" value="<?php echo date('Y-m-d');?>" />
              <input type="hidden" name="status" value="11" />
            </table>

            <div>
              <label for="exampleTextarea">Catatan *</label>
              <textarea class="form-control" id="cek" rows="3" name="catatan_teliti"></textarea>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"  ><i class="fa fa-fw fa-lg fa-print"></i>Terbitkan E-BPJ</button>
              <button class="btn btn-danger" type="submit" id="add_data" disabled="disabled" href="#" ><i class="fa fa-fw fa-lg fa-ban"></i>Tolak</button>
              <a class="btn btn-secondary" href="<?php echo site_url('perbenkasubsi/penelitian_jaminan_cb/'.$s->id_jaminan) ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
            </div>
            <?php endforeach ;?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>