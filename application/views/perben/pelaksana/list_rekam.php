<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>&nbsp List Jaminan</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
                <th>No</th>
                <th>Perusahaan</th>
                <th>No Surat Permohonan</th>
                <th>No Surat Persetujuan</th>                
                <th>Tgl Surat Persetujuan</th>
                <th>Kegiatan</th>
                <th>Jatuh Tempo</th>
                <th>Aksi</th>
            </thead>
            <tbody>
              <?php $i=1; foreach ($jaminan as $s): ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $s->nama_tpb; ?></td>
                <td><?php echo $s->no_permohonan; ?></td>
                <td><?php echo $s->no_surat ?></td>               
                <td><?php echo $s->tgl_surat; ?></td>
                <td><?php echo $s->ket_giat; ?></td>
                <td><?php echo $s->jth_tempo; ?></td>
                <td><a href="<?php echo site_url('perbenpelaksana/rekam_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>                          
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