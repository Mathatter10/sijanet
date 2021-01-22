      <div class="content">
        <div class="container-fluid">
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
                      <thead class=" text-primary">
                        <th>
                          No.
                        </th>
                        <th>
                          No. Surat
                        </th>
                        <th>
                          Nama KB
                        </th>
                        <th>
                          Jenis Kegiatan
                        </th>
                        <th>
                          Nilai
                        </th>
                        <th>
                          Jatuh Tempo
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Aksi
                        </th>
                      </thead>
                      <tbody>
                        <?php $i = '1';
                        foreach ($jaminan as $j) : ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td>S-<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?>
                            <?php if($j->revisi =='1'){ ?>
                            <p class="badge badge-primary">Revisi</p> <?php } ?></td></td>
                            <td><?php echo $j->nama_tpb; ?></td>
                            <td><?php echo $j->ket_giat; ?></td>
                            <td><?php $angka = $j->nilai;
                                  echo $this->fungsi->rupiah($angka); ?></td>
                            <td><?php $tanggal = $j->jth_tempo;
                                  echo $this->fungsi->tgl_indo($tanggal); ?></td>
                            <td><?php echo $j->keterangan_status; ?></td>
                            <td>
                              <?php
                                if ($j->status < 6) { ?>
                                <a class="btn-sm btn-warning" href="<?php echo site_url("penjamin/ubah/" . $j->id_jaminan) ?>" data-toggle="tooltip" data-placement="top" title="Ubah Jaminan"><i class="fa fa-edit"></i></a>
                                <a class="btn-sm btn-primary" href="<?php echo site_url("penjamin/detail/" . $j->id_jaminan) ?>" data-toggle="tooltip" data-placement="top" title="Detail Jaminan"><i class="fa fa-info"></i></a>
                              <?php  } elseif ($j->status == '9') {
                                  echo form_open('penjamin/konfirmasi_act') ?>
                                <input type="hidden" name="penjamin" value="<?php echo $this->session->userdata('nama') ?>" placeholder="Custom Text Message">
                                <input type="hidden" name="nosurat" value="<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date('Y'); ?>" placeholder="Custom Text Message">
                                <input type="hidden" name="nojaminan" value="<?php echo $j->no_jaminan ?>" placeholder="Custom Text Message">
                                <input type="hidden" name="id_surat" value="<?php echo $j->id_surat ?>" />
                                <input type="hidden" name="status" value="10" />
                                <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check"></i>Konfirmasi Jaminan</button>
                              <?php echo form_close();
                                } elseif ($j->status >= 6) { ?>
                                <a class="btn-sm btn-primary" href="<?php echo site_url("penjamin/detail/" . $j->id_jaminan) ?>" data-toggle="tooltip" data-placement="top" title="Detail Jaminan"><i class="fa fa-info"></i></a>
                              <?php } else { } ?>
                            </td>
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