      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Laporan</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="sampleTable" class="display" style="width:100%">
                      <thead class=" text-primary" align="center">
                        <th data-sortable="true">No</th>
                        <th data-sortable="true">Surat Persetujuan</th>
                        <th data-sortable="true">Nilai Jaminan</th>
                        <th data-sortable="true">Penjamin</th>
                        <th data-sortable="true">Nomor Jaminan</th>
                        <th data-sortable="true">Tanggal Jaminan</th>
                        <th data-sortable="true">Nomor e-BPJ</th>
                        <th data-sortable="true">Tanggal e-BPJ</th>
                        <th data-sortable="true">Tanggal Jatuh Tempo</th>
                        <th data-sortable="true">Status</th>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($laporan as $s): ?>
                        <tr>
                          <td align="center"><?php echo $no++; ?></td>
                          <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($s->tgl_surat)); echo $tahun ?></td>
                          <td><?php echo $s->nilai; ?></td>
                          <td><?php echo $s->nama_penjamin; ?></td>
                          <td><?php echo $s->no_jaminan; ?></td>
                          <td><?php echo $s->tgl_jaminan ?></td>
                          <td><?php echo $s->nomor_bpj ?></td>
                          <td><?php echo $s->tanggal_bpj ?></td>
                          <td><?php echo $s->jth_tempo ?></td>
                          <td><?php echo $s->keterangan_status ?></td>                        
                        <?php endforeach; ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


  