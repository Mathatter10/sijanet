<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">assignment_turned_in</i>&nbsp List Jaminan Customs Bond</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Surat Persetujuan</th>
                <th>Perusahaan</th>
                <th>Penjamin</th>
                <th>Nomor Jaminan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Surat Persetujuan</th>
                <th>Perusahaan</th>
                <th>Penjamin</th>
                <th>Nomor Jaminan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
              <?php $a=1; foreach ($jaminan as $s):; ?>
                
              <tr>
                <td><?php echo $a++; ?></td>
                <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($s->tgl_surat)); echo $tahun ?></td>
                <td><?php echo $s->nama_tpb; ?></td>
                <td><?php echo $s->nama_penjamin; ?></td>
                <td><?php echo $s->no_jaminan; ?></td>
                <td><?php echo $s->keterangan_status; ?></td>
                <td>
                  <?php if($s->status == '6' || $s->status == '7' || $s->status == '9' || $s->status == '11' || $s->status == '16' || $s->status >= '18' || $s->status >= '19'){
                    ?><a href="<?php echo site_url('perbenkasubsi/detail_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
                  <?php } elseif($s->status == '8'){
                    ?><a href="<?php echo site_url('perbenkasubsi/penelitian_jaminan_cb/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Teliti Jaminan"><i class="fa fa-search"></i></a>
                  <?php } elseif($s->status == '9'){
                    ?><a href="<?php echo site_url('perbenkasubsi/detail_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
                  <?php } elseif($s->status == '10'){
                    ?><a href="<?php echo site_url('perbenkasubsi/penelitian_jaminan_cb/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Penerbitan E-BPJ"><i class="fa fa-paper-plane"></i></a>
                  <?php } else {

                  }  ?>
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