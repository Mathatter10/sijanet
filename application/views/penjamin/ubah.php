      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <?php foreach($jaminan as $j): ?>
                  <h4 class="card-title ">Detail Jaminan</h4>
                  <p class="card-category">No. Surat : S-<?php echo $j->no_surat; ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?> / <?php $tanggal = $j->tgl_surat; echo $this->fungsi->tgl_indo($tanggal); ?></p>
                </div>
                <div class="card-body">
                  <form class="form-horizontal " method="post" action="<?php echo site_url('penjamin/ubah_act') ?>">
                      <input type="hidden" value="5" name="status">
                      <input type="hidden" value="<?php echo $j->id_jaminan ?>" name="id_jaminan">
                      <input type="hidden" value="<?php echo $j->id_surat ?>" name="id_surat">
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
                            <input type="text" class="form-control" placeholder="Nomor Jaminan" name="no_jaminan" value="<?php echo $j->no_jaminan; ?>" required="" >
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
                          <td>
                            Penanggung Jawab 
                          </td>
                          <td>
                            :
                          </td>
                          <td>
                            <input class="form-control" type="text" placeholder="Nama Penanggung Jawab" name="nama_ttd" required="" value="<?php echo $j->nama_ttd; ?>">
                            <span>*Nama Penanggung Jawab Yang Menandatangani</span>
                            <br>
                            <input class="form-control" type="text" placeholder="Jabatan Penanggung Jawab" name="jabatan_ttd" required=""  value="<?php echo $j->jabatan_ttd; ?>">
                            <span>*Jabatan Penanggung Jawab Yang Menandatangani</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <p align="center" style="color: red; font-size: 17"><b> Jaminan ini dibuat dengan sebenar-benarnya dan dapat dipertanggungjawabkan keasliannya <br/>  </b><input class="checkbox" type="checkbox" id="check" align="center"> </p> <br/>
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

      <script type="text/javascript">
        var checker = document.getElementById('check');
         var sendbtn = document.getElementById('btn');
         // when unchecked or checked, run the function
         checker.onchange = function(){
        if(this.checked){
            sendbtn.disabled = false;
        } else {
            sendbtn.disabled = true;
        }

        }
    </script>