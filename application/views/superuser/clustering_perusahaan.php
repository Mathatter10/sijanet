<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>&nbsp Clustering Perusahaan</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>PKC</th>
                    <th>Kepala Seksi</th>
                    <th>Kepala Subseksi Hanggar</th>
                    <th>Nama Perusahaan</th>
                    <th>Id Telegram Perusahaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>PKC</th>
                    <th>Kepala Seksi</th>
                    <th>Kepala Subseksi Hanggar</th>
                    <th>Nama Perusahaan</th>
                    <th>Id Telegram Perusahaan</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
              <?php $no=1; foreach($cluster as $u): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $u->pkc ?></td>
                    <td><?php echo $u->nama_kasi ?></td>
                    <td><?php echo $u->nama_bc ?></td>
                    <td><?php echo $u->nama_tpb ?></td>
                    <td><?php echo $u->telegram_id ?></td>
                    <td>
                        <a href="<?php echo site_url('superuser/edit_cluster_perusahaan/'.$u->id_detail)?>" class="btn btn-circle btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo site_url('superuser/delete/'.$u->id_tpb)?>" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>