      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php foreach($detail as $d): ?>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Detail Pengajuan</h4>
                  <p class="card-category">No. Surat : S-<?php echo $d->no_surat; ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($d->tgl_surat)); echo $tahun ?> </p>
                  <?php if($d->revisi =='1'){ ?>
                  <a href="" data-target="#revisi" data-toggle="modal" class="btn btn-sm btn-primary">Revisi</a> <?php } ?>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                      </thead>
                      <tbody>
                        <tr>
                          <td width="150">
                            Seksi Penerbit 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $d->keterangan; ?>
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
                            <?php echo $d->nilai; ?>
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
                            <?php echo $d->jth_tempo; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Perusahaan Tujuan 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $d->tujuan; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Bentuk Jaminan 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php $bentuk = $d->bentuk_jaminan;
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
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Status 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $d->keterangan_status ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php foreach($detail as $d): ?>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Dokumen Perbendaharaan </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                      </thead>
                      <tbody>
                          <tr>
                            <?php if($d->status >= 6){
                                ?><td width="20%">E-Jaminan</td>
                                  <td><a href="<?php echo site_url('createpdf/jaminan/'.$d->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak E-Jaminan"><i class="fa fa-print"></i></a></td>                                   
                             <?php } ?>                                    
                          </tr>
                          <tr>
                            <?php if($d->status >= 8){
                                ?><td width="20%">E-TTSJ</td>
                                  <td><a href="<?php echo site_url('createpdf/ttsj/'.$d->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak E-Jaminan"><i class="fa fa-print"></i></a></td>                                   
                             <?php } ?>                                    
                          </tr>
                        <tr>
                        <?php if($d->status >= 11){
                            ?><td width="20%">BPJ</td>
                              <td><a href="<?php echo site_url('createpdf/bpj/'.$d->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak BPJ"><i class="fa fa-print"></i></a></td>                                   
                         <?php } ?>                                    
                      </tr>
                      <tr>
                        <?php if($d->status >= '19'){
                            ?><td width="20%">TTPJ</td>
                              <td><a href="<?php echo site_url('createpdf/ttpj/'.$d->id_surat)?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Cetak TTPJ"><i class="fa fa-print"></i></a></td>                                   
                         <?php } ?>                                    
                      </tr>
                      <tr>
                        <?php if($d->status >= '16'){
                            ?><td width="20%">Laporan Realisasi</td>
                              <td><a href="<?php echo site_url('createpdf/laporan/'.$d->id_surat)?>" target="_blank"class="btn-sm btn-success">Lihat Laporan</a></td>                                   
                         <?php } ?>                                    
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
               <?php endforeach; ?>
            </div>
            <button onclick="goBack()" class="btn btn-danger">Go Back</button>
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
                          <td>
                            Nilai Jaminan 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $r->nilai_rev; ?>
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
                            <?php echo $r->jth_tempo_rev; ?>
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
      
     <script>
    function goBack() {
        window.history.back();
    }
    </script>