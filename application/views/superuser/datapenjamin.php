<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>&nbsp List User Penjamin</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPWP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPWP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $no=1; foreach($userpenjamin as $u): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $u->nama_penjamin ?></td>
                    <td><?php echo $u->npwp_penjamin ?></td>
                    <td><?php echo $u->alamat_penjamin ?></td>
                    <td>
                        <a href="<?php echo site_url('superuser/editpenjamin/'.$u->id_penjamin)?>" class="btn btn-circle btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo site_url('superuser/deletepenjamin/'.$u->id_penjamin)?>" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a>
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