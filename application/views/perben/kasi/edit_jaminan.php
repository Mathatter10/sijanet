<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="card">
            <?php foreach ($jaminan as $s): ?>
          <div class="card-header card-header-text card-header-warning">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Detail Pengajuan</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table">
              <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
              <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
              <input type="hidden" name="nama_periksa" value="<?php echo $this->session->userdata('nama') ?>" />
              <input type="hidden" name="waktu_periksa" value="<?php echo date('Y-m-d H:i:sa') ?>" />
              <input type="hidden" name="status" value="8" />

              <tr>
                <td width="20%">Surat Persetujuan</td>
                <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/2019</td>
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
                <td width="20%">Bentuk Jaminan</td>
                <td><?php $bentuk = $s->bentuk_jaminan;
                      switch ($bentuk) {
                        case '1':
                          echo 'Customs Bond';
                          break;
                        case '2':
                          echo 'Jaminan Tunai';
                          break;
                        case '3':
                          echo 'Bank Garansi';
                          break;
                        case '4':
                          echo 'Jaminan Lainnya';
                          break; 
                      }
                     ?></td>
              </tr>
              <?php if($s->bentuk_jaminan == '1'){ ?>
                <tr>
                <td width="20%">Penjamin</td>
                <td><?php echo $s->nama_penjamin; ?></td>
              </tr>
            <?php } else {

          }?>
              <tr>
                <td width="20%">Nomor Jaminan</td>
                <td><?php echo $s->no_jaminan; ?></td>
              </tr>
              <tr>
                <td width="20%">Tanggal Jaminan</td>
                <td><?php echo $s->tgl_jaminan;  ?></td>
              </tr>
              <tr>
                <td width="20%">Nilai Jaminan</td>
                <td><?php $angka = $s->nilai; echo $this->fungsi->rupiah($angka);?></td>
              </tr>
              <tr>
                <td width="20%">Jatuh Tempo</td>
                <td><?php $tanggal = $s->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
              </tr>
            </table>
            <?php endforeach ;?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-text card-header-danger">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Edit Data</h4>
          </div>
          <div class="card-body table-responsive">
            <form action="<?php echo site_url() . 'perbenkasi/edit_jaminan_act'; ?>" method="post">
            <table class="table">
              <?php foreach ($jaminan as $s): ?>
              <input type="hidden" name="id_jaminan" value="<?php echo $s->id_jaminan ?>" />
              <input type="hidden" name="id_surat" value="<?php echo $s->id_surat ?>" />
              <input type="hidden" name="nama_edit" value="<?php echo $this->session->userdata('nama') ?>" />
              <input type="hidden" name="waktu_edit" value="<?php echo date('Y-m-d H:i:sa') ?>" />
              <input type="hidden" name="status" value="8" />

              <tr>
                <td width="20%">Surat Persetujuan</td>
                <td><input type="text" class="form-control" name="no_surat" value="<?php echo $s->no_surat ?>"></td>
              </tr>
              <tr>
                <td width="20%">Perusahaan</td>
                <td><select name="id_tpb" class="form-control selectpicker" data-live-search="true"  required="required">
                    <option disabled selected> -- Pilih Nama Perusahaan -- </option>
                    <?php
                    foreach ($tpbdetail as $t) {
                        ?>
                        <option data-con="<?php echo $t->telegram_id; ?>" value="<?php echo $t->id_tpb; ?>"><?php echo $t->nama_tpb; ?></option>
                    <?php
                    }
                    ?>
                </select></td>
              </tr>
              <tr>
                <td width="20%">Kegiatan</td>
                <td><select name="ket_giat" class="form-control selectpicker" data-live-search="false" required="required">
                    <?php
                    foreach ($kegiatan as $g) {
                        ?>
                        <option value="<?php echo $g->id; ?>"><?php echo $g->ket_giat; ?></option>
                    <?php
                    }
                    ?>
                </select></td>
              </tr>
              <tr>
                <td width="20%">Bentuk Jaminan</td>
                <td><?php $bentuk = $s->bentuk_jaminan;
                      switch ($bentuk) {
                        case '1':
                          echo 'Customs Bond';
                          break;
                        case '2':
                          echo 'Jaminan Tunai';
                          break;
                        case '3':
                          echo 'Bank Garansi';
                          break;
                        case '4':
                          echo 'Jaminan Lainnya';
                          break; 
                      }
                     ?></td>
              </tr>
              <?php if($s->bentuk_jaminan == '1'){ ?>
                <tr>
                <td width="20%">Penjamin</td>
                <td><select name="id_penjamin" class="form-control selectpicker" data-live-search="true"  required="required">
                    <option disabled selected> -- Pilih Nama Penjamin -- </option>
                    <?php
                    foreach ($penjamin as $t) {
                        ?>
                        <option value="<?php echo $t->id_penjamin; ?>"><?php echo $t->nama_penjamin; ?></option>
                    <?php
                    }
                    ?></td>
              </tr>
            <?php } else {

          }?>
              <tr>
                <td width="20%">Nomor Jaminan</td>
                <td><input type="text" class="form-control" name="no_jaminan" value="<?php echo $s->no_jaminan ?>"></td>
              </tr>
              <tr>
                <td width="20%">Tanggal Jaminan</td>
                <td><input type="date" name="tgl_jaminan" class="form-control" value="<?php echo $s->tgl_jaminan ?>"></td>
              </tr>
              <tr>
                <td width="20%">Nilai Jaminan</td>
                <td><input type="text" class="form-control" name="nilai" value="<?php echo $s->nilai ?>"></td>
              </tr>
              <tr>
                <td width="20%">Jatuh Tempo</td>
                <td><input type="date" class="form-control" name="jth_tempo" value="<?php echo $s->jth_tempo ?>"></td>
              </tr>
            </table>
            <?php endforeach ;?>
            <div class="form-group">
              <div class="col-lg-12">
                <p align="center" style="color: red; font-size: 17"><b> Saya bertanggungjawab atas keabsahan data yang akan diedit <br /> </b><input class="checkbox" type="checkbox" id="check" align="center"> </p> <br />
              </div>
              <div class="col-lg-12" align="center">
                <button type="submit" class="btn btn-primary" id="btn" disabled="">Setuju</button> | <a href="" data-target="#tolak" data-toggle="modal" class="btn btn-danger">Tolak</a>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
    var checker = document.getElementById('check');
    var sendbtn = document.getElementById('btn');
    // when unchecked or checked, run the function
    checker.onchange = function() {
    if (this.checked) {
    sendbtn.disabled = false;
    } else {
    sendbtn.disabled = true;
    }
    }
</script>