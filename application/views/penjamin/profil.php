      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                  </div>
                  <h4 class="card-title">Edit Profil -
                    <small class="category"><?php echo $this->session->userdata('nama'); ?></small>
                  </h4>
                </div>
                <div class="card-body">
                  <?php foreach($profil as $p):?>
                  <?php echo form_open("penjamin/update_profil"); ?>
                  <input type="hidden" name="id_penjamin" value="<?php echo $p->id_penjamin; ?>">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Perusahaan</label>
                          <input type="text" class="form-control" name="nama_penjamin" value="<?php echo $p->nama_penjamin; ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">NPWP</label>
                          <input type="text" class="form-control" name="npwp_penjamin" value="<?php echo $p->npwp_penjamin; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" class="form-control" name="alamat_penjamin" value="<?php echo $p->alamat_penjamin; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telepon</label>
                          <input type="text" class="form-control" name="telepon" value="<?php echo $p->telepon; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Faksimili</label>
                          <input type="text" class="form-control" name="faksimili" value="<?php echo $p->faksimili; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" value="<?php echo $p->username; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control password" value="<?php echo $p->password; ?>">
                          <input type="checkbox" class="form-checkbox"> Show password
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  <?php echo form_close(); ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>

      <script src="<?php echo base_url('assets/kb/vendor/jquery/jquery.min.js'); ?>"></script>
      <script type="text/javascript">
           $(document).ready(function(){ 
           $('.form-checkbox').click(function(){
           if($(this).is(':checked')){
           $('.password').attr('type','text');
           }else{
           $('.password').attr('type','password');
           }
           });
           });
      </script>