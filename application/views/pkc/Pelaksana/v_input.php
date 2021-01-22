<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="card-icon">
                                <i class="material-icons">input</i>
                            </div>
                            Input Surat Persetujuan
                            <div class='badge badge-danger'><?php echo $this->session->flashdata('message'); ?></div>
                        </div>
                        <div class="card-body">

                            <form action="<?php echo base_url() . 'index.php/pelaksana/tambah_jaminan_act'; ?>" method="post">

                                <div class="row">
                                    <div class="col-md-9 ml-auto mr-auto">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating">No. Surat Permohonan</label>
                                            <input type="text" name="txt_permohonan" id="txt_permohonan" class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">No. Surat Persetujuan</label>
                                                <div class="col-md-9">
                                                    <div class="form-group has-default">
                                                        <input type="number" name="txt_no" id="n1" onkeyup="sync()" placeholder="No. Surat Persetujuan" required autocomplete="off" class="form-control">
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
                                                        <input type="date" id='datepicker1' name="txt_tgl" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">Seksi Penerbit</label>
                                                <div class="col-md-9">
                                                    <div class="form-group has-default">
                                                        <select class="selectpicker form-control" name="opt_pkc" id="slc_pkc" data-size="7" data-show-subtext="true" data-live-search="true" required="required">
                                                            <option disabled selected> -- Pilih Seksi PKC -- </option>
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
                                                        <select name="opt_nama" id="slc_nama" class="form-control selectpicker" data-live-search="true" onchange="myFunction();" required="required">
                                                            <option disabled selected> -- Pilih Nama Perusahaan -- </option>
                                                            <?php
                                                            foreach ($tpbdetail as $t) {
                                                                ?>
                                                                <option data-con="<?php echo $t->telegram_id; ?>" value="<?php echo $t->id_tpb; ?>"><?php echo $t->nama_tpb; ?></option>
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
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">Dalam Rangka</label>
                                                <div class="col-md-9">
                                                    <div class="form-group has-default">
                                                        <select name="opt_kegiatan" id="slc_kegiatan" class="form-control selectpicker" data-live-search="false" required="required">
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
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">Nilai Jaminan</label>
                                                <div class="col-md-9">
                                                    <div class="form-group has-default">
                                                        <input type="text" id="nilai" name="txt_nilai" class="form-control" placeholder="Nilai Jaminan Dalam Rupiah" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">Tanggal Jatuh Tempo</label>
                                                <div class="col-md-9">
                                                    <div class="form-group has-default">
                                                        <input type="date" name="txt_tempo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label">Perusahaan Tujuan</label>
                                                <div class="col-md-9">
                                                    <div class="form-group has-default">
                                                        <input type="text" name="txt_tujuan" class="form-control" placeholder="Perusahaan Tujuan Pengeluaran Sementara" autocomplete="off" required>
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
                                    <input type="hidden" name="txt_status" value="1">
                                    <input type="hidden" name="telegram_id" placeholder="Telegram ID">
                                    <input type="hidden" name="message_text" id="n2" placeholder="Custom Text Message">
                                    <input type="hidden" name="staff" value="<?php echo $this->session->userdata('jabatan'); ?>" placeholder="Custom Text Message">
                                </div>
                                <button class="btn btn-default" onclick="location.href='<?php echo base_url() . 'index.php/pelaksana/list_jaminan'; ?>';">Batal</button>
                                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {

        var index = document.getElementById("slc_nama").selectedIndex;
        //alert(index);
        var con = document.getElementById("slc_nama").options[index].getAttribute("data-con");
        document.getElementsByName("telegram_id")[0].value = con;
    }
</script>
<script>
    function sync() {
        var n1 = document.getElementById('n1');
        var n2 = document.getElementById('n2');
        n2.value = n1.value;
    }
</script>