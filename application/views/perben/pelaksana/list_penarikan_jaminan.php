<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>&nbsp List Penarikan Jaminan</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
              <tr>
                <th>Surat Persetujuan</th>
                <th>Perusahaan</th>
                <th>Penjamin</th>
                <th>Nomor Jaminan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($jaminan as $s): ?>
              <tr>
                <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($s->tgl_surat)); echo $tahun ?></td>
                <td><?php echo $s->nama_tpb; ?></td>
                <td><?php echo $s->nama_penjamin; ?></td>
                <td><?php echo $s->no_jaminan; ?></td>
                <td><?php echo $s->keterangan_status; ?></td>
                <td>
                  <?php if($s->status == '11'){
                    ?><a href="<?php echo site_url('perbenpelaksana/detail_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></i></a>
                  <?php } elseif($s->status == '16'){
                    ?><a href="<?php echo site_url('perbenpelaksana/periksa_penarikan_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Periksa Penarikan"><i class="fa fa-search"></i></i></a>
                  <?php } elseif($s->status == '18'){
                        ?><a href="<?php echo site_url('perbenpelaksana/detail_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></i></a>
                  <?php } elseif($s->status == '19'){
                    ?><a href="<?php echo site_url('perbenpelaksana/detail_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Detail Jaminan"><i class="fa fa-eye"></i></i></a>
                  <?php } ?>
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