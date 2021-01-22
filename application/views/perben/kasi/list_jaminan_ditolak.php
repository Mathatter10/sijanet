<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">assignment_turned_in</i>&nbsp List Jaminan Ditolak</h4>
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
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Surat Persetujuan</th>
                <th>Perusahaan</th>
                <th>Penjamin</th>
                <th>Nomor Jaminan</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($izin as $s): ?>
              <tr>
                <td><?php echo $s->no_surat; ?></td>
                <td><?php echo $s->tgl_surat; ?></td>
                <td><?php echo $s->pkc; ?></td>
                <td><?php echo $s->no_jaminan; ?></td>
                <td><a href="<?php echo site_url('perbenkasi/jaminan_ditolak/'.$s->id_surat) ?>" data-toggle="tooltip" data-placement="top" class="tip-bottom" data-original-title="Lihat" ><i class="fa fa-eye"></i></a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>