<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">content_copy</i>
            </div>
            <p class="card-category">Jumlah User Pegawai</p>
            <h3 class="card-title">
              <b><?php 
                    $perizinan = $this->db->query("SELECT * FROM bcuser");
                    echo $perizinan->num_rows();
                  ?>
            </b>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="<?php echo base_url() . 'index.php/superuser/databc'; ?>">More info...</a>
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
            <p class="card-category">Jumlah User Perusahaan</p>
            <h3 class="card-title">
              <b><?php 
                    $perizinan = $this->db->query("SELECT * FROM tpbuser");
                    echo $perizinan->num_rows();
                  ?>
            </b>
            </h3>

          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="<?php echo base_url() . 'index.php/superuser/datatpb'; ?>">More info...</a>
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
            <p class="card-category">Jumlah User Penjamin</p>
            <h3 class="card-title">
              <b><?php 
                    $perizinan = $this->db->query("SELECT * FROM penjaminuser");
                    echo $perizinan->num_rows();
                  ?>
            </b>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="<?php echo base_url() . 'index.php/superuser/datapenjamin'; ?>">More info...</a>
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
            <p class="card-category">Jumlah Tools</p>
            <h3 class="card-title">
              <b><?php 
                    $perizinan = $this->db->query("SELECT * FROM tools");
                    echo $perizinan->num_rows();
                  ?>
            </b>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <a href="<?php echo base_url() . 'index.php/superuser/list_jaminan_ln'; ?>">More info...</a>
            </div>
          </div>
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
