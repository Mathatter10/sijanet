<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="card-icon">
                                <i class="material-icons">find_in_page</i>
                            </div>
                            <h4 class="card-title ">Monitoring Jaminan</h4>
                        </div>
                        <div class="card-body">

<table id="table" data-toggle="table" data-search="true" data-pagination="true">
                    <thead>
                        <tr>
                            <th data-sortable="true" data-halign="center" data-valign="top">No. Jaminan</th>
                            <th data-sortable="true" data-halign="center" data-align="center" data-valign="top">Tgl. Jaminan</th>
                            <th data-sortable="true" data-halign="center" data-valign="top">Nilai Jaminan</th>
                            <th data-sortable="true" data-halign="center" data-valign="top">Perusahaan</th>
                            <th data-sortable="true" data-halign="center" data-align="center" data-valign="top">Jatuh Tempo</th>
                            <th data-sortable="true" data-align="center" data-valign="top">Sisa Hari</th>
                            <th data-sortable="true" data-halign="center" data-valign="top" data-align="center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data_jaminan as $s) {
                            ?>
                            <tr>
                                <td><?php echo $s->no_jaminan; ?></a></td>
                                <td><?php echo date("d-m-Y", strtotime($s->tgl_jaminan)); ?></td>
                                <td>Rp <?php echo number_format($s->nilai, 0, ",", "."); ?></td>
                                <td><?php echo $s->nama_tpb; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($s->jth_tempo)); ?></td>
                                <td>
                                    <?php
                                    $hari_ini = time();
                                    $jth_tempo = strtotime($s->jth_tempo);
                                    $datediff = $hari_ini - $jth_tempo;
                                    $a =  round($datediff / (60 * 60 * 24));
                                    if($s->status == '19'){
                                        echo '<span class="badge badge-pill badge-info">SELESAI' ;
                                      }
                                    else{
                                        if (($a > "0")) {
                                        $b = str_replace('-', ' ', $a);
                                        echo '<span class="badge badge-pill badge-danger">TERLAMBAT';
                                    } elseif (($a >= "-7")) {
                                        $b = str_replace('-', ' ', $a);
                                        echo '<span class="badge badge-pill badge-warning blinking">';
                                        echo $b;
                                        echo ' hari</span>';
                                    } else {
                                        $b = str_replace('-', ' ', $a);
                                        echo '<span class="badge badge-pill badge-success">';
                                        echo $b;
                                        echo ' hari</span>';
                                    } }?>
                                </td>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . 'index.php/pelaksana/detailmon/' . $s->id_surat; ?>" title="Lihat Detail" class="btn btn-primary btn-sm btn-round btn-fab"><i class="material-icons">visibility</i></a>
                                    <?php $r = $s->revisi;
                                    $p = $s->perpanjangan;
                                    if (($r == "1" || $p == "1")) {
                                        echo '<font color="green">&#9679;</font>';
                                    } else {
                                        echo '';
                                    } ?>
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