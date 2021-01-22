<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">List Jaminan Tunai</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('perbenkasubsi/tambah_jaminan_bg_act')?>" method="post">
            <table class="table">
              <?php foreach ($jaminan as $s): ?>
              <input type="hidden" name="nomor_bpj" value="<?php echo $nomor ?>" />
              <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
              <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
              <input type="hidden" name="nama_teliti" value="<?php echo $this->session->userdata('nama') ?>" />
              <input type="hidden" name="waktu_teliti" value="<?php echo date('Y-m-d H:i:sa') ?>" />
              <input type="hidden" name="tanggal_bpj" value="<?php echo date('Y-m-d'); ?>" />
              <input type="hidden" name="status" value="11" />

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
                <td width="20%">Nomor Jaminan</td>
                <td><?php echo $s->no_jaminan; ?></td>
              </tr>
              <tr>
                <td width="20%">Jatuh Tempo</td>
                <td><?php $tanggal = $s->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
              </tr>
              <tr>
                <td width="20%">Catatan Pemeriksaan</td>
                <td><?php echo $s->catatan_periksa; ?></td>
              </tr>
            </table>
            <div>
              <label for="exampleTextarea">Catatan *</label>
              <textarea class="form-control" id="cek" rows="3" name="catatan_teliti"></textarea>
            </div>
            <div class="tile-footer">
              <input type="hidden" name="telegram_id" value="<?php foreach ($notif as $e) : echo $e->telegram_id;endforeach; ?>" placeholder="Telegram ID">
              <input type="hidden" name="nosurat" value="<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date('Y'); ?>" placeholder="Custom Text Message">
              <input type="hidden" name="nojaminan" value="<?php echo $nomor ?>" placeholder="Custom Text Message">
              <input type="hidden" name="kasubsi" value="<?php echo $this->session->userdata('jabatan'); ?>" placeholder="Custom Text Message">
              <button class="btn btn-primary" type="submit"  ><i class="fa fa-fw fa-lg fa-print"></i>Terbitkan E-BPJ</button>
              <button class="btn btn-danger" type="submit" id="add_data" disabled="disabled" href="#" ><i class="fa fa-fw fa-lg fa-ban"></i>Tolak</button>
              <a class="btn btn-secondary" href="<?php echo site_url('perbenkasubsi/list_jaminan_bg') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
            </div>
            <?php endforeach ;?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>