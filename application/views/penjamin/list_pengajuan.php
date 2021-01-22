      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Daftar Pengajuan Jaminan</h4>
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
                        <?php $i='1';foreach($jaminan as $j): ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td>S-<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?></td>
                            <td><?php echo $j->nama_tpb; ?></td>
                            <td><?php echo $j->ket_giat; ?></td>
                            <td><?php $angka = $j->nilai; echo $this->fungsi->rupiah($angka); ?></td>
                            <td><?php $tanggal = $j->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
                            <td><?php echo $j->keterangan_status; ?></td>
                            <td>
                               <a class="btn btn-sm btn-primary" href="<?php echo site_url("penjamin/teliti/".$j->id_jaminan) ?>">Teliti</a>
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