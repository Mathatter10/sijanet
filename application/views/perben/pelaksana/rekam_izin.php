<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title"><i class="material-icons">note_add</i>&nbsp Rekam Izin</h4>
          <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
          <form action="<?php echo site_url('perbenpelaksana/rekam_izin_act')?>" method="post">
            <input type="hidden" name="status" value="23">
            <?php
              foreach ($last as $l) {
            ?>
              <input type="hidden" name="id_surat" value="<?php echo $l->id_surat+1; ?>">
            <?php
              }
            ?>
            <div class="row">
              <div class="col-md-6">
                  <label>Nomor Surat Permohonan</label>
                  <input type="text" class="form-control" name="permohonan" required="required">
              </div>
             </div> 
            <div class="row">
              <div class="col-md-6">
                <label>Nomor Surat Persetujuan</label>
                <input type="text" class="form-control" name="no_surat" required="required">
              </div>
              <div class="col-md-6">
                <label>Tanggal Surat Persetujuan</label>
                <input type="date" class="form-control" name="tgl_surat" placeholder="" required="required">
              </div>
            </div>
            <div>
              <label>Seksi Penerbit</label>
              <select name="pkc" id="slc_nama" class="form-control" data-live-search="true" required="required">
                <option disabled selected value> -- Seksi Penerbit -- </option>
                <?php
                foreach ($bckasi as $p) {
                    ?>
                <option data-subtext="<?php echo $p->nama_bc; ?>" value="<?php echo $p->pkc; ?>"><?php echo $p->keterangan; ?> | <?php echo $p->nama_bc; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Nama Pengusaha</label>
                <select name="id_tpb" id="slc_nama" class="form-control" data-live-search="true" required="required">
                  <option disabled selected value> -- Pilih Nama Pengusaha -- </option>
                  <?php foreach ($tpbdetail as $p) { ?>
                  <option value="<?php echo $p->id_tpb; ?>"><?php echo $p->nama_tpb; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6">
                <label>Dalam Rangka</label>
                <select name="kegiatan" id="slc_kegiatan" class="form-control" data-live-search="true" required="required">
                  <option value="">-- Pilih Impor -- </option>
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
            <div class="row">
              <div class="col-md-6">
                <label>Nilai Jaminan</label>
                <input type="text" class="form-control" name="nilai" placeholder="" required="required">
              </div>
              <div class="col-md-6">
                <label>Tanggal Jatuh Tempo</label>
                <input type="date" class="form-control" name="jth_tempo" placeholder="" required="required">
              </div>
            </div>
            <div>
              <label>Perusahaan Tujuan</label>
              <input type="text" name="tujuan" class="form-control" placeholder="" required="required">
            </div>

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"  ><i class="fa fa-fw fa-lg fa-save"></i>Rekam Surat Persetujuan</button>
              <a class="btn btn-secondary" href="<?php echo site_url('perbenpelaksana') ?>"><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Kembali</a>
              <a class="btn btn-info" style="float: right;" href="<?php echo site_url('perbenpelaksana/rekam_perusahaan') ?>"><i class="fa fa-fw fa-lg fa-building-o"></i>Rekam Pengusaha</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>