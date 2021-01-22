<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">List Jaminan Customs Bond</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('perbenkasubsi/rekam_penarikan_jaminan_act') ?>" method="post">
            <table class="table">
              <?php foreach ($jaminan as $s) : ?>
                <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
                <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
                <input type="hidden" name="nomor_ttpj" value="<?php echo $nomor ?>" />
                <input type="hidden" name="tanggal_ttpj" value="<?php echo date('Y-m-d') ?>" />
                <input type="hidden" name="status" value="19" />

                <tr>
                  <td width="20%">Laporan Realisasi</td>
                  <td><a href="<?php echo site_url('createpdf/laporan/' . $s->id_surat) ?>" target="_blank" class="btn-sm btn-success">Lihat Laporan</a></td>
                </tr>
                <tr>
                  <td width="20%">Catatan Periksa</td>
                  <td><?php echo $s->catatan_periksa_penarikan ?></td>
                </tr>
            </table>

            <div>
              <label for="exampleTextarea">Catatan *</label>
              <textarea class="form-control" id="cek" rows="3" name="catatan_penelitian_penarikan"></textarea>
            </div>
            <div class="tile-footer">
              <input type="hidden" name="telegram_id" value="<?php foreach ($notif as $e) : echo $e->telegram_id;endforeach; ?>" placeholder="Telegram ID">
              <input type="hidden" name="nosurat" value="<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/2019" placeholder="Custom Text Message">
              <input type="hidden" name="kasubsi" value="<?php echo $this->session->userdata('jabatan'); ?>" placeholder="Custom Text Message">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check"></i>Terbitkan TTPJ</button>
              
              <a class="btn btn-secondary" href="<?php echo site_url('perbenkasubsi/list_penarikan_jaminan') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
            </div>
          <?php endforeach; ?>
          </form>

          <div class="row">
            <div class="col-md- text-left">
              <div class="card-header">
                <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-lg fa-ban"></i>Tolak</button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Penolakan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="material-icons">clear</i>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="tile-footer">
                          <div>
                            <label for="name">Konfirmasi Penolakan</label>
                            <select id="bentuk" class="form-control " name="bentuk_penolakan">
                              <option>--Pilih Penolakan--</option>
                              <option value="pengembalian">Pengembalian</option>
                              <option value="pencairan">Pencairan</option>
                            </select>
                          </div>

                          <div class="tile-footer" id="pengembalian" hidden>
                            <?php echo form_open('perbenkasubsi/tambah_pengembalian_act') ?>
                            <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
                            <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
                            <input type="hidden" name="waktu_rekam" value="<?php echo date('Y-m-d H:i:s') ?>"/>
                            <input type="hidden" name="nip_rekam" value="<?php echo $this->session->userdata('nip'); ?>"/>
                            <input type="hidden" name="status" value="11" />
                            <input type="hidden" name="bentuk_penolakan" value="1">
                            <div>
                              <label for="exampleTextarea">Catatan Pengembalian Jaminan</label>
                              <textarea class="form-control" id="cek" rows="3" name="catatan_pengembalian"></textarea>
                            </div>
                            <br>
                            <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan Pengembalian</button>
                            <?php echo form_close(); ?>
                          </div>

                          <div class="tile-footer" id="pencairan" hidden>
                            <?php echo form_open('perbenkasubsi/tambah_pencairan_act') ?>
                            <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
                            <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
                            <input type="hidden" name="waktu_rekam" value="<?php echo date('Y-m-d H:i:s') ?>"/>
                            <input type="hidden" name="nip_rekam" value="<?php echo $this->session->userdata('nip'); ?>"/>
                            <input type="hidden" name="status" value="24" />
                            <input type="hidden" name="bentuk_penolakan" value="2">
                            <div>
                              <label>Bea Masuk</label>
                              <input type="text" class="form-control" name="bea_masuk" placeholder="" required="required">
                            </div>
                            <div>
                              <label>Ppn</label>
                              <input type="text" class="form-control" name="ppn" placeholder="" required="required">
                            </div>
                            <div>
                              <label>Pph</label>
                              <input type="text" class="form-control" name="pph" placeholder="" required="required">
                            </div>
                            <div>
                              <label>Denda</label>
                              <input type="text" class="form-control" name="denda" placeholder="" required="required">
                            </div>
                            <div>
                              <label>Nomor Billing</label>
                              <input type="text" class="form-control" name="nomor_billing" placeholder="" required="required">
                            </div>
                            <br>
                            <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan Pencairan</button>
                            <?php echo form_close(); ?>
                          </div>
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
      if ($("#bentuk option:selected").val() == 'pengembalian') {
        $('#pengembalian').prop('hidden', false);
        $('#pencairan').prop('hidden', 'true');
      } else if ($("#bentuk option:selected").val() == 'pencairan') {
        $('#pencairan').prop('hidden', false);
        $('#pengembalian').prop('hidden', 'true');
      } else {
        $('#pengembalian').prop('hidden', 'true');
        $('#pencairan').prop('hidden', 'true');
      }
    });
  });
</script>