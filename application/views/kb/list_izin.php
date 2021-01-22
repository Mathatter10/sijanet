      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Data Jaminan</h4>
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
                          Tanggal Surat
                        </th>
                        <th>
                          Jenis Kegiatan
                        </th>
                        <th>
                          Perusahaan Tujuan
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
                        <?php $no = 1;
                        foreach ($izin as $i) : ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td>S-<?php echo $i->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($i->tgl_surat)); echo $tahun ?></td>
                            <td align="center"><?php $tanggal = $i->tgl_surat;
                                                  echo $this->fungsi->tgl_indo($tanggal); ?></td>
                            <td><?php echo $i->ket_giat ?></td>
                            <td><?php echo $i->tujuan ?></td>
                            <td align="center"><?php $tanggal = $i->jth_tempo;
                                                  echo $this->fungsi->tgl_indo($tanggal); ?></td>
                            <td><?php echo $i->keterangan_status ?></td>
                            <td align="center">
                              <?php if ($i->status == '1' || $i->status == '20' ) {
                                  ?><a href="<?php echo site_url('kawasanberikat/input/' . $i->id_surat); ?>" class="btn-circle btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Ajukan Jaminan"><i class="fa fa-edit"></i></a>
                                <?php } elseif ($i->status == '5') {
                                    ?><?php echo form_open("kawasanberikat/ajup") ?>
                                <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>" />
                                <input type="hidden" name="status" value="6" />
                                <input type="hidden" name="kaber" value="<?php echo $this->session->userdata('nama') ?>" placeholder="Custom Text Message">
                                <input type="hidden" name="nosurat" value="<?php echo $i->no_surat ?>/WBC.09/KPP.MP.04/<?php echo date('Y'); ?>" placeholder="Custom Text Message">
                                <input type="submit" class="btn btn-warning" value="Ajukan">
                                <?php echo form_close(); ?>
                              <?php } else {
                                  ?><a href="<?php echo site_url('kawasanberikat/detail/' . $i->id_surat); ?>" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fa fa-info-circle"></i></a>
                              <?php } ?>
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