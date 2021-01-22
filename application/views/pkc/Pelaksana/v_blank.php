<table id="table" data-toggle="table" data-search="true" data-pagination="true">
                <thead>
                  <tr>
                    <th data-sortable="true" data-halign="center" data-valign="top">No.</th>
                    <th data-sortable="true" data-halign="center" data-valign="top" data-align="center">Nopen / Tgl. BC 2.6.2</th>
                    <th data-sortable="true" data-halign="center" data-valign="top">Uraian Barang</th>
                    <th data-sortable="true" data-halign="center" data-valign="top">Jumlah Satuan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($masuk as $in) {
                    ?>
                  <tr>
                    <td>Nomor</td>
                    <td><?php echo $in->no_dok; ?> / <?php echo date("d-m-Y", strtotime($in->tgl_dok)); ?></td>
                    <td><?php echo $in->uraian_barang; ?></td>
                    <td><?php echo $in->jumlah_barang; ?> <?php echo $in->satuan_barang; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
