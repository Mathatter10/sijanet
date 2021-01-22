<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="card-icon">
                                <i class="material-icons">apps</i>
                            </div>
                            <h4 class="card-title ">Selamat Datang di SiJanet</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-primary card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">library_books</i>
                                            </div>
                                            <p class="card-category">Diterbitkan e-Jaminan</p>
                                            <h3 class="card-title"><?php
                                                                    $a = $this->session->userdata('id');
                                                                    $pengajuan = $this->db->query("SELECT * FROM data_izin as A
                                                            INNER JOIN bckasi as B
                                                            ON A.pkc = B.pkc
                                                            INNER JOIN data_status as C
                                                            ON A.id_surat = C.id_surat
                                                            WHERE C.status = '5' AND B.id_bc=$a
                                                            ");
                                                                    echo $pengajuan->num_rows(); ?></h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="<?php echo base_url() . 'index.php/seksi/list_jaminan'; ?>">Selengkapnya<i class="material-icons">update</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-success card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">note</i>
                                            </div>
                                            <p class="card-category">Diterbitkan e-BPJ</p>
                                            <h3 class="card-title"><?php
                                                                    $a = $this->session->userdata('id');
                                                                    $pengajuan = $this->db->query("SELECT * FROM data_izin as A
                                    INNER JOIN bckasi as B
                                    ON A.pkc = B.pkc
                                    INNER JOIN data_status as C
                                    ON A.id_surat = C.id_surat
                                    WHERE C.status = '11' AND B.id_bc=$a
                                    ");
                                                                    echo $pengajuan->num_rows(); ?></h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="<?php echo base_url() . 'index.php/seksi/list_jaminan'; ?>">Selengkapnya<i class="material-icons">update</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-warning card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">done_all</i>
                                            </div>
                                            <p class="card-category">Pengajuan Penarikan</p>
                                            <h3 class="card-title"><?php
                                                                    $a = $this->session->userdata('id');
                                                                    $pengajuan = $this->db->query("SELECT * FROM data_izin as A
                                    INNER JOIN bckasi as B
                                    ON A.pkc = B.pkc
                                    INNER JOIN data_status as C
                                    ON A.id_surat = C.id_surat
                                    WHERE C.status = '16' AND B.id_bc=$a
                                    ");
                                                                    echo $pengajuan->num_rows(); ?></h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="<?php echo base_url() . 'index.php/seksi/list_jaminan'; ?>">Selengkapnya<i class="material-icons">update</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-danger card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">feedback</i>
                                            </div>
                                            <p class="card-category">Jaminan Ditolak</p>
                                            <h3 class="card-title"><?php
                                                                    $a = $this->session->userdata('id');
                                                                    $pengajuan = $this->db->query("SELECT * FROM data_izin as A
                                    INNER JOIN bckasi as B
                                    ON A.pkc = B.pkc
                                    INNER JOIN data_status as C
                                    ON A.id_surat = C.id_surat
                                    WHERE C.status = '0' AND B.id_bc=$a
                                    ");
                                                                    echo $pengajuan->num_rows(); ?></h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="<?php echo base_url() . 'index.php/seksi/list_jaminan'; ?>">Selengkapnya<i class="material-icons">update</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>