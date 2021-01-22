      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <?php foreach($jaminan as $j): ?>
                  <h4 class="card-title ">Detail Jaminan</h4>
                  <p class="card-category">No. Surat : S-<?php echo $j->no_surat; ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?> / <?php $tanggal = $j->tgl_surat; echo $this->fungsi->tgl_indo($tanggal); ?>
                  <?php if($j->revisi =='1'){ ?>
                    <a href="" data-target="#revisi" data-toggle="modal" class="btn btn-sm btn-primary">Revisi</a> <?php } ?>
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                      </thead>
                      <tbody>
                        <tr>
                          <td width="200">
                            Nomor / Tgl Jaminan 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $j->no_jaminan; ?> / <?php $tanggal = $j->tgl_jaminan; echo $this->fungsi->tgl_indo($tanggal); ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Nama KB
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $j->nama_tpb; ?>
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
                            <?php $angka = $j->nilai; echo $this->fungsi->rupiah($angka);?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Jatuh Tempo Jaminan 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php $tanggal = $j->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Jenis Kegiatan
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $j->ket_giat ?>
                          </td>
                        </tr>
                        <tr>
                          <td rowspan="0">
                            Penanggung Jawab 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $j->nama_ttd; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            :
                          </td>
                          <td>
                            <?php echo $j->jabatan_ttd; ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             <?php endforeach; ?>
            </div>
          </div>
          <button onclick="goBack()" class="btn btn-danger">Go Back</button>
          <a href="<?php echo site_url('createpdf/cetak_jaminan/'.$j->id_surat)?>" target="_blank" class="btn btn-success">Cetak E-Jaminan</a>
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