<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">note_add</i>&nbsp Data Izin</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
            <?php foreach($izin as $i): ?>
            <input type="hidden" name="status" value="23">

            <div class="row">
              <div class="col-md-6">
                  <label>Nomor Surat Permohonan</label>
                  <input type="text" class="form-control" value="<?php echo $i->no_permohonan; ?>" name="permohonan" disabled>
              </div>
              <div class="col-md-6">
                  <label>Nama Perusahaan</label>
                  <input type="text" class="form-control" value="<?php echo $i->nama_tpb ?>" name="permohonan"  disabled='disabled'/>
              </div>
             </div> 
            <div class="row">
              <div class="col-md-6">
                <label>Nomor Surat Persetujuan</label>
                <input type="text" class="form-control" name="no_surat" value="<?php echo $i->no_surat; ?>" disabled>
              </div>
              <div class="col-md-6">
                <label>Tanggal Surat Persetujuan</label>
                <input type="date" class="form-control" name="tgl_surat" value="<?php echo $i->tgl_surat; ?>" disabled>
              </div>
            </div>
          
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">note_add</i>&nbsp Rekam Jaminan</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body">
              <div class="form-group">                
                <label for="name">Bentuk Jaminan*</label>
                <select id="bentuk" class="form-control " name="bentuk_jaminan">
                  <option readonly="">--Pilih Bentuk Jaminan--</option>
                  <option value="customs_bond">Customs Bond</option>
                  <option value="tunai">Tunai</option>
                  <option value="bank_garansi">Bank Garansi</option>
                  <option value="jam_per">Jaminan Perusahaan</option>
                  <option value="jam_la">Jaminan Lainnya</option>
                </select>       
              </div>
              
              <div id="customs_bond" hidden>
                <div class="form-group" >
                  <?php echo form_open("perbenpelaksana/rekam_jaminan_act")?>
                  <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>"/>
                  
                  <input type="hidden" name="id_tpb" value="<?php echo $i->id_tpb ?>" />
                  <input type="hidden" name="bentuk_jaminan" value="1" />

                  <input type="hidden" name="status" value="6" />

                  <label for="name">Perusahaan Asuransi*</label>
                  <select class="form-control" name="id_penjamin" placeholder="Pilih Perusahaan Asuransi">
                    <option  disabled diselected >--Pilih Perusahaan Asuransi--</option>
                    <?php
                      foreach($penjamin as $p){
                    ?>
                    <option value="<?php echo $p->id_penjamin ?>"><?php echo $p->nama_penjamin;?></option>
                    <?php 
                      }
                    ?>  
                  </select>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="masukkanPesan">No Jaminan</label>
                      <input type="text" class="form-control" name="no_jaminan" required="required">
                    </div>
                    <div class="col-md-6">
                      <label for="masukkanPesan">Tanggal Jaminan</label>
                      <input type="date" class="form-control" name="tgl_jaminan" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="name">Nilai Jaminan yang Diajukan*</label>  
                  <input type="text" class="form-control" value="<?php $angka = $i->nilai; echo $this->fungsi->rupiah($angka);?>" name="nilai_jaminan" disabled/>
                  <span>*Pastikan nilai jaminan sesuai dengan surat persetujuan</span>
                </div>    
                <div class="form-group">
                    <label for="masukkanPesan">Jatuh Tempo Jaminan</label>
                    <input type="date" class="form-control" name="jth_tempo" value="<?php echo $i->jth_tempo ?>" disabled/>
                </div>
                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                <?php echo form_close(); ?>
              </div>
              </div>

              <div id="tunai" hidden>
                <div class="form">
                  <?php echo form_open("perbenpelaksana/rekam_jaminan_tn")?>
                    <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>"/>
                    
                    <input type="hidden" name="id_tpb" value="<?php echo $i->id_tpb ?>" />
                    <input type="hidden" name="bentuk_jaminan" value="2" />
                    <input type="hidden" name="status" value="12" />

                    <div class="form-group" >
                      <div class="row">
                        <div class="col-md-6">
                          <label for="masukkanPesan">No Jaminan</label>
                          <input type="text" class="form-control" name="no_jaminan"  />
                        </div>
                        <div class="col-md-6">
                          <label for="masukkanPesan">Tanggal Jaminan</label>
                          <input type="date" class="form-control" name="tgl_jaminan" />
                        </div>
                      </div>
                    </div>
                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                  <?php echo form_close(); ?>
                </div>
              </div>

              <div id="bank_garansi" hidden>

                <?php echo form_open("perbenpelaksana/rekam_jaminan_bg")?>
                    <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>"/>
                    
                    <input type="hidden" name="id_tpb" value="<?php echo $i->id_tpb ?>" />
                    <input type="hidden" name="bentuk_jaminan" value="3" />
                    <input type="hidden" name="status" value="13" />

                    <div class="form-group" >
                      <div class="row">
                        <div class="col-md-6">
                          <label for="masukkanPesan">No Jaminan</label>
                          <input type="text" class="form-control" name="no_jaminan"  />
                        </div>
                        <div class="col-md-6">
                          <label for="masukkanPesan">Tanggal Jaminan</label>
                          <input type="date" class="form-control" name="tgl_jaminan" />
                        </div>
                      </div>
                    </div>
                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                  <?php echo form_close(); ?>
              </div>

              <div id="jam_per" hidden>

                <?php echo form_open("perbenpelaksana/rekam_jaminan_act")?>
                    <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>"/>
                    <input type="hidden" name="id_tpb" value="<?php echo $this->session->userdata('id') ?>" />
                    <input type="hidden" name="bentuk_jaminan" value="4" />
                    <input type="hidden" name="nama_periksa" value="<?php echo $this->session->userdata('nama') ?>" />
                    <input type="hidden" name="waktu_periksa" value="<?php echo date('Y-m-d H:i:sa') ?>" />
                    <input type="hidden" name="status" value="15" />

                    <div class="form-group" >
                      <div class="row">
                        <div class="col-md-6">
                          <label for="masukkanPesan">No Jaminan</label>
                          <input type="text" class="form-control" name="no_jaminan"  />
                        </div>
                        <div class="col-md-6">
                          <label for="masukkanPesan">Tanggal Jaminan</label>
                          <input type="date" class="form-control" name="tgl_jaminan" />
                        </div>
                      </div>
                    </div>

                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                  <?php echo form_close(); ?>
              </div>

              <div id="jam_la" hidden>

                <?php echo form_open("perbenpelaksana/rekam_jaminan_act")?>
                    <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>"/>
                    <input type="hidden" name="id_tpb" value="<?php echo $this->session->userdata('id') ?>" />
                    <input type="hidden" name="bentuk_jaminan" value="5" />
                    <input type="hidden" name="nama_periksa" value="<?php echo $this->session->userdata('nama') ?>" />
                    <input type="hidden" name="waktu_periksa" value="<?php echo date('Y-m-d H:i:sa') ?>" />
                    <input type="hidden" name="status" value="7" />

                    <div class="form-group" >
                      <div class="row">
                        <div class="col-md-6">
                          <label for="masukkanPesan">No Jaminan</label>
                          <input type="text" class="form-control" name="no_jaminan"  />
                        </div>
                        <div class="col-md-6">
                          <label for="masukkanPesan">Tanggal Jaminan</label>
                          <input type="date" class="form-control" name="tgl_jaminan" />
                        </div>
                      </div>
                    </div>

                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                  <?php echo form_close(); ?>
              </div>
              <br/>             
          </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
  $(window).load(function(){
  $("#bentuk").change(function() {
  console.log($("#bentuk option:selected").val());
  if ($("#bentuk option:selected").val() == 'customs_bond') {
  $('#customs_bond').prop('hidden', false);
  $('#jam_per').prop('hidden', 'true');
  $('#jam_la').prop('hidden', 'true');
  $('#tunai').prop('hidden', 'true');
  $('#bank_garansi').prop('hidden', 'true');
  } else if ($("#bentuk option:selected").val() == 'tunai') {
  $('#tunai').prop('hidden', false);
  $('#customs_bond').prop('hidden', 'true');
  $('#jam_per').prop('hidden', 'true');
  $('#jam_la').prop('hidden', 'true');
  $('#bank_garansi').prop('hidden', 'true');
  }else if ($("#bentuk option:selected").val() == 'bank_garansi') {
  $('#bank_garansi').prop('hidden', false);
  $('#customs_bond').prop('hidden', 'true');
  $('#tunai').prop('hidden', 'true');
  $('#jam_per').prop('hidden', 'true');
  $('#jam_la').prop('hidden', 'true');
  }else if ($("#bentuk option:selected").val() == 'jam_per') {
  $('#jam_per').prop('hidden', false);
  $('#customs_bond').prop('hidden', 'true');
  $('#tunai').prop('hidden', 'true');
  $('#bank_garansi').prop('hidden', 'true');
  $('#jam_la').prop('hidden', 'true');
  }else{
  $('#jam_la').prop('hidden', false);
  $('#jam_per').prop('hidden', 'true');
  $('#customs_bond').prop('hidden', 'true');
  $('#tunai').prop('hidden', 'true');
  $('#bank_garansi').prop('hidden', 'true');
  }
  });
  });
</script>