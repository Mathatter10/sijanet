 <?php 
     error_reporting(0);
?>     
<div class="content">
  <div class="container-fluid">
    <div class="row">
    <!-- Card Surat Persetujuan Start -->  
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header card-header-text card-header-warning">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Detail Surat Persetujuan</h4>
            <?php foreach ($surat as $surat): ?>
                    <?php if($surat->revisi =='1'){ ?>
                  <a href="" data-target="#revisi" data-toggle="modal" class="btn btn-sm btn-primary">Revisi</a> <?php } ?>
          </div>
          <div class="card-body table-responsive">
            <table class="table">
              <tr>
                <td width="20%">Surat Persetujuan</td>
                <td>S-<?php echo $surat->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($surat->tgl_surat)); echo $tahun ?></td>
              </tr>
              <tr>
                <td width="20%">Perusahaan</td>
                <td><?php echo $surat->nama_tpb; ?></td>
              </tr>
              <tr>
                <td width="20%">Kegiatan</td>
                <td><?php echo $surat->ket_giat; ?></td>
              </tr>
              <tr>
                <td width="20%">Nilai Jaminan</td>
                <td><?php $angka = $surat->nilai; echo $this->fungsi->rupiah($angka);?></td>
              </tr>
              <tr>
                <td width="20%">Jatuh Tempo</td>
                <td><?php $tanggal = $surat->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
              </tr>
              <tr>
                <td width="20%">Status</td>
                <td>
                  <?php if($surat->status == '8'){
                    ?><p class="badge badge-warning">Jaminan belum diteliti oleh kasubsi</p>
                  <?php } elseif($surat->status == '9'){
                    ?><p class="badge badge-warning">Jaminan belum dikonfirmasi oleh Penjamin</p>
                  <?php } elseif($surat->status == '18'){
                    ?><p class="badge badge-warning">Penarikan belum diteliti oleh kasubsi</p>
                  <?php } elseif($surat->status == '19'){
                    ?><p class="badge badge-success">Penarikan Berhasil 
                  <?php } else {
                    ?><p class="badge badge-success">Pengajuan dalam proses </p>
                  <?php } ?>    
                </td>
              </tr>
            </table>
            <?php endforeach ;?>
          </div>
        </div>
      </div>
      <!-- Card Surat Persetujuan End --> 
      
      <!-- Card Jaminan Start --> 
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header card-header-text card-header-warning">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Detail Jaminan</h4>
            <?php foreach ($jaminan as $s): ?>
          </div>
          <div class="card-body table-responsive">
            <table class="table">
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
                          echo 'Jaminan Perusahaan';
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
            <?php } else { }?>
              <tr>
                <td width="20%">Nomor Jaminan</td>
                <td><?php echo $s->no_jaminan; ?></td>
              </tr>
              <tr>
                <td width="20%">Tanggal Jaminan</td>
                <td><?php if($s->tgl_jaminan = null) { echo "A"; } else { $tanggal = $s->tgl_jaminan; echo $this->fungsi->tgl_indo($tanggal);} ?></td>
              </tr>
            </table>
            <?php endforeach ;?>
          </div>
        </div>
      </div>

      <!-- Card Jaminan End -->
      
      <!-- Card Perben Start -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header card-header-text card-header-warning">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">Dokumen</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table">
              <?php foreach ($perben as $p): ?>
              <?php if($s->bentuk_jaminan == '1' ){ ?>
              <?php if($p->status >= '5'){ ?>
              <tr>
                <td width="20%">E-Jaminan</td>
                <td><a href="<?php echo site_url('createpdf/jaminan/'.$p->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak E-Jaminan"><i class="fa fa-print"></i></a></td>
              </tr>
              <?php } else{ }; ?>
              <?php } else{ }; ?>
              <tr>
                <?php if($p->status > '6'){
                    ?><td width="20%">E-TTSJ</td>
                <td><a href="<?php echo site_url('createpdf/ttsj/'.$p->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak E-TTSJ"><i class="fa fa-print"></i></a></td>                                  
                 <?php } ?>                                    
              </tr>
              <tr>
                <?php if($p->status >= 11){
                    ?><td width="20%">BPJ</td>
                      <td><a href="<?php echo site_url('createpdf/bpj/'.$p->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak BPJ"><i class="fa fa-print"></i></a></td>                                   
                 <?php } ?>                                    
              </tr>
              <tr>
                <?php if($p->status >= '19'){
                    ?><td width="20%">TTPJ</td>
                      <td><a href="<?php echo site_url('createpdf/ttpj/'.$p->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak TTPJ"><i class="fa fa-print"></i></a></td>                                   
                 <?php } ?>                                    
              </tr>
              <?php if($p->status >= '16'){ ?>
              <tr>
                <td width="20%">Laporan Realisasi</td>
                <td><a href="<?php echo site_url('createpdf/laporan/'.$p->id_surat)?>" target="_blank"class="btn-sm btn-success">Lihat Laporan</a></td>
              </tr>
              <?php } ?>
              <?php if($p->status == '21'){ ?>
              <tr>
                <td width="20%"><strong>E-Pencairan</strong></td>
                <td><a href="<?php echo site_url('createpdf/pencairan/'.$p->id_jaminan)?>" target="_blank" class="btn-sm btn-success">Cetak E-Pencairan</a></td>
              </tr>
              <?php } ?>
              
              <tr>
                <td width="20%">Status</td>
                <td>
                  <?php if($p->hardcopy == NULL){
                    ?><p class="badge badge-warning">Berkas Asli belum diterima</p>
                  <?php }else{
                    ?><p class="badge badge-success">Berkas Asli sudah diterima</p>
                  <?php } ?>
                </td>
              </tr>
              <?php endforeach ;?>
            </table>
          </div>
        </div>
      </div>
      <!-- Card Perben End -->
    </div>
  </div>
</div>


<div class="modal fade" id="revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php foreach($revisi as $r): ?>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Revisi Surat Persetujuan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                    <tbody>
                    <tr>
                        <td width="150">
                        Nomor Surat
                        </td>
                        <td>
                        :
                        </td>
                        <td>
                        S-<?php echo $r->no_rev; ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($r->tgl_rev)); echo $tahun ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                        Tanggal Surat
                        </td>
                        <td>
                        :
                        </td>
                        <td>
                        <?php $tanggal = $r->tgl_rev; echo $this->fungsi->tgl_indo($tanggal); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Nilai Jaminan 
                        </td>
                        <td>
                        :
                        </td>
                        <td>
                        <?php $angka = $r->nilai_rev; echo $this->fungsi->rupiah($angka);?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Jatuh Tempo 
                        </td>
                        <td>
                        :
                        </td>
                        <td>
                        <?php $tanggal = $r->jth_tempo_rev; echo $this->fungsi->tgl_indo($tanggal); ?>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>