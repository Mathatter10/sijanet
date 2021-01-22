      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <?php foreach ($jaminan as $j) : ?>
                    <h4 class="card-title ">Detail Jaminan</h4>
                    <p class="card-category">No. Surat : S-<?php echo $j->no_surat; ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?> / <?php $tanggal = $j->tgl_surat;                                                    echo $this->fungsi->tgl_indo($tanggal); ?></p>
                    <?php if($j->revisi =='1'){ ?>
                    <a href="" data-target="#revisi" data-toggle="modal" class="btn btn-sm btn-primary">Revisi</a> <?php } ?>
                    <div class='badge badge-danger'><?php echo $this->session->flashdata('message'); ?></div>
                </div>
                <div class="card-body">
                  <form class="form-horizontal " method="post" action="<?php echo site_url('penjamin/input') ?>">
                    <input type="hidden" value="5" name="status">
                    <input type="hidden" value="<?php echo $j->id_jaminan ?>" name="id_jaminan">
                    <input type="hidden" value="<?php echo $j->id_surat ?>" name="id_surat">
                    <input type="hidden" value="<?php echo date('Y-m-d') ?>" name="tanggal">
                    <input type="hidden" name="telegram_id" value="<?php echo $j->telegram_id ?>" placeholder="Telegram ID">
                    <input type="hidden" name="message_text" id="n2" placeholder="Custom Text Message">
                    <input type="hidden" name="no_surat" value="S-<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date('Y'); ?>">
                    <input type="hidden" name="penjamin" value="<?php echo $this->session->userdata('nama') ?>">

                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                        </thead>
                        <tbody>
                          <tr>
                            <td width="200">
                              Nomor Jaminan
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <input type="text" class="form-control" id="n1" onkeyup="sync()" placeholder="Nomor Jaminan" autocomplete="off" name="no_jaminan" required="">
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
                          <?php if($j->revisi == '1'){ foreach($revisi as $r): ?>
                          <tr>
                            <td>
                              Nilai Jaminan
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?php $angka = $r->nilai;
                                echo $this->fungsi->rupiah($angka); ?>
                            </td>
                          </tr>
                          <?php endforeach; } else { ?>
                          <tr>
                            <td>
                              Nilai Jaminan
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?php $angka = $j->nilai;
                                echo $this->fungsi->rupiah($angka); ?>
                            </td>
                          </tr><?php } ?>
                          <tr>
                            <td>
                              Jatuh Tempo Jaminan
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?php $tanggal = $j->jth_tempo;
                                echo $this->fungsi->tgl_indo($tanggal); ?>
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
                            <td>
                              Penanggung Jawab
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <input class="form-control" type="text" placeholder="Nama Penanggung Jawab" name="nama_ttd" required="" value="">
                              <span>*Nama Penanggung Jawab Yang Menandatangani</span>
                              <br>
                              <input class="form-control" type="text" placeholder="Jabatan Penanggung Jawab" name="jabatan_ttd" required="" value="">
                              <span>*Jabatan Penanggung Jawab Yang Menandatangani</span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-12">
                        <p align="center" style="color: red; font-size: 17"><b> Jaminan ini dibuat dengan sebenar-benarnya dan dapat dipertanggungjawabkan keasliannya <br /> </b><input class="checkbox" type="checkbox" id="check" align="center"> </p> <br />
                      </div>
                      <div class="col-lg-12" align="center">
                        <button type="submit" class="btn btn-primary" id="btn" disabled="">Setuju</button> | <a href="" data-target="#tolak" data-toggle="modal" class="btn btn-danger">Tolak</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
          </div>
          <button onclick="goBack()" class="btn btn-danger">Go Back</button>
        </div>
      </div>

      <div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alasan Penolakan</h5>
            </div>
            <div class="modal-body">
              <?php echo form_open_multipart('penjamin/tolak_jaminan'); ?>
              <input type="hidden" name="id_jaminan" value="<?php echo $j->id_jaminan ?>">
              <input type="hidden" name="id_surat" value="<?php echo $j->id_surat ?>">
              <input type="hidden" value="20" name="status">
              <textarea class="form-control" required="" placeholder="Alasan Penolakan"></textarea>
              <br>
              <input class="btn btn-danger" type="submit" name="tolak" value="Tolak" />
              <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
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
                            <?php echo $r->tgl_rev; ?>
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
                            <?php $angka = $r->nilai_rev;
                                echo $this->fungsi->rupiah($angka); ?>
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
      <script type="text/javascript">
        function sync() {
          var n1 = document.getElementById('n1');
          var n2 = document.getElementById('n2');
          n2.value = n1.value;
        }
      </script>