      <div class="content">
        <div class="container-fluid">
          <!-- Kotak - Kotak 4 Start -->
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">call_received</i>
                  </div>
                  <p class="card-category">Data Pengajuan</p>
                  <?php 

                  $a = $this->session->userdata('id');
                  $pengajuan = $this->db->query("SELECT * FROM data_izin as A 
                                                  JOIN data_status as B 
                                                  ON A.id_surat = B.id_surat
                                                  JOIN data_jaminan as C 
                                                  ON A.id_surat = C.id_surat
                                                  WHERE C.id_penjamin = $a 
                                                  AND B.status = '4'
                                                ")
                        ?>
                  <h3 class="card-title"><?php echo $pengajuan->num_rows(); ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo site_url().'penjamin/list_pengajuan'; ?>">Selengkapnya</a>
                    <i class="material-icons">input</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">insert_drive_file</i>
                  </div>
                  <p class="card-category">Data Konfirmasi</p>
                  <?php
                  $a = $this->session->userdata('id');

                  $konfirmasi = $this->db->query("SELECT * FROM data_jaminan as A
                                  INNER JOIN data_izin as C
                                  ON A.id_surat = C.id_surat
                                  INNER JOIN data_status as D
                                  ON C.id_surat = D.id_surat
                                  INNER JOIN s_status as E
                                  ON D.status = E.status
                                  WHERE A.id_penjamin = $a 
                                  AND D.status = '9' ");
                        ?>
                  <h3 class="card-title"><?php echo $konfirmasi->num_rows(); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo site_url().'/penjamin/list_konfirmasi'; ?>">Selengkapnya</a>
                    <i class="material-icons">input</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">insert_drive_file</i>
                  </div>
                  <p class="card-category">Data Jaminan</p>
                  <?php
                  $a = $this->session->userdata('id');

                  $jaminan = $this->db->query("SELECT * FROM data_izin as A
							JOIN tpbuser as B
							ON A.id_tpb = B.id_tpb
							JOIN data_jaminan as C
							ON A.id_surat = C.id_surat
							JOIN kegiatan as F
							ON A.kegiatan = F.id
							JOIN data_status as D
							ON A.id_surat = D.id_surat
							JOIN s_status as E
							ON D.status = E.status
							WHERE C.id_penjamin = $a
							AND d.status >= 5
							ORDER BY A.tgl_surat DESC ");
                        ?>
                  <h3 class="card-title"><?php echo $jaminan->num_rows(); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo site_url().'/penjamin/list_jaminan'; ?>">Selengkapnya</a>
                    <i class="material-icons">input</i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Kotak - Kotak 4 End -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Informasi</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">bug_report</i> Pengumuman
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Peraturan
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i> FAQ
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table">
                        <tbody>
                        <?php foreach($info as $i): ?>
                          <tr>
                            <td><?php echo $i->judul; ?><br><span><?php echo $i->isi; ?></span></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="messages">
                      <table class="table">
                        <tbody>
                        <?php foreach($peraturan as $p): ?>
                          <tr>
                            <td><a href="<?php echo $p->link; ?>" target="_blank"><?php echo $p->judul; ?></a><br><span><?php echo $p->isi; ?></span></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="settings">
                      <table class="table">
                        <tbody>
                        <tr align="center">
                            <td width="50%">Pertanyaan</td>
                            <td>Jawaban</td>
                        </tr>    
                        <?php foreach($faq as $f): ?>
                          <tr>
                            <td><?php echo $f->judul; ?></td>
                            <td><span><?php echo $f->isi; ?></span></td>
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