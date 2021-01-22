<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">List Jaminan Customs Bond</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('perbenpelaksana/periksa_jaminan_tn_act')?>" method="post">
            <table class="table">
              <?php foreach ($jaminan as $s): ?>
              <input type="hidden" name="nomor_ttsj" value="<?php echo $nomor ?>" />
              <input type="hidden" name="tanggal_ttsj" value="<?php echo date('Y-m-d') ?>" />
              <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
              <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
              <input type="hidden" name="nama_periksa" value="<?php echo $this->session->userdata('nama') ?>" />
              <input type="hidden" name="waktu_periksa" value="<?php echo date('Y-m-d H:i:sa') ?>" />
              <input type="hidden" name="status" value="8" />
              
              <tr>
                <td width="20%">Surat Persetujuan</td>
                <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($s->tgl_surat)); echo $tahun ?></td>
              </tr>
              <tr>
                <td width="20%">Perusahaan</td>
                <td><?php echo $s->nama_tpb; ?></td>
              </tr>
              <tr>
                <td width="20%">Nilai Jaminan</td>
                <td><?php $angka = $s->nilai; echo $this->fungsi->rupiah($angka);?></td>
              </tr>
              <tr>
                <td width="20%">Jatuh Tempo</td>
                <td><?php $tanggal = $s->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
              </tr>
              <tr>
                <td width="20%">Nomor Jaminan</td>
                <td><input type="text" class="form-control" name="no_jaminan" required="required"></td>
              </tr>
              <tr>
                <td width="20%">Tanggal Jaminan</td>
                <td><input type="date" class="form-control" name="tgl_jaminan" required="required"></td>
              </tr>
              
            </table>
            <div>
              <label for="exampleTextarea">Catatan *</label>
              <textarea class="form-control" id="cek" rows="3" name="catatan_periksa"></textarea>
            </div>
            <div class="tile-footer">
              <input type="hidden" name="pelaksana" value="<?php echo $this->session->userdata('nama') ?>" placeholder="Custom Text Message">
              <input type="hidden" name="nosurat" value="<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date('Y'); ?>" placeholder="Custom Text Message">
              <button class="btn btn-primary" type="submit"  ><i class="fa fa-fw fa-lg fa-check"></i>Ajukan ke kasubsi</button>
              <button class="btn btn-danger" type="submit" id="add_data" disabled="disabled" href="#" ><i class="fa fa-fw fa-lg fa-ban"></i>Tolak</button>
              <a class="btn btn-secondary" href="<?php echo site_url('perbenpelaksana/list_jaminan_tn') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
            </div>
            <?php endforeach ;?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>