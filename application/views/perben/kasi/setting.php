<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-icon card-header-rose"> 
                  <div class="card-icon">
                    <i class="material-icons">perm_identity</i>
                  </div>
                  <h4 class="card-title">Edit Profile -
                    <small class="category">Complete your profile</small>
                  </h4>
                </div>
                <div class="card-body">
                  <form>
                    <?php foreach ($jaminan as $s): ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">NIP</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('nip'); ?>" disabled="disabled">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jabatan</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('jabatan'); ?>" disabled="disabled">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('username'); ?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="text" class="form-control" value="<?php echo $s->password; ?>">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                    <?php endforeach; ?>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card card-profile">
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="card-avatar"></div>
                  <div class="fileinput-new thumbnail img-circle">
                    <img src="<?php echo base_url().'assets/assets/img/placeholder.jpg'; ?>">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                  <div>
                    <span class="btn btn-round btn-rose btn-file">
                      <span class="fileinput-new">Add Photo</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="..." />
                    </span>
                    <br />
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                  </div>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?php echo $this->session->userdata('jabatan'); ?></h6>
                  <h4 class="card-title"><?php echo $this->session->userdata('nama'); ?></h4>
                  <h6 class="card-title"><?php echo $this->session->userdata('nip'); ?></h6>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>