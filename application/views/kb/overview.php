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
                  <p class="card-category">Data Perizinan</p>
                  <?php 
                          $a = $this->session->userdata('id');

                          $perizinan = $this->db->query("SELECT * FROM data_izin as A
                                                          JOIN data_status as B 
                                                          ON A.id_surat = B.id_surat
                                                          WHERE B.status = '1' 
                                                          AND A.id_tpb = $a
                                                        ");
                        ?>
                  <h3 class="card-title"><?php echo $perizinan->num_rows(); ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo site_url().'/kawasanberikat/list_izin'; ?>">Selengkapnya</a>
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
                  <p class="card-category">Data E-Jaminan</p>
                  <?php
                         $jaminan = $this->db->query("SELECT * FROM data_izin as A
                                                          JOIN data_status as B 
                                                          ON A.id_surat = B.id_surat
                                                          WHERE B.status > '1' 
                                                          AND A.id_tpb = $a
                                                        ");
                        ?>
                  <h3 class="card-title"><?php echo $jaminan->num_rows(); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo site_url().'/kawasanberikat/list_jaminan'; ?>">Selengkapnya</a>
                    <i class="material-icons">input</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">beenhere</i>
                  </div>
                  <p class="card-category">Data E-BPJ</p>
                  <?php
                  $bpj = $this->db->query("SELECT * FROM data_izin as A
                                    JOIN tpbdetail as B
                                    ON A.id_tpb = B.id_tpb
                                    JOIN kegiatan as D
                                    ON A.kegiatan = D.id
                                    JOIN data_status as E
                                    ON A.id_surat = E.id_surat
                                    JOIN s_status as F
                                    ON E.status = F.status
                                    JOIN data_jaminan as G 
                                    ON A.id_surat = G.id_surat
                                    JOIN penjamindetail as H 
                                    ON G.id_penjamin = H.id_penjamin
                                    WHERE A.id_tpb = $a 
                                    AND E.status BETWEEN '6' AND '11'
                                    ORDER BY A.tgl_surat DESC
                                    ")
                                    ?>
                  <h3 class="card-title"><?php echo $bpj->num_rows(); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo site_url().'/kawasanberikat/list_realisasi'; ?>">Selengkapnya</a>
                    <i class="material-icons">input</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">cloud_download</i>
                  </div>
                  <p class="card-category">Data Penarikan</p>
                  <?php
                  $penarikan = $this->db->query("SELECT * FROM data_izin as A
                                    JOIN tpbdetail as B
                                    ON A.id_tpb = B.id_tpb
                                    JOIN kegiatan as D
                                    ON A.kegiatan = D.id
                                    JOIN data_status as E
                                    ON A.id_surat = E.id_surat
                                    JOIN s_status as F
                                    ON E.status = F.status
                                    WHERE A.id_tpb = $a 
                                    AND E.status >= '16'
                                    ORDER BY A.tgl_surat DESC");
                                    ?>
                  <h3 class="card-title"><?php echo $penarikan->num_rows(); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="<?php echo site_url().'/kawasanberikat/list_penarikan'; ?>">Selengkapnya</a>
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
                            <i class="material-icons">info</i> Pengumuman
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">gavel</i> Peraturan
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">help</i> FAQ
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

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Monitoring Jaminan</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="display" style="width:100%">
                       <thead>
                        <th>No</th>
                        <th width="250">No Surat</th>
                        <th>No E-BPJ</th>
                        <th>Tanggal E-BPJ</th>
                        <th>Status</th>
                        <th>Berkas</th>
                      </thead>
                      <tbody>
                        <p style="color: black">* Penyerahan <strong><i>Customs Bond</i></strong> asli maksimal <strong style="color: red">7 hari kerja</strong></p>
                        <?php $no=1; foreach ($izin as $s): ?>
                        <tr>
                          <?php if($s->status =='11'  AND $s->hardcopy == NULL){
                            ?><td align="center"><?php echo $no++; ?></td>
                              <td align="center">S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($s->tgl_surat)); echo $tahun ?>9</td>
                              <td align="center"><?php echo $s->nomor_bpj; ?>/eBPJ/CB/<?php echo date('Y')?></td>
                              <td align="center"><?php $tanggal = $s->tanggal_bpj; echo $this->fungsi->tgl_indo($tanggal); ?></td>
                              <td align="center"><?php echo $s->keterangan_status; ?></td>
                              <td align="center"><?php if( $s->hardcopy == NULL){
                            ?><p class="badge badge-warning">Berkas Asli belum diserahkan</p>
                          <?php } else{
                            ?>
                          <?php } ?>
                              </td>
                          <?php } ?>
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