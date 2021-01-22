<?php
$this->session->set_userdata('referred_from', current_url());
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Data Jaminan</h4>
                        <div class="row">
                            <?php foreach ($izin as $i) : ?>
                                <?php if ($i->realisasi == '1') { } else { ?>
                                    <a href="" data-target="#importexcel" data-toggle="modal" class="btn btn-sm btn-primary">Import Excel</a>
                                <?php } ?>

                                <?php if ($i->realisasi == '1') { ?>
                                    <a href="<?php echo site_url('createpdf/laporan/' . $i->id_surat) ?>" target="_blank" class="btn btn-sm btn-info">Cetak Laporan</a>
                                    <?php echo form_open('kawasanberikat/penarikan_act') ?>
                                    <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>" />
                                     <input type="hidden" name="id_jaminan" value="<?php echo $i->id_jaminan ?>" />
                                    <input type="hidden" name="status" value="16" />
                                    <input type="hidden" name="tgl_penarikan" value="<?php echo date('Y-m-d H:i:s') ?>" />
                                    <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check"></i>Ajukan Penarikan</button>
                                <?php echo form_close();
                                    } ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h6 class="card-title ">Realisasi BC 2.6.1</h6>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <?php if ($i->realisasi == '1') { } else { ?>
                                    <a href="" data-target="#tambahbarang1<?php echo $i->id_surat ?>" data-toggle="modal" class="btn btn-primary">Tambah Barang</a>
                                <?php } ?>
                                <br><br>
                                <table class="table table-hover">
                                    <tr>
                                        <td>No</td>
                                        <td>No BC 261</td>
                                        <td>Tgl BC 261</td>
                                        <td>Uraian Barang</td>
                                        <td>Jumlah</td>
                                        <?php if ($i->realisasi == '1') { } else { ?>
                                            <td>Aksi</td>
                                        <?php } ?>
                                    </tr>
                                    <?php $no = 1;
                                        foreach ($keluar as $k) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $k->no_dok ?></td>
                                            <td><?php echo $k->tgl_dok ?></td>
                                            <td><?php echo $k->uraian_barang ?></td>
                                            <td><?php echo $k->jumlah_barang ?></td>
                                            <?php if ($i->realisasi == '1') { } else { ?>
                                                <td><?php echo anchor('kawasanberikat/hapus_realisasi/' . $k->id_realisasi, 'Hapus'); ?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h6 class="card-title ">Realisasi BC 2.6.2</h6>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <?php if ($i->realisasi == '1') { } else { ?>
                                    <a href="" data-target="#tambahbarang2<?php echo $i->id_surat ?>" data-toggle="modal" class="btn btn-primary">Tambah Barang</a>
                                <?php } ?>
                                <br><br>
                                <table class="table table-hover">
                                    <tr>
                                        <td>No</td>
                                        <td>No BC 262</td>
                                        <td>Tgl BC 262</td>
                                        <td>Uraian Barang</td>
                                        <td>Jumlah</td>
                                        <?php if ($i->realisasi == '1') { } else { ?>
                                            <td>Aksi</td>
                                        <?php } ?>
                                    </tr>

                                    <?php $no = 1;
                                        foreach ($masuk as $m) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $m->no_dok ?></td>
                                            <td><?php echo $m->tgl_dok ?></td>
                                            <td><?php echo $m->uraian_barang ?></td>
                                            <td><?php echo $m->jumlah_barang ?></td>
                                            <?php if ($i->realisasi == '1') { } else { ?>
                                                <td><?php echo anchor('kawasanberikat/hapus_realisasi/' . $m->id_realisasi, 'Hapus'); ?></td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>

                        <?php if ($i->realisasi == '1') {
                                echo form_open("kawasanberikat/selesai") ?>
                            <input type="hidden" name="id_jaminan" value="<?php echo $i->id_jaminan ?>" />
                            <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>" />
                            <input type="hidden" name="realisasi" value="0" />
                            <input type="submit" class="btn btn-danger" value="Batal" style="float: right;">
                        <?php echo form_close();
                            } else {
                                echo form_open("kawasanberikat/selesai") ?>
                            <input type="hidden" name="id_jaminan" value="<?php echo $i->id_jaminan ?>" />
                            <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>" />
                            <input type="hidden" name="realisasi" value="1" />
                            <input type="submit" class="btn btn-success" value="Selesai" style="float: right;">
                        <?php echo form_close();
                            } ?>
                        <a href="<?php echo site_url('kawasanberikat/list_realisasi') ?>" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>

<div class="modal fade" id="importexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File Realisasi </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('kawasanberikat/import'); ?>
                <input class="form-control" type="file" name="file" />
                <input type="hidden" value="<?php echo $i->id_surat ?>" name="id_surat" />
                <br>
                <input class="btn btn-success" type="submit" name="upload" value="Upload" />
                <?php echo form_close(); ?>
                <span>Download realisasi :</span><a href="<?php echo base_url('excel/format-excel.xlsx'); ?>" class="btn btn-sm"><i class="fa fa-download"></i></a>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahbarang1<?php echo $i->id_surat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Realisasi 2.6.1 </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('kawasanberikat/realisasi') ?>
                <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>">
                <input type="hidden" name="jns_dok" value="1">
                <div class="row">
                    <div class="col">
                        <label> Nomor Dokumen </label>
                        <input type="text" class="form-control" name="no_dok">
                    </div>
                    <div class="col">
                        <label> Tgl Dokumen </label>
                        <input type="date" class="form-control" name="tgl_dok">
                    </div>
                </div>
                <label> Uraian Barang </label>
                <input type="text" class="form-control" name="uraian_barang">
                <div class="row">
                    <div class="col">
                        <label> Jumlah </label>
                        <input type="text" step="any" class="form-control" name="jumlah_barang">
                    </div>
                    <div class="col">
                        <label> Satuan </label>
                        <select class="form-control" name="satuan_barang" placeholder="Pilih Perusahaan Asuransi" data-live-search="true">
                            <?php
                                foreach ($satuan as $s) {
                                    ?>
                                <option value="<?php echo $s->kode ?>"><?php echo $s->kode ?></option>
                            <?php
                                }
                                ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahbarang2<?php echo $i->id_surat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Realisasi 2.6.2 </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('kawasanberikat/realisasi') ?>
                <input type="hidden" name="id_surat" value="<?php echo $i->id_surat ?>">
                <input type="hidden" name="jns_dok" value="2">
                <div class="row">
                    <div class="col">
                        <label> Nomor Dokumen </label>
                        <input type="text" class="form-control" name="no_dok">
                    </div>
                    <div class="col">
                        <label> Tgl Dokumen </label>
                        <input type="date" class="form-control" name="tgl_dok">
                    </div>
                </div>
                <label> Uraian Barang </label>
                <input type="text" class="form-control" name="uraian_barang">
                <div class="row">
                    <div class="col">
                        <label> Jumlah </label>
                        <input type="text" class="form-control" name="jumlah_barang">
                    </div>
                    <div class="col">
                        <label> Satuan </label>
                        <select class="form-control" name="satuan_barang" placeholder="Pilih Perusahaan Asuransi" data-live-search="true">
                            <?php
                                foreach ($satuan as $s) {
                                    ?>
                                <option value="<?php echo $s->kode ?>"><?php echo $s->kode ?></option>
                            <?php
                                }
                                ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php endforeach; ?>