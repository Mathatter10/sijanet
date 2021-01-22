<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="page-categories">
          <h3 class="title text-center">Menu Rekam Tools</h3>
          <br />
          <ul class="nav nav-pills nav-pills-success nav-pills-icons justify-content-center" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#link7" role="tablist">
                <i class="material-icons">info</i> Pengumuman
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
                <i class="material-icons">gavel</i> Peraturan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#link10" role="tablist">
                <i class="material-icons">help_outline</i> FAQ
              </a>
            </li>
          </ul>

          <div class="tab-content tab-space tab-subcategories">
            <div class="tab-pane active" id="link7">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">PENGUMUMAN</h4>
                  <p class="card-category">
                    More information here
                  </p>
                </div>
                <div class="card-body">
                  <button class="btn btn-info btn-round" data-toggle="modal" data-target="#input"><i class="material-icons">post_add</i></button>
                  <div class="modal fade modal-mini modal-primary" id="input" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notice">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel">Silahkan Input Pengumuman Baru</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">close</i>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo site_url('perbenpelaksana/tambah_tools_pengumuman')?>" method="post">
                            <input type="hidden" name="jenis_tools" value="1" />
                            <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d') ?>"/>
                            <input type="hidden" name="user" value="<?php echo $this->session->userdata('nama') ?>"/>
                            <div class="form-group">
                              <label>Judul</label>
                              <input class="form-control" type="text" name="judul">
                            </div>
                            <div>
                              <label>Isi</label>
                              <textarea class="form-control" type="text" name="isi" class="form-control" placeholder="" required="required"></textarea>
                            </div>
                            <div class="tile-footer">
                              <button class="btn btn-success" type="submit"  ><i class="fa fa-fw fa-lg fa-save"></i>Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pengumuman</th>
                        <th>Isi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Pengumuman</th>
                        <th>Isi</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $no=1; foreach ($pengumuman as $p) : ?>
                      <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo $p->judul; ?></td>
                        <td><?php echo $p->isi; ?></td>
                        <td><a href="<?php echo ('hapus_tools/' . $p->id_tools); ?>"><i class="fa fa-fw fa-lg fa-trash"></i></a></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="link9">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">PERATURAN</h4>
                  <p class="card-category">
                    More information here
                  </p>
                </div>
                <div class="card-body">
                  <button class="btn btn-warning btn-round" data-toggle="modal" data-target="#input2"><i class="material-icons">post_add</i></button>
                  <div class="modal fade modal-mini modal-primary" id="input2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notice">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel">Silahkan Input Peraturan Baru</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">close</i>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo site_url('perbenpelaksana/tambah_tools_peraturan')?>" method="post">
                            <input type="hidden" name="jenis_tools" value="2" />
                            <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d') ?>"/>
                            <input type="hidden" name="user" value="<?php echo $this->session->userdata('nama') ?>"/>
                            <div class="form-group">
                              <label>Judul</label>
                              <input type="text" class="form-control" name="judul"  required="required">
                            </div>
                            <div>
                              <label>Isi</label>
                              <input type="text" id="nilai" name="isi" class="form-control" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                              <label>Link</label>
                              <input type="text" class="form-control" name="link"  required="required">
                            </div>
                            <div class="tile-footer">
                              <button class="btn btn-success" type="submit"  ><i class="fa fa-fw fa-lg fa-save"></i>Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <table id="datatables2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Peraturan</th>
                        <th>Dokumen</th>
                        <th>Link</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Peraturan</th>
                        <th>Dokumen</th>
                        <th>Link</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $no=1; foreach ($peraturan as $p) : ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $p->judul; ?></td>
                        <td><?php echo $p->isi; ?></td>
                        <td><a href="<?php echo $p->link; ?>" target="_blank">Link</a></td>
                        <td><a href="<?php echo ('hapus_tools/' . $p->id_tools); ?>"><i class="fa fa-fw fa-lg fa-trash"></i></a></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="link10">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">FAQ</h4>
                  <p class="card-category">
                    More information here
                  </p>
                </div>
                <div class="card-body">
                <button class="btn btn-rose btn-round" data-toggle="modal" data-target="#input3"><i class="material-icons">post_add</i></button>
                  <div class="modal fade modal-mini modal-primary" id="input3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-notice">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel">Silahkan Input FAQ Baru</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">close</i>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo site_url('perbenpelaksana/tambah_tools_faq')?>" method="post">
                            <input type="hidden" name="jenis_tools" value="3" />
                            <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d') ?>"/>
                            <input type="hidden" name="user" value="<?php echo $this->session->userdata('nama') ?>"/>
                            <div class="form-group">
                              <label>Judul</label>
                              <input type="text" class="form-control" name="judul" required="required">
                            </div>
                            <div>
                              <label>Isi</label>
                              <textarea type="text" id="nilai" name="isi" class="form-control" placeholder="" required="required"></textarea>
                            </div>
                            <div class="tile-footer">
                              <button class="btn btn-success" type="submit"  ><i class="fa fa-fw fa-lg fa-save"></i>Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                 <table id="datatables3" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $no=1; foreach ($faq as $p) : ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $p->judul; ?></td>
                        <td>
                          <div class="row">
                            <div class="col-md-12 text-center">
                              <a data-toggle="modal" data-target="#detail" data-placement="top" title="Detail" style="float: left;"><i class="fa fa-eye"></i></a>
                              <!-- Classic Modal -->
                              <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Detail</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        <i class="material-icons">clear</i>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p><?php echo $p->isi; ?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td><a href="<?php echo ('hapus_tools/' . $p->id_tools); ?>"><i class="fa fa-fw fa-lg fa-trash"></i></a></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>