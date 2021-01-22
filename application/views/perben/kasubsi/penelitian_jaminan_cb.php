<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#profile" data-toggle="tab">
                    <i class="material-icons">assignment_turned_in</i> Konfirmasi
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <?php foreach ($jaminan as $s) : ?>
                  <?php if ($s->status == '10') { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">send</i> Penerbitan e-BPJ
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  <?php } ?>

              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <form action="<?php echo site_url('perbenkasubsi/tambah_konfirmasi_act') ?>" method="post">
                <table class="table">

                  <tr>
                    <td width="20%">Surat Persetujuan</td>
                    <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($s->tgl_surat)); echo $tahun ?></td>
                  </tr>
                  <tr>
                    <td width="20%">Perusahaan</td>
                    <td><?php echo $s->nama_tpb; ?></td>
                  </tr>
                  <tr>
                    <td width="20%">Kegiatan</td>
                    <td><?php echo $s->ket_giat; ?></td>
                  </tr>
                  <tr>
                    <td width="20%">Penjamin</td>
                    <td><?php echo $s->nama_penjamin; ?></td>
                  </tr>
                  <tr>
                    <td width="20%">Nomor Jaminan</td>
                    <td><?php echo $s->no_jaminan; ?></td>
                  </tr>
                  <tr>
                    <td width="20%">Tanggal Jaminan</td>
                    <td><?php $tanggal = $s->tgl_jaminan;
                          echo $this->fungsi->tgl_indo($tanggal); ?></td>
                  </tr>
                  <tr>
                    <td width="20%">Nilai Jaminan</td>
                    <td><?php $angka = $s->nilai;
                          echo $this->fungsi->rupiah($angka); ?></td>
                  </tr>
                  <tr>
                    <td width="20%">Jatuh Tempo</td>
                    <td><?php $tanggal = $s->jth_tempo;
                          echo $this->fungsi->tgl_indo($tanggal); ?></td>
                  </tr>
                  <tr>
                    <td width="20%">E-Jaminan</td>
                    <td><a href="<?php echo site_url('createpdf/jaminan/' . $s->id_surat) ?>" target="_blank"><i class="fa fa-download"></i></a></td>
                  </tr>
                  <tr>
                    <td width="20%">Catatan Pemeriksaan</td>
                    <td><?php echo $s->catatan_periksa; ?></td>
                  </tr>
                </table>
                <tr>
                  <td>
                    <?php if ($s->status == '8') { ?>
                      <div class="tile-footer">
                        <div>
                          <label for="name">Konfirmasi Jaminan</label>
                          <select id="bentuk" class="form-control " name="bentuk_konfirmasi">
                            <option>--Pilih Konfirmasi--</option>
                            <option value="tertulis">Konfirmasi Tertulis</option>
                            <option value="lisan">Konfirmasi Lisan</option>
                            <option value="aplikasi">Konfirmasi Sistem</option>
                          </select>
                        </div>

                        <div class="tile-footer" id="tertulis" hidden>
                          <?php echo form_open('perbenkasubsi/tambah_konfirmasi_act') ?>
                          <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
                          <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
                          <input type="hidden" name="status" value="10" />
                          <input type="hidden" name="bentuk_konfirmasi" value="1">
                          <label for="exampleTextarea">Catatan Konfirmasi Tertulis</label>
                          <textarea class="form-control" id="cek" rows="3" name="catatan_konfirmasi"></textarea>
                          <br>
                          <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan Konfirmasi</button>
                          <?php echo form_close(); ?>
                        </div>

                        <div class="tile-footer" id="lisan" hidden>
                          <?php echo form_open('perbenkasubsi/tambah_konfirmasi_act') ?>
                          <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
                          <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
                          <input type="hidden" name="status" value="10" />
                          <input type="hidden" name="bentuk_konfirmasi" value="2">
                          <label for="exampleTextarea">Catatan Konfirmasi Lisan</label>
                          <textarea class="form-control" id="cek" rows="3" name="catatan_konfirmasi"></textarea>
                          <br>
                          <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan Konfirmasi</button>
                          <?php echo form_close(); ?>
                        </div>

                        <div class="tile-footer" id="aplikasi" hidden>
                          <?php echo form_open('perbenkasubsi/tambah_konfirmasi_act') ?>
                          <input type="hidden" name="telegram_id" value="<?php echo $s->telegram_id ?>" placeholder="Telegram ID">
                          <input type="hidden" name="nosurat" value="<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date('Y'); ?>" placeholder="Custom Text Message">
                          <input type="hidden" name="nojaminan" value="<?php echo $s->no_jaminan ?>" placeholder="Custom Text Message">
                          <input type="hidden" name="kasubsi" value="<?php echo $this->session->userdata('jabatan'); ?>" placeholder="Custom Text Message">
                          <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
                          <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
                          <input type="hidden" name="status" value="9" />
                          <input type="hidden" name="bentuk_konfirmasi" value="3">
                          <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check"></i>Ajukan Konfirmasi</button>
                          <?php echo form_close(); ?>
                        </div>
                        <br>
                      </div>
                      <a class="btn btn-info" href="<?php echo site_url('perbenkasubsi/penelitian_lanjut/' . $s->id_jaminan); ?>"><i class="fa fa-fw fa-lg fa-arrow-right"></i>Lanjut *</a>
                      <a class="btn btn-secondary" href="<?php echo site_url('perbenkasubsi/list_jaminan_cb') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
                      <br><br>
                      <p>*silahkan klik "LANJUT" jika jaminan tidak membutuhkan konfirmasi</p>
                    <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($s->status == '10') {
                        ?><p>*silahkan Terbitkan E-BPJ</p>
                    <?php } ?>
                  </td>
                </tr>
              <?php endforeach; ?>
              </form>
            </div>
            <div class="tab-pane" id="messages">
              <form action="<?php echo site_url('perbenkasubsi/tambah_jaminan_act') ?>" method="post">
                <table class="table table-condensed table-hover">
                  <?php foreach ($jaminan as $s) : ?>
                    <input type="hidden" name="nomor_bpj" value="<?php echo $nomor ?>" />
                    <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
                    <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
                    <input type="hidden" name="nama_teliti" value="<?php echo $this->session->userdata('nama') ?>" />
                    <input type="hidden" name="waktu_teliti" value="<?php echo date('Y-m-d H:i:sa') ?>" />
                    <input type="hidden" name="tanggal_bpj" value="<?php echo date('Y-m-d'); ?>" />
                    <input type="hidden" name="status" value="11" />
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
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-print"></i>Terbitkan E-BPJ</button>
                  <button class="btn btn-danger" type="submit" id="add_data" disabled="disabled" href="#"><i class="fa fa-fw fa-lg fa-ban"></i>Tolak</button>
                  <a class="btn btn-secondary" href="<?php echo site_url('perbenkasubsi/list_konfirmasi') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
                </div>
              <?php endforeach; ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
  $(window).load(function() {
    $("#bentuk").change(function() {
      console.log($("#bentuk option:selected").val());
      if ($("#bentuk option:selected").val() == 'tertulis') {
        $('#tertulis').prop('hidden', false);
        $('#jam_per').prop('hidden', 'true');
        $('#jam_la').prop('hidden', 'true');
        $('#lisan').prop('hidden', 'true');
        $('#aplikasi').prop('hidden', 'true');
      } else if ($("#bentuk option:selected").val() == 'lisan') {
        $('#lisan').prop('hidden', false);
        $('#tertulis').prop('hidden', 'true');
        $('#jam_per').prop('hidden', 'true');
        $('#jam_la').prop('hidden', 'true');
        $('#aplikasi').prop('hidden', 'true');
      } else if ($("#bentuk option:selected").val() == 'aplikasi') {
        $('#aplikasi').prop('hidden', false);
        $('#tertulis').prop('hidden', 'true');
        $('#lisan').prop('hidden', 'true');
        $('#jam_per').prop('hidden', 'true');
        $('#jam_la').prop('hidden', 'true');
      } else if ($("#bentuk option:selected").val() == 'jam_per') {
        $('#jam_per').prop('hidden', false);
        $('#tertulis').prop('hidden', 'true');
        $('#lisan').prop('hidden', 'true');
        $('#aplikasi').prop('hidden', 'true');
        $('#jam_la').prop('hidden', 'true');
      } else {
        $('#jam_la').prop('hidden', false);
        $('#jam_per').prop('hidden', 'true');
        $('#tertulis').prop('hidden', 'true');
        $('#lisan').prop('hidden', 'true');
        $('#aplikasi').prop('hidden', 'true');
      }
    });
  });
</script>