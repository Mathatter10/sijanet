<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>&nbsp List User Pegawai</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Unit</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Unit</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $no=1; foreach($userbc as $u): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $u->nama_bc ?></td>
                    <td><?php echo $u->nip ?></td>
                    <td><?php $unit = $u->unit;
                        switch ($unit) {
                            case '1':
                                echo "Pelayanan Kepabeanan dan Cukai";
                                break;
                            case '2':
                                echo "Perbendaharaan";
                                break;
                        }
                         ?></td>
                    <td><?php $level = $u->level;
                        switch ($level) {
                            case '1':
                                echo "Kepala Seksi Pelayanan Kepabeanan dan Cukai";
                                break;
                            case '2':
                                echo "Kepala Subseksi Hanggar Pabean dan Cukai";
                                break;
                            case '3':
                                echo "Pelaksana";
                                break;    
                        }
                         ?></td>
                    <td>
                        <a href="<?php echo site_url('superuser/editbc/'.$u->id_bc)?>" class="btn btn-circle btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo site_url('superuser/deletebc/'.$u->id_bc)?>" class="btn btn-circle btn-danger"><i class="fa fa-trash-o"></i></a>
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