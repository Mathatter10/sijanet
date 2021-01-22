<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>Pencarian</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
            <form method="get" action="<?php echo base_url('perbenkasubsi/pencarian')?>">
            <div class="col-md-3 col-sm-2 col-xs-2" align="center">Jenis Jaminan
                <select class="selectpicker" data-live-search="true" name="status">
  					<option value="customs_bond">Customs Bond</option>
  					<option value="tunai">Tunai</option>
  					<option value="bank_garansi">Bank Garansi</option>
  					<option value="jam_per">Jaminan Perusahaan</option>
  					<option value="jam_la">Jaminan Lainnya</option>
                </select>
            </div>    
            <div class="col-md-3 col-sm-2 col-xs-2" align="center">Nama Penjamin
                <select class="selectpicker" data-live-search="true" name="penjamin">
                    <option>Penerbitan Jaminan</option>
                    <?php
    					foreach ($penjamin as $p) {
    						?>
      				<option value="<?php echo $p->id_penjamin ?>"><?php echo $p->nama_penjamin ?></option>
      			    <?php
    					}
    				?>
                </select>
            </div>
            <div class="col-md-3 col-sm-2 col-xs-2" align="center">Nama Perusahaan TPB
                <select class="selectpicker" data-live-search="true" name="status">
                    <?php
    					foreach ($tpb as $tpb) {
    						?>
      				<option value="<?php echo $tpb->id_tpb ?>"><?php echo $tpb->nama_tpb ?></option>
      			    <?php
    					}
    				?>
                </select>
            </div>
            <div class="col-md-3 col-sm-2 col-xs-2" align="center">Status
                <select class="selectpicker" data-live-search="true" name="status">
                    <?php
    					foreach ($status as $status) {
    						?>
      				<option value="<?php echo $status->status ?>"><?php echo $status->keterangan_status ?></option>
      			    <?php
    					}
    				?>
                </select>
            </div>
            <div class="col-md-3 col-sm-2 col-xs-2" align="center">Jenis Kegiatan
                <select class="selectpicker" data-live-search="true" name="status">
                    <?php
    					foreach ($kegiatan as $kegiatan) {
    						?>
      				<option value="<?php echo $kegiatan->id ?>"><?php echo $kegiatan->ket_giat ?></option>
      			    <?php
    					}
    				?>
                </select>
            </div>
            <br><input type="submit" class="btn btn-primary" value="Cari">
        </form>
      </div>
    </div>
    
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">list</i>&nbsp List Jatuh Tempo Jaminan</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
                <th>No</th>
                <th>Surat Persetujuan</th>
                <th>Perusahaan</th>
                <th>Penjamin</th>
                <th>Nomor Jaminan</th>
                <th>Nomor e-BPJ</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no=1; foreach ($izin as $s): ?>
              <tr>
                <td align="center"><?php echo $no++; ?></td>
                <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($s->tgl_surat)); echo $tahun ?>
                    <?php if($s->revisi =='1'){ ?>
                  <p class="badge badge-primary">Revisi</p> <?php } ?></td>
                <td><?php echo $s->nama_tpb; ?></td>
                <td><?php echo $s->nama_penjamin; ?></td>
                <td><?php echo $s->no_jaminan; ?></td>
                <td><?php echo $s->nomor_bpj; ?>/eBPJ/CB/<?php echo date('Y')?></td>
                <td><?php $tanggal = $s->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
                <td><?php echo $s->keterangan_status; ?></td>
                <td><?php
                      $jthtempo = strtotime($s->jth_tempo);
                      $tglsekarang = strtotime(date('Y-m-d'));
                      $interval = $jthtempo - $tglsekarang;
                      $beda = round($interval / (60 * 60 * 24));
                      $a = $beda;
                      if($s->status == '19'){
                        echo "<div class='badge badge-primary'><strong>SELESAI :)</strong></div>" ;
                      } else{
                      if($interval >= 0){
                          if($beda <7){
                            echo "<div class='badge badge-warning'><strong>Jatuh Tempo Kurang $a hari</strong></div>" ;
                          } else {
                            echo "<div class='badge badge-success'><strong>Jatuh Tempo Masih $a hari</strong></div>" ;
                          }
                      } else {
                        echo "<div class='badge badge-danger'> <strong>BATAS AKHIR PEMASUKAN BARANG </strong></div>";
                      }
                    }
                      
                      ?>
                </td>
                <td>
                  <a href="<?php echo site_url('perbenkasubsi/detail_jaminan/'.$s->id_surat); ?>" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="material-icons">info</i></a>
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