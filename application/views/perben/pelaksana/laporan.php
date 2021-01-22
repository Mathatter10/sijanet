<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>&nbsp Laporan</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="sampleTable" class="display" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead class=" text-primary" align="center">
              <th data-sortable="true">No</th>
              <th data-sortable="true">Perusahaan</th>
              <th data-sortable="true">Surat Persetujuan</th>
              <th data-sortable="true">Tanggal Surat Persetujuan</th>
              <th data-sortable="true">Nilai</th>
              <th data-sortable="true">Bentuk Jaminan</th>
              <th data-sortable="true">Jenis Kegiatan</th>
              <th data-sortable="true">Asuransi</th>
              <th data-sortable="true">Nomor Customs Bond</th>
              <th data-sortable="true">Tanggal Customs Bond</th>
              <th data-sortable="true">Nomor e-BPJ</th>
              <th data-sortable="true">Tanggal e-BPJ</th>
              <th data-sortable="true">Nomor TTPJ</th>
              <th data-sortable="true">Tanggal TTPJ</th>
              <th data-sortable="true">Jatuh Tempo</th>
              <th data-sortable="true">Status</th>
            </thead>
            <tbody>
              <?php $no=1; foreach ($laporan as $s): ?>
              <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td><?php echo $s->nama_tpb; ?></td>
                <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($s->tgl_surat)); echo $tahun ?></td>
                <td><?php echo $s->tgl_surat; ?></td>
                <td><?php echo $s->nilai; ?></td>
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
                <td><?php echo $s->ket_giat; ?></td> 
                <td><?php echo $s->nama_penjamin; ?></td>
                <td><?php echo $s->no_jaminan; ?></td>
                <td><?php echo $s->tgl_jaminan ?></td>
                <td><?php echo $s->nomor_bpj ?></td>
                <td><?php echo $s->tanggal_bpj ?></td>
                <td><?php echo $s->nomor_ttpj ?></td>
                <td><?php echo $s->tanggal_ttpj ?></td>
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