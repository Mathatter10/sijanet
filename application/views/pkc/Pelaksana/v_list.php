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
                            List Jaminan
                            <span style="float:right;">
                                <a href="<?php echo base_url() . 'index.php/pelaksana/tambah_jaminan'; ?>" data-toggle="tooltip" data-placement="left" title="Input Surat Persetujuan" class="btn btn-sm btn-danger">INPUT</a>
                            </span>
                        </div>
                        <div class="card-body">
                            
                            <style>
                                .bootstrap-table-filter-control-0,
                                .bootstrap-table-filter-control-1,
                                .bootstrap-table-filter-control-2,
                                .bootstrap-table-filter-control-3,
                                .bootstrap-table-filter-control-4 {
                                    text-align: center;
                                    font-size: 13px;
                                }
                                .bootstrap-table-filter-control-5 {
                                    text-align: center;
                                    font-size: 13px;
                                    color: grey;
                                }
                            </style>


                            <table id="table" data-toggle="table" data-search="false" data-pagination="true" data-filter-control="true" data-filter-show-clear="true">
                                <thead>
                                    <tr>
                                        <th data-sortable="true" data-halign="center" data-filter-control-placeholder="Cari surat" data-valign="top" data-filter-control="input">No. Surat</th>
                                        <th data-sortable="true" data-halign="center" data-filter-control-placeholder="Cari tanggal" data-valign="top" data-align="center" data-filter-control="input">Tgl. Surat</th>
                                        <th data-sortable="true" data-halign="center" data-filter-control-placeholder="Cari perusahaan" data-valign="top" data-filter-control="input">Nama Perusahaan</th>
                                        <th data-sortable="true" data-halign="center" data-filter-control-placeholder="Cari nilai" data-valign="top" data-filter-control="input">Nilai Jaminan</th>
                                        <th data-sortable="true" data-halign="center" data-filter-control-placeholder="Cari tanggal" data-valign="top" data-align="center" data-filter-control="input">Jatuh Tempo</th>
                                        <th data-sortable="true" data-halign="center" data-filter-control-placeholder="Filter" data-valign="top" data-filter-control="select">Status</th>
                                        <th data-sortable="true" data-halign="center" data-valign="top" data-align="center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data_izin as $s) {
                                        ?>
                                    <tr>
                                        <td>S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date("Y"); ?></a></td>
                                        <td><?php echo date("d-m-Y", strtotime($s->tgl_surat)); ?></td>
                                        <td><?php echo $s->nama_tpb; ?></td>
                                        <td>Rp <?php echo number_format($s->nilai, 0, ",", "."); ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($s->jth_tempo)); ?></td>
                                        <td><?php echo $s->keterangan_status; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'index.php/pelaksana/detail/' . $s->id_surat; ?>" title="Lihat Detail" class="btn btn-primary btn-sm btn-round btn-fab">
                                                <i class="material-icons">visibility</i>
                                                <?php $r = $s->revisi;
                                                    $p = $s->perpanjangan;
                                                    if (($r == "1" || $p == "1")) {
                                                        echo '<font color="green">&#9679;</font>';
                                                    } else {
                                                        echo '';
                                                    } ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>