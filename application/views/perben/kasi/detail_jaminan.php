<?php if($this->session->flashdata('success')){ ?>  
    <div class="alert alert-success">  
        <a href="#" class="close" data-dismiss="alert">&times;</a>  
        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
    </div> 
<?php } ?>

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
            <a href="<?php echo site_url('perbenkasi/edit_jaminan/'.$s->id_surat)?>" class="btn btn-sm" style="float:right" data-toggle="tooltip" data-placement="top" title="Edit Jaminan"><i class="material-icons">create</i></a>
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
                        case '5':
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
          <div class="card-header card-header-text card-header-warning">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Dokumen</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table">
              <?php foreach ($jaminan as $s): ?>
              
              <?php 
                if($s->bentuk_jaminan == '1' ){ ?>
              <tr>
                <td width="20%">E-Jaminan</td>
                <td><a href="<?php echo site_url('createpdf/jaminan/'.$s->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak E-Jaminan"><i class="fa fa-print"></i></a></td>
              </tr>
              <?php } else{

              }; ?>
              <tr>
                <?php if($s->status > '6'){
                    ?><td width="20%">E-TTSJ</td>
                <td><a href="<?php echo site_url('createpdf/ttsj/'.$s->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak E-TTSJ"><i class="fa fa-print"></i></a></td>                                  
                 <?php } ?>                                    
              </tr>
              <tr>
                <?php if($s->status >= 11){
                    ?><td width="20%">BPJ</td>
                      <td><a href="<?php echo site_url('createpdf/bpj/'.$s->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak BPJ"><i class="fa fa-print"></i></a></td>                                   
                 <?php } ?>                                    
              </tr>
              <tr>
                <?php if($s->status == '18'){
                    ?><td width="20%">TTPJ</td>
                      <td><a href="<?php echo site_url('createpdf/ttpj/'.$s->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak TTPJ"><i class="fa fa-print"></i></a></td>                                   
                 <?php } ?>                                    
              </tr>
              <?php 
                $status = $s->status;
                if($status >= '19'){ ?>
              <tr>
                <td width="20%"><strong>E-TTPJ</strong></td>
                <td><a href="<?php echo site_url('createpdf/ttpj/'.$s->id_surat)?>" target="_blank" class="btn-sm btn-success">Cetak E-TTPJ</a></td>
              </tr>
              <tr>
                <td width="20%">Laporan Realisasi</td>
                <td><a href="<?php echo site_url('createpdf/laporan/'.$s->id_surat)?>" target="_blank"class="btn-sm btn-success">Lihat Laporan</a></td>
              </tr>
              <?php } else{
            
              }; ?>
              <tr>
              <tr>
                <td width="20%">Status</td>
                <td>
                  <?php if($s->status == '8'){
                    ?><p class="badge badge-warning">Jaminan belum diteliti oleh kasubsi</p>
                  <?php } elseif($s->status == '9'){
                    ?><p class="badge badge-warning">Jaminan belum dikonfirmasi oleh Penjamin</p>
                  <?php } elseif($s->status == '16'){
                    ?><p class="badge badge-warning">Penarikan belum diteliti oleh Pelaksana</p>
                  <?php } elseif($s->status == '18'){
                    ?><p class="badge badge-warning">Penarikan belum diteliti oleh kasubsi</p>
                  <?php } elseif($s->status == '19'){
                    ?><p class="badge badge-success">Penarikan Berhasil</p>
                  <?php } elseif($s->hardcopy == NULL){
                    ?><p class="badge badge-warning">Berkas Asli belum diterima</p>
                  <?php } else{
                    ?><p class="badge badge-success">Berkas Asli sudah diterima</p>
                  <?php } ?>
                </td>
              </tr>
              <?php endforeach ;?>
            </table>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>