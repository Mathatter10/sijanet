<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="card-icon">
                                <i class="material-icons">edit</i>
                            </div>
                            <?php
                            foreach ($data_izin as $s) {
                                ?>
                            Edit Surat Persetujuan No. S- <?php echo $s->no_surat . 'WBC.09/KPP.MP.04/'; echo date('Y'); ?>
                        </div>
                        <div class="card-body">
                                <form action="<?php echo base_url() . 'index.php/pelaksana/ubah_jaminan_act'; ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">No. Surat Persetujuan</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <input type="number" id="txt_noubah" name="txt_noubah" placeholder="No. Surat Persetujuan" value="<?php echo $s->no_surat; ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">Tanggal Surat</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <input type="date" name="txt_tglubah" value="<?php echo strftime('%Y-%m-%d', strtotime($s->tgl_surat)); ?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">Seksi Penerbit</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <select class="selectpicker form-control" name="opt_seksiubah" id="slc_seksiubah" data-size="7" data-show-subtext="true" data-live-search="true" required="required">
                                                                <option selected value="<?php echo $s->pkc; ?>"><?php echo $s->keterangan; ?></option>
                                                                <?php
                                                                    foreach ($bckasi as $p) {
                                                                        ?>
                                                                    <option data-subtext="<?php echo $p->nama_bc; ?>" value="<?php echo $p->pkc; ?>"><?php echo $p->keterangan; ?> |</option>
                                                                <?php
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">Nama Perusahaan</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <select name="opt_namaperubah" id="slc_namaperubah" class="form-control selectpicker" data-live-search="true" onchange="myFunction();" required="required">
                                                                <option selected value="<?php echo $s->id_tpb; ?>"><?php echo $s->nama_tpb; ?></option>
                                                                <?php
                                                                    foreach ($tpbdetail as $t) {
                                                                        ?>
                                                                    <option value="<?php echo $t->id_tpb; ?>"><?php echo $t->nama_tpb; ?></option>
                                                                <?php
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">Dalam Rangka</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <select name="opt_kegiatanubah" id="slc_kegiatanubah" class="form-control selectpicker" data-live-search="false" required="required">
                                                                <?php
                                                                    foreach ($kegiatan as $g) {
                                                                        ?>
                                                                    <option value="<?php echo $g->id; ?>"><?php echo $g->ket_giat; ?></option>
                                                                <?php
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">

                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">Nilai Jaminan</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <input type="text" id="nilai" name="txt_nilaiubah" class="form-control" placeholder="Nilai Jaminan Dalam Rupiah" value="<?php echo $s->nilai; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">Tanggal Jatuh Tempo</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <input type="date" name="txt_tempoubah" value="<?php echo strftime('%Y-%m-%d', strtotime($s->jth_tempo)); ?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">Perusahaan Tujuan</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <input type="text" name="txt_tujuanubah" class="form-control" value="<?php echo $s->tujuan; ?>" placeholder="Perusahaan Tujuan Pengeluaran Sementara" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-md-3 col-form-label">Keterangan</label>
                                                    <div class="col-md-9">
                                                        <div class="form-group has-default">
                                                            <textarea name="txt_keteranganubah" class="form-control" rows="4" placeholder="Silakan Masukkan Alasan Perubahan Data" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                    <div style="text-align: center;">
                                        <p class="text-danger"><strong>Pastikan data telah sesuai. Jaminan yang telah diajukan ke pihak Penjamin oleh Perusahaan tidak dapat diubah.*</strong></p>
                                        <input type="hidden" name="txt_idsurat" value="<?php echo $s->id_surat; ?>" required="required">
                                        <input type="hidden" name="txt_aktifitas" value="Ubah Data Surat Persetujuan Jaminan" required="required">
                                        <input type="hidden" name="txt_operator" value="<?php echo $this->session->userdata('nama'); ?>" required="required">
                                    </div>
                                    <button class="btn btn-default" onclick="location.href='<?php echo base_url() . 'index.php/pelaksana/detail/'.$s->id_surat; ?>';">Batal</button>
                                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>