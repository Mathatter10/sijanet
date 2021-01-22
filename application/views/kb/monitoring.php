      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Monitoring Jaminan</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="display" style="width:100%">
                      <thead class=" text-primary">
                        <th data-sortable="true">No.</th>
                        <th data-sortable="true">No. Surat</th>
                        <th data-sortable="true"> Tanggal Surat </th>
                        <th data-sortable="true">Jenis Kegiatan</th>
                        <th data-sortable="true"> Perusahaan Tujuan</th>
                        <th data-sortable="true">Jatuh Tempo</th>
                        <th data-sortable="true"> Status</th>
                        <th data-sortable="true">Sisa Hari</th>
                        <th data-sortable="true">Aksi</th>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($izin as $i): ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td>S-<?php echo $i->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($i->tgl_surat)); echo $tahun ?></td>
                            <td align="center"><?php $tanggal = $i->tgl_surat; echo $this->fungsi->tgl_indo($tanggal); ?></td>
                            <td><?php echo $i->ket_giat ?></td>                      
                            <td><?php echo $i->tujuan ?></td>
                            <td align="center"><?php $tanggal = $i->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
                            <td><?php echo $i->keterangan_status ?></td>              
                            <td align="center"><?php
                                        $jthtempo = strtotime($i->jth_tempo);
                                        $tglsekarang = strtotime(date('Y-m-d'));
                                        $interval = $jthtempo - $tglsekarang;
                                        $beda = round($interval / (60 * 60 * 24));
                                        $a = $beda;
                                       if($i->status == '19'){
                                          echo "<div class='badge badge-primary'><strong>SELESAI :)</strong></div>" ;
                                        } else{
                                        if($interval > 0){
                                            if($beda <7){
                                              echo "<div class='badge badge-warning'><strong>Jatuh Tempo Kurang $a hari</strong></div>" ;
                                            } else {
                                              echo "<div class='badge badge-success'><strong>Jatuh Tempo Masih $a hari</strong></div>" ;
                                            }
                                        } else {
                                          echo "<div class='badge badge-danger'> <strong>BATAS AKHIR PEMASUKAN BARANG </strong></div>";
                                        }
                                      }
                                        
                                        ?>
                                  </td>
                              <td>
                                  <a href="<?php echo site_url('kawasanberikat/detail/'.$i->id_surat); ?>" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="material-icons">info</i></a>
                              </td>    
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


  