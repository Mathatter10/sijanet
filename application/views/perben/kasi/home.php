<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">content_copy</i>
            </div>
            <p class="card-category">Jaminan Customs Bond</p>
            <h3 class="card-title">
              <b><?php 
                    $perizinan = $this->db->query("SELECT * FROM data_jaminan
                                                    WHERE bentuk_jaminan = '1' 
                                                  ");
                    echo $perizinan->num_rows();
                  ?>
            </b>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="<?php echo base_url() . 'index.php/perbenkasi/list_jaminan_cb'; ?>">More info...</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">store</i>
            </div>
            <p class="card-category">Jaminan Tunai</p>
            <h3 class="card-title">
              <b><?php 
                    $perizinan = $this->db->query("SELECT * FROM data_jaminan
                                                    WHERE bentuk_jaminan = '2' 
                                                  ");
                    echo $perizinan->num_rows();
                  ?>
            </b>
            </h3>

          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="<?php echo base_url() . 'index.php/perbenkasi/list_jaminan_tn'; ?>">More info...</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Jaminan Bank Garansi</p>
            <h3 class="card-title">
              <b><?php 
                    $perizinan = $this->db->query("SELECT * FROM data_jaminan
                                                    WHERE bentuk_jaminan = '3' 
                                                  ");
                    echo $perizinan->num_rows();
                  ?>
            </b>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="<?php echo base_url() . 'index.php/perbenkasi/list_jaminan_bg'; ?>">More info...</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-twitter"></i>
            </div>
            <p class="card-category">Jaminan Lainnya</p>
            <h3 class="card-title">
              <b><?php 
                    $perizinan = $this->db->query("SELECT * FROM data_jaminan
                                                    WHERE bentuk_jaminan = '5' 
                                                  ");
                    echo $perizinan->num_rows();
                  ?>
            </b>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="<?php echo base_url() . 'index.php/perbenkasi/list_jaminan_ln'; ?>">More info...</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">assignment_turned_in</i>&nbsp Penyerahan asli Jaminan</h4>
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
                <th>Tanggal Jaminan</th>
                <th>Nomor e-BPJ</th>
                <th>E-Jaminan</th>
                <th>Status</th>
                <th>Hardcopy</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Surat Persetujuan</th>
                <th>Perusahaan</th>
                <th>Penjamin</th>
                <th>Tanggal Jaminan</th>
                <th>Nomor e-BPJ</th>
                <th>E-Jaminan</th>
                <th>Status</th>
                <th>Hardcopy</th>
              </tr>
            </tfoot>
            <tbody>
              <?php $no=1; foreach ($jaminan as $s): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/2019</td>
                <td><?php echo $s->nama_tpb; ?></td>
                <td><?php echo $s->nama_penjamin; ?></td>
                <td><?php $tanggal = $s->tanggal_bpj; echo $this->fungsi->tgl_indo($tanggal); ?></td>
                <td><?php echo $s->nomor_bpj; ?>/eBPJ/CB/<?php echo date('Y')?></td>
                <td><a href="<?php echo site_url('createpdf/jaminan/'.$s->id_jaminan)?>" target="_blank" data-toggle="tooltip" data-placement="top">Lihat e-jaminan</a></td>
                <td><?php echo $s->keterangan_status; ?></td>
                <td><p class="badge badge-warning">Berkas Asli belum diterima</p></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card card-chart">
          <div class="card-header card-header-success">
            <div class="ct-chart" id="dailySalesChart"></div>
          </div>
          <div class="card-body">
            <h4 class="card-title">Daily Sales</h4>
            <p class="card-category">
              <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i> updated 4 minutes ago
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-chart">
          <div class="card-header card-header-warning">
            <div class="ct-chart" id="websiteViewsChart"></div>
          </div>
          <div class="card-body">
            <h4 class="card-title">Email Subscriptions</h4>
            <p class="card-category">Last Campaign Performance</p>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i> campaign sent 2 days ago
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-chart">
          <div class="card-header card-header-danger">
            <div class="ct-chart" id="completedTasksChart"></div>
          </div>
          <div class="card-body">
            <h4 class="card-title">Completed Tasks</h4>
            <p class="card-category">Last Campaign Performance</p>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i> campaign sent 2 days ago
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>