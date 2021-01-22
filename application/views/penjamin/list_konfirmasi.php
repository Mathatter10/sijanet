<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            List Pengajuan Jaminan
          </header>

          <table class="table table-striped table-advance table-hover">
            <tbody>
              <tr>
                <th>No</th>
                <th><i class="icon_profile"></i>No Surat</th>
                <th><i class="icon_profile"></i> Nama KB</th>
                <th><i class="icon_calendar"></i> Kegiatan</th>
                <th><i class="icon_mail_alt"></i> Nilai</th>
                <th><i class="icon_pin_alt"></i> Jatuh Tempo</th>
                <th><i class="icon_pin_alt"></i> Status</th>
                <th><i class="icon_pin_alt"></i> Aksi</th>
              </tr>
              <?php $i = '1';
              foreach ($jaminan as $j) : ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td>S-<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?></td>
                  <td><?php echo $j->nama_tpb; ?></td>
                  <td><?php echo $j->ket_giat; ?></td>
                  <td><?php $angka = $j->nilai;
                        echo $this->fungsi->rupiah($angka); ?></td>
                  <td><?php $tanggal = $j->jth_tempo;
                        echo $this->fungsi->tgl_indo($tanggal); ?></td>
                  <td><?php echo $j->keterangan_status; ?></td>
                  <td>
                    <div class="btn-group">
                      <?php echo form_open('penjamin/konfirmasi_act') ?>
                      <input type="hidden" name="penjamin" value="<?php echo $this->session->userdata('nama') ?>" placeholder="Custom Text Message">
                      <input type="hidden" name="nosurat" value="<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/2019" placeholder="Custom Text Message">
                      <input type="hidden" name="nojaminan" value="<?php echo $j->no_jaminan ?>" placeholder="Custom Text Message">
                      <input type="hidden" name="id_surat" value="<?php echo $j->id_surat ?>" />
                      <input type="hidden" name="status" value="10" />
                      <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check"></i>Konfirmasi Jaminan</button>
                      <?php echo form_close(); ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </section>
      </div>
    </div>
  </section>
</section>