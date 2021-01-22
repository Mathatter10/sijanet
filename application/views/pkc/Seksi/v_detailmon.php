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
                <i class="material-icons">find_in_page</i>
              </div>
              Persetujuan Jaminan No: S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date("Y"); ?>
              <span style="float:right;">
                <a href="<?php echo base_url() . 'index.php/seksi/detail/' . $s->id_surat; ?>" data-toggle="tooltip" data-placement="left" title="Lihat Detail Jaminan" class="btn btn-sm btn-danger">DETAIL</a>
              </span>
            </div>
            <div class="card-body">

              <div class="card">
                <div class="card-header card-header-tabs card-header-rose">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">

                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#tabkeluar" data-toggle="tab">
                            <i class="material-icons">unfold_more</i> Realisasi Pengeluaran
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#tabmasuk" data-toggle="tab">
                            <i class="material-icons">unfold_less</i> Realisasi Pemasukan
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>

                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tabkeluar">
                      <table id="table" data-toggle="table" data-search="true" data-pagination="true" data-show-export="true" data-buttons-align="left" data-buttons-class="light" data-show-button-text="true" data-export-types="['excel', 'doc', 'pdf', 'csv', 'txt']">
                        <thead>
                          <tr>
                            <th data-sortable="true" data-width="50" data-halign="center" data-valign="top">No.</th>
                            <th data-sortable="true" data-width="250" data-halign="center" data-valign="top" data-align="center">Nopen / Tgl. BC 2.6.1</th>
                            <th data-sortable="true" data-width="600" data-halign="center" data-valign="top" data-align="center">Uraian Barang</th>
                            <th data-sortable="true" data-halign="center" data-valign="top" data-align="center">Jumlah Satuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $i = 1;
                            foreach ($keluar as $out) {
                              ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $out->no_dok; ?> / <?php echo date("d-m-Y", strtotime($out->tgl_dok)); ?></td>
                            <td><?php echo $out->uraian_barang; ?></td>
                            <td><?php echo $out->jumlah_barang; ?> <?php echo $out->satuan_barang; ?></td>
                          </tr>
                          <?php
                            }
                            ?>
                        </tbody>
                      </table>

                    </div><?php } ?>

                    <div class="tab-pane" id="tabmasuk">
                      <?php
                      foreach ($data_jaminan as $dj) { ?>
                      <table id="table" data-toggle="table" data-search="true" data-pagination="true" data-show-export="true" data-buttons-align="left" data-buttons-class="light" data-show-button-text="true" data-export-types="['excel', 'doc', 'pdf', 'csv', 'txt']">
                        <thead>
                          <tr>
                            <th data-sortable="true" data-width="50" data-halign="center" data-valign="top">No.</th>
                            <th data-sortable="true" data-width="250" data-halign="center" data-valign="top" data-align="center">Nopen / Tgl. BC 2.6.2</th>
                            <th data-sortable="true" data-width="600" data-halign="center" data-valign="top" data-align="center">Uraian Barang</th>
                            <th data-sortable="true" data-halign="center" data-valign="top" data-align="center">Jumlah Satuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $i = 1;
                            foreach ($masuk as $in) {
                              ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $in->no_dok; ?> / <?php echo date("d-m-Y", strtotime($in->tgl_dok)); ?></td>
                            <td><?php echo $in->uraian_barang; ?></td>
                            <td><?php echo $in->jumlah_barang; ?> <?php echo $in->satuan_barang; ?></td>
                          </tr>
                          <?php
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="tab-pane" id="tabmasuk">
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

                    <a href="<?php echo base_url() . 'index.php/seksi/monitoring'; ?>" data-toggle="tooltip" data-placement="left" title="Kembali" class="btn btn-sm btn-primary"> Kembali</a>
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