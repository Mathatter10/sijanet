<?php
foreach ($data_izin as $s) {
    ?>
<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            Persetujuan Jaminan No: S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date("Y"); ?>
                            <span style="float:right;">
                                <a href="<?php echo base_url() . 'index.php/kasubsi/detailmon/' . $s->id_surat; ?>" data-toggle="tooltip" data-placement="left" title="Lihat Laporan Realisasi" class="btn btn-sm btn-danger">MONITORING</a>
                            </span>
                        </div>
                        <div class="card-body">

                            <div class="card">
                                <div class="card-header card-header-tabs card-header-rose">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#tabdetail" data-toggle="tab">
                                                        <i class="material-icons">details</i> Detail
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <?php $a = $s->status;
                                                    if (($a == "0" || $a == "1" || $a == "3" || $a == "4")) {
                                                        echo '';
                                                    } else {
                                                        echo '<li class="nav-item">
                                                        <a class="nav-link" href="#tabjaminan" data-toggle="tab">
                                                            <i class="material-icons">donut_large</i> e-Jaminan
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>';
                                                    } ?>
                                                <?php $a = $s->status;
                                                    if (($a == "11" || $a == "16" || $a == "17" || $a == "18" || $a == "19")) {
                                                        echo '<li class="nav-item">
                                                        <a class="nav-link" href="#tabbpj" data-toggle="tab">
                                                            <i class="material-icons">cloud_queue</i> e-BPJ
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>';
                                                    } else {
                                                        echo '';
                                                    } ?>
                                                <?php $a = $s->revisi;
                                                    if (($a == "1")) {
                                                        echo '<li class="nav-item">
                                                        <a class="nav-link" href="#tabrevisi" data-toggle="tab">
                                                            <i class="material-icons">call_split</i> Revisi
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>';
                                                    } else {
                                                        echo '';
                                                    } ?>
                                                <?php $a = $s->perpanjangan;
                                                    if (($a == "1")) {
                                                        echo '<li class="nav-item">
                                                        <a class="nav-link" href="#tabperpanjangan" data-toggle="tab">
                                                            <i class="material-icons">code</i> Perpanjangan
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>';
                                                    } else {
                                                        echo '';
                                                    } ?>
                                                <?php $a = $s->status;
                                                    if (($a == "3")) {
                                                        echo '<li class="nav-item">
                                                        <a class="nav-link" href="#tabpembatalan" data-toggle="tab">
                                                            <i class="material-icons">cloud</i> Pembatalan
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>';
                                                    } else {
                                                        echo '';
                                                    } ?>

                                                
                                                </div>


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tabdetail">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td width="25%">Seksi Penerbit</td>
                                                        <td><?php echo $s->keterangan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">Nama Perusahaan / NPWP</td>
                                                        <td><a class="btn btn-sm" data-target="#mdl_tpb" data-toggle="modal"><?php echo $s->nama_tpb; ?></a> / <?php echo $s->npwp_tpb; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">Jenis Kegiatan</td>
                                                        <td>Pengeluaran sementara ke tempat lain dalam daerah pabean dalam rangka <?php echo $s->ket_giat; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">Nilai Jaminan</td>
                                                        <td>Rp <?php echo number_format($s->nilai, 0, ",", "."); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">Tanggal Jatuh Tempo</td>
                                                        <td><?php echo date("d-m-Y", strtotime($s->jth_tempo)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">Perusahaan Tujuan</td>
                                                        <td><?php echo $s->tujuan; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">Status</td>
                                                        <td><strong><?php echo $s->keterangan_status; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><?php } ?>

                                        <div class="tab-pane" id="tabjaminan">
                                            <?php
                                            foreach ($data_jaminan as $dj) { ?>
                                            <table class="table">
                                                <tr>
                                                    <td width="25%">Nomor Jaminan</td>
                                                    <td><?php echo $dj->no_jaminan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Nama Perusahaan</td>
                                                    <td><?php echo $dj->nama_tpb; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Perusahaan Penjamin</td>
                                                    <td><a class="btn btn-sm" data-target="#mdl_penjamin" data-toggle="modal"><?php echo $dj->nama_penjamin; ?></a></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Bentuk Jaminan</td>
                                                    <td>
                                                        <?php $a = $dj->bentuk_jaminan;
                                                            switch ($a) {
                                                                case "1":
                                                                    echo "Customs Bond";
                                                                    break;
                                                                case "2":
                                                                    echo "Jaminan Tunai";
                                                                    break;
                                                                case "3":
                                                                    echo "Bank Garansi";
                                                                    break;
                                                                case "4":
                                                                    echo "Jaminan Perusahaan";
                                                                    break;
                                                                default:
                                                                    echo "Jaminan Lainnya";
                                                            } ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Nilai Jaminan yang Disetujui</td>
                                                    <td>Rp <?php echo number_format($dj->nilai, 0, ",", "."); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal Jatuh Tempo</td>
                                                    <td><?php echo date("d-m-Y", strtotime($dj->jth_tempo)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">File</td>
                                                    <td><a href="<?php echo site_url('createpdf/jaminan/' . $dj->id_jaminan) ?>" target="_blank" class="btn btn-default btn-xs"> <i class="fa fa-download"></i> Cetak</a></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="tabbpj">
                                            <?php
                                            foreach ($ebpj as $eb) { ?>
                                            <table class="table">
                                                <tr>
                                                    <td width="25%">Nomor E-BPJ</td>
                                                    <td><?php echo $eb->nomor_bpj; ?>/eBPJ/
                                                        <?php $a = $dj->bentuk_jaminan;
                                                            switch ($a) {
                                                                case "1":
                                                                    echo "CB/";
                                                                    break;
                                                                case "2":
                                                                    echo "TN/";
                                                                    break;
                                                                case "3":
                                                                    echo "BG/";
                                                                    break;
                                                                case "4":
                                                                    echo "JP/";
                                                                    break;
                                                                default:
                                                                    echo "JL/";
                                                            } ?><?php echo date("Y"); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal E-BPJ</td>
                                                    <td><?php echo date("d-m-Y", strtotime($eb->tanggal_bpj)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Nama Perusahaan</td>
                                                    <td><?php echo $eb->nama_tpb; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Nilai Jaminan yang Disetujui</td>
                                                    <td>Rp <?php echo number_format($eb->nilai, 0, ",", "."); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal Jatuh Tempo</td>
                                                    <td><?php echo date("d-m-Y", strtotime($eb->jth_tempo)); ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="tabperpanjangan">
                                            <?php
                                            foreach ($perpanjangan as $p) { ?>
                                            <table class="table">
                                                <tr>
                                                    <td width="25%">Nomor Surat</td>
                                                    <td><?php echo $p->no_suratpj; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal Surat</td>
                                                    <td><?php echo date("d-m-Y", strtotime($p->tgl_suratpj)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal Jatuh Tempo (lama)</td>
                                                    <td><?php echo date("d-m-Y", strtotime($p->jth_tempo)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal Jatuh Tempo (baru)</td>
                                                    <td><?php echo date("d-m-Y", strtotime($p->new_due_date)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Nilai Jaminan (lama)</td>
                                                    <td>Rp <?php echo number_format($p->nilai, 0, ",", "."); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Nilai Jaminan (baru)</td>
                                                    <td>Rp <?php echo number_format($p->jaminanpj, 0, ",", "."); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Keterangan</td>
                                                    <td><?php echo $p->alasanpj; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="tabrevisi">
                                            <?php
                                            foreach ($revisi as $r) { ?>
                                            <table class="table">
                                                <tr>
                                                    <td width="25%">Nomor Surat Revisi</td>
                                                    <td><?php echo $r->no_rev; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal Surat Revisi</td>
                                                    <td><?php echo date("d-m-Y", strtotime($r->tgl_rev)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Seksi Penerbit</td>
                                                    <td><?php echo $r->keterangan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Jenis Kegiatan</td>
                                                    <td><?php echo $r->kegiatan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Nilai Jaminan yang Disetujui</td>
                                                    <td>Rp <?php echo number_format($r->nilai_rev, 0, ",", "."); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal Jatuh Tempo</td>
                                                    <td><?php echo date("d-m-Y", strtotime($r->jth_tempo_rev)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Keterangan</td>
                                                    <td><?php echo $r->keterangan_rev; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>

                                        <div class="tab-pane" id="tabpembatalan">
                                            <?php
                                            foreach ($pembatalan as $pb) { ?>
                                            <table class="table">
                                                <tr>
                                                    <td width="25%">Nomor Surat</td>
                                                    <td><?php echo $pb->no_suratpb; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Tanggal Surat</td>
                                                    <td><?php echo date("d-m-Y", strtotime($pb->tgl_suratpb)); ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Alasan Pembatalan</td>
                                                    <td><?php echo $pb->alasanpb; ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>

                                        </div>


                                        <a href="<?php echo base_url() . 'index.php/kasubsi/list_jaminan'; ?>" data-toggle="tooltip" data-placement="left" title="Kembali" class="btn btn-sm btn-primary"> Kembali</a>
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


<!-- Modal Perpanjangan-->
<div class="modal fade" id="mdl_panjang" tabindex="-1" role="dialog" aria-labelledby="mdl_panjang" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Persetujuan Perpanjangan Jaminan <?php echo $s->nama_tpb; ?></h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/kasubsi/perpanjang_act'; ?>" method="post">
                    <table class="table">
                        <tr>
                            <td width="35%">No. Surat</td>
                            <td><input type="text" name="txt_nopj" class="form-control" placeholder="No. Surat Persetujuan Perpanjangan" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Surat</td>
                            <td><input type="date" name="txt_tglpj" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Jatuh Tempo</td>
                            <td><input type="date" name="txt_tempopj" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td width="35%">Nilai Jaminan</td>
                            <td><input type="text" id="nilai" name="txt_nilaipj" class="form-control" placeholder="Nilai Jaminan Dalam Rupiah" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td width="35%">Keterangan</td>
                            <td><input type="text" name="txt_alasanpj" class="form-control" placeholder="Keterangan / Alasan Perpanjangan" required autocomplete="off"></td>
                            <input type="hidden" name="txt_perpanjangan" value="1">
                            <input type="hidden" name="txt_idjampj" value="<?php echo $s->id_surat; ?>">
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pembatalan-->
<div class="modal fade" id="mdl_batal" tabindex="-1" role="dialog" aria-labelledby="mdl_batal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Persetujuan Pembatalan Jaminan <?php echo $s->nama_tpb; ?></h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/kasubsi/pembatalan_act'; ?>" method="post">
                    <table class="table">
                        <tr>
                            <td width="35%">No. Surat</td>
                            <td><input type="text" name="txt_nopb" class="form-control" placeholder="No. Surat Persetujuan Pembatalan" required autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Surat</td>
                            <td><input type="date" name="txt_tglpb" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td width="35%">Alasan Pembatalan</td>
                            <td><input type="text" name="txt_alasanpb" class="form-control" placeholder="Keterangan / Alasan Pembatalan" required autocomplete="off"></td>
                            <input type="hidden" name="txt_status" value="3">
                            <input type="hidden" name="txt_idjampb" value="<?php echo $s->id_surat; ?>">
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Revisi-->
<div class="modal fade" id="mdl_revisi" tabindex="-1" role="dialog" aria-labelledby="mdl_revisi" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Revisi Persetujuan Jaminan <?php echo $s->nama_tpb; ?></h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/kasubsi/revisi_act'; ?>" method="post">
                    <table class="table">
                        <tr>
                            <td width="35%">No. Surat</td>
                            <td><input type="text" name="txt_norev" class="form-control" placeholder="No. Surat Persetujuan Revisi" required autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Surat</td>
                            <td><input type="date" name="txt_tglrev" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td width="35%">Kegiatan</td>
                            <td><select name="opt_kegiatanrev" id="slc_kegiatanrev" class="form-control selectpicker" style="width: 100%" data-live-search="false" required="required">
                                    <?php
                                    foreach ($kegiatan as $g) {
                                        ?>
                                    <option value="<?php echo $g->id; ?>"><?php echo $g->ket_giat; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td width="35%">Nilai Jaminan</td>
                            <td><input type="text" id="nilairev" name="txt_nilairev" class="form-control" placeholder="Nilai Jaminan Dalam Rupiah" required autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td width="35%">Tanggal Jatuh Tempo</td>
                            <td><input type="date" name="txt_temporev" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td width="35%">Perusahaan Tujuan</td>
                            <td><input type="text" name="txt_tujuanrev" class="form-control" placeholder="Perusahaan Tujuan" required autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td width="35%">Keterangan</td>
                            <td><input type="text" name="txt_keteranganrev" class="form-control" placeholder="Keterangan / Alasan Revisi" required autocomplete="off"></td>
                            <input type="hidden" name="txt_revisi" value="1">
                            <input type="hidden" name="txt_idjamrev" value="<?php echo $s->id_surat; ?>">
                        </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus-->
<div class="modal fade" id="mdl_hapus" tabindex="-1" role="dialog" aria-labelledby="mdl_hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Peringatan!!!</h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus data persetujuan nomor <b><?php echo $s->no_surat; ?> tanggal <?php echo date("d-m-Y", strtotime($s->tgl_surat)); ?></b>??</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Tutup</button>
                <a href="<?php echo base_url() . 'index.php/kasubsi/hapus_data/' . $s->id_surat; ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal TPB-->
<div class="modal fade" id="mdl_tpb" tabindex="-1" role="dialog" aria-labelledby="mdl_tpb" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profil <?php echo $s->nama_tpb; ?></h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="dl-horizontal">
                    <dt>No. Surat Keputusan</dt>
                    <dd><?php echo $s->no_skep; ?></dd>
                    <dt>NPWP Perusahaan</dt>
                    <dd><?php echo $s->npwp_tpb; ?></dd>
                    <dt>Alamat Perusahaan</dt>
                    <dd><?php echo $s->alamat_tpb; ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- Modal TPB-->
<div class="modal fade" id="mdl_penjamin" tabindex="-1" role="dialog" aria-labelledby="mdl_penjamin" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profil <?php echo $dj->nama_penjamin; ?></h5><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="dl-horizontal">
                    <dt>NPWP Penjamin</dt>
                    <dd><?php echo $dj->npwp_penjamin; ?></dd>
                    <dt>Alamat Penjamin</dt>
                    <dd><?php echo $dj->alamat_penjamin; ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>