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
                        <th>
                          No.
                        </th>
                        <th>
                          No. Surat
                        </th>
                        <th>
                          Tanggal Surat
                        </th>
                        <th>
                          Jenis Kegiatan
                        </th>
                        <th>
                          Nilai Jaminan
                        </th>
                        <th>
                          Jatuh Tempo
                        </th>
                        <th>
                          Status 
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <tbody>
                          <?php $no=1;foreach ($jaminan as $j): ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                                    <td>S-<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?></td>
                                    <td align="center"><?php $tanggal = $j->tgl_surat; echo $this->fungsi->tgl_indo($tanggal); ?></td>
                                    <td><?php echo $j->ket_giat ?></td>
                                    <td><?php $angka = $j->nilai; echo $this->fungsi->rupiah($angka);?></td>
                                    <td align="center"><?php $tanggal = $j->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
                                    <td><?php echo $j->keterangan_status ?></td>
                            <td align="center">
                              <a href="<?php echo site_url('kawasanberikat/detail/'.$j->id_surat); ?>" class="btn-sm btn-info btn-circle" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-info-circle"></i></a>
                              <?php if($j->status == '11'){ ?>
                              <a href="<?php echo site_url('kawasanberikat/real/'.$j->id_surat) ?>" class="btn-sm btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="Input Realisasi"><i class="fa fa-edit"></i></a> 
                            <?php } else {
                              
                            }?>                                                  
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