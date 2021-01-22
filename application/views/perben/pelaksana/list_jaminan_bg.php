<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>&nbsp List Jaminan Bank Garansi</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
              <tr>
                <th>Surat Persetujuan</th>
                <th>Perusahaan</th>
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
                <td><?php $angka = $s->nilai; echo $this->fungsi->rupiah($angka);?></td>
                <td><?php echo $s->keterangan_status; ?></td>
                <td>
                  <?php if($s->status == '7' || $s->status == '13'){
                    ?><a href="<?php echo site_url('perbenpelaksana/periksa_jaminan_bg/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Periksa Jaminan"><i class="fa fa-search"></i></a>
                  <?php } elseif($s->status < '10'){
                    ?><a href="<?php echo site_url('perbenpelaksana/detail_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></i></a>
                    <p>
                  <?php } elseif($s->status == '11'){
                    ?><a href="<?php echo site_url('perbenpelaksana/detail_jaminan/'.$s->id_surat); ?>" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-eye"></i></i></a>
                    <p>
                       <?php } else { ?>
                       <?php } ?>
                    </p>
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