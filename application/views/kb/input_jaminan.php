      <div class="content">
      	<div class="container-fluid">
      		<div class="row">
      			<div class="col-md-6">
      				<div class="card">
      					<div class="card-header card-header-primary">
      						<h4 class="card-title ">Detail Pengajuan</h4>
      						<?php foreach ($surat as $surat) : ?>
      							<p class="card-category">
      							    <div class='badge badge-danger'><?php echo $this->session->flashdata('message'); ?></div>
      							</p>
      					</div>
      					<div class="card-body">
      						<div class="table-responsive">
      							<table class="table">
      								<thead class=" text-primary">
      								</thead>
      								<tbody>
      									<tr>
      										<td width="150">
      											No. Surat
      										</td>
      										<td>
      											:
      										</td>
      										<td>
      											S-<?php echo $surat->no_surat; ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($surat->tgl_surat)); echo $tahun ?>
      										</td>
      									</tr>
      									<tr>
      										<td>
      											Tanggal Surat
      										</td>
      										<td>
      											:
      										</td>
      										<td>
      											<?php $tanggal = $surat->tgl_surat;
														echo $this->fungsi->tgl_indo($tanggal); ?>
      										</td>
      									</tr>
      									<tr>
      										<td>
      											Jatuh Tempo
      										</td>
      										<td>
      											:
      										</td>
      										<td>
      											<?php $tanggal = $surat->jth_tempo;
														echo $this->fungsi->tgl_indo($tanggal); ?>
      										</td>
      									</tr>
      								</tbody>
      							</table>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      		<div class="row">
      			<div class="col-md-12">
      				<div class="card">
      					<div class="card-header card-header-primary">
      						<h4 class="card-title ">Detail Pengajuan Jaminan</h4>
      						<p class="card-category"></p>
      					</div>
      					<div class="card-body">
      						<div class="form-group">
      							<label for="name">Bentuk Jaminan*</label>
      							<select id="bentuk" class="form-control " name="bentuk_jaminan" required>
      								<option readonly="">--Pilih Bentuk Jaminan--</option>
      								<option value="customs_bond">Customs Bond</option>
      								<option value="tunai">Tunai</option>
      								<option value="bank_garansi">Bank Garansi</option>
      								<option value="jam_per">Jaminan Perusahaan</option>
      								<option value="jam_la">Jaminan Lainnya</option>
      							</select>
      						</div>

      						<div id="customs_bond" hidden>
      							<div class="form-group">
      								<?php echo form_open("kawasanberikat/input_jaminan_act") ?>
      								<input type="hidden" name="id_surat" value="<?php echo $surat->id_surat ?>" />
      								<input type="hidden" name="status" value="4" />
      								<input type="hidden" name="id_tpb" value="<?php echo $this->session->userdata('id') ?>" />
      								<input type="hidden" name="bentuk_jaminan" value="1" />
      								<label for="name">Perusahaan Asuransi*</label>
      								<select class="form-control select2" onchange="myFunction();" id="slc_asu" name="id_penjamin" id="penjamin" placeholder="Pilih Perusahaan Asuransi" required>
      									<option value="" selected>--Pilih Perusahaan Asuransi--</option>
      									<?php
												foreach ($penjamin as $p) {
													?>
      										<option data-con="<?php echo $p->telegram_id; ?>" value="<?php echo $p->id_penjamin ?>"><?php echo $p->nama_penjamin ?></option>
      									<?php
												}
												?>
      								</select>
      							</div>
      							<div class="form-group">
      								<label for="name">Nilai Jaminan yang Diajukan*</label>
      								<input type="text" class="form-control" value="<?php $angka = $surat->nilai;
																							echo $this->fungsi->rupiah($angka); ?>" name="nilai_jaminan" disabled />
      								<span>*Pastikan nilai jaminan sesuai dengan surat persetujuan</span>
      							</div>
      							<div class="form-group">
      								<label for="masukkanPesan">Jatuh Tempo Jaminan</label>
      								<input type="date" class="form-control" name="jth_tempo" value="<?php echo $surat->jth_tempo ?>" disabled />
      								<input type="hidden" name="telegram_id" placeholder="Telegram ID">
      								<input type="hidden" name="kaber" value="<?php echo $this->session->userdata('nama') ?>" placeholder="Custom Text Message">
      								<input type="hidden" name="nosurat" value="<?php echo $surat->no_surat ?>/WBC.09/KPP.MP.04/2019" placeholder="Custom Text Message">
      							</div>
      							<input class="btn btn-success" type="submit" name="btn" value="Ajukan Jaminan" />
      							<?php echo form_close(); ?>
      						</div>

      						<div id="tunai" hidden>
      							<div class="form">
      								<span>Silahkan melakukan pembayaran ke rekening Bendahara Penerimaan:<br />
      									No. Rekening : 163801000002305 <br />
      									Nama Rekening : RPL022 KPPBC TMP A BDG UTK JAMINAN TUNAI <br />
      									Jumlah Pembayaran : <?php $angka = $surat->nilai;
																	echo $this->fungsi->rupiah($angka); ?> <br />
      								</span>
      								<?php echo form_open("kawasanberikat/input_jaminan_act") ?>
      								<input type="hidden" name="bentuk_jaminan" value="2" />
      								<input type="hidden" name="id_surat" value="<?php echo $surat->id_surat ?>" />
      								<input type="hidden" name="id_tpb" value="<?php echo $this->session->userdata('id') ?>" />
      								<input type="hidden" name="status" value="12" />
      								<input type="hidden" value="<?php echo $surat->nilai ?>" name="nilai_jaminan" />
      								<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
      								<?php echo form_close(); ?>
      							</div>
      						</div>

      						<div id="bank_garansi" hidden>
      							<span>Silahkan datang ke KPPBC TMP A Bandung untuk menyerahkan dokumen kelengkapan Bank Garansi</span>
      							<?php echo form_open("kawasanberikat/input_jaminan_act") ?>
      							<input type="hidden" name="bentuk_jaminan" value="3" />
      							<input type="hidden" name="id_surat" value="<?php echo $surat->id_surat ?>" />
      							<input type="hidden" name="id_tpb" value="<?php echo $this->session->userdata('id') ?>" />
      							<input type="hidden" name="status" value="13" />
      							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
      							<?php echo form_close(); ?>
      						</div>

      						<div id="jam_per" hidden>
      							<span>Silahkan datang ke KPPBC TMP A Bandung untuk menyerahkan dokumen kelengkapan Jaminan Perusahaan</span>
      							<?php echo form_open("kawasanberikat/input_jaminan") ?>
      							<input type="hidden" name="bentuk_jaminan" value="3" />
      							<input type="hidden" name="id_surat" value="<?php echo $surat->id_surat ?>" />
      							<input type="hidden" name="id_tpb" value="<?php echo $this->session->userdata('id') ?>" />
      							<input type="hidden" name="status" value="14" />
      							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
      							<?php echo form_close(); ?>
      						</div>

      						<div id="jam_la" hidden>
      							<span>Silahkan datang ke KPPBC TMP A Bandung untuk menyerahkan dokumen kelengkapan Jaminan Lainnya</span>
      							<?php echo form_open("kawasanberikat/input_jaminan") ?>
      							<input type="hidden" name="bentuk_jaminan" value="3" />
      							<input type="hidden" name="id_surat" value="<?php echo $surat->id_surat ?>" />
      							<input type="hidden" name="id_tpb" value="<?php echo $this->session->userdata('id') ?>" />
      							<input type="hidden" name="status" value="15" />
      							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
      							<?php echo form_close(); ?>
      						</div>
      						<br />
      					</div>
      				<?php endforeach; ?>
      				</div>
      			</div>
      		</div>
      		<button onclick="goBack()" class="btn btn-danger">Go Back</button>
      	</div>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script type='text/javascript'>
      	$(window).load(function() {
      		$("#bentuk").change(function() {
      			console.log($("#bentuk option:selected").val());
      			if ($("#bentuk option:selected").val() == 'customs_bond') {
      				$('#customs_bond').prop('hidden', false);
      				$('#jam_per').prop('hidden', 'true');
      				$('#jam_la').prop('hidden', 'true');
      				$('#tunai').prop('hidden', 'true');
      				$('#bank_garansi').prop('hidden', 'true');
      			} else if ($("#bentuk option:selected").val() == 'tunai') {
      				$('#tunai').prop('hidden', false);
      				$('#customs_bond').prop('hidden', 'true');
      				$('#jam_per').prop('hidden', 'true');
      				$('#jam_la').prop('hidden', 'true');
      				$('#bank_garansi').prop('hidden', 'true');
      			} else if ($("#bentuk option:selected").val() == 'bank_garansi') {
      				$('#bank_garansi').prop('hidden', false);
      				$('#customs_bond').prop('hidden', 'true');
      				$('#tunai').prop('hidden', 'true');
      				$('#jam_per').prop('hidden', 'true');
      				$('#jam_la').prop('hidden', 'true');
      			} else if ($("#bentuk option:selected").val() == 'jam_per') {
      				$('#jam_per').prop('hidden', false);
      				$('#customs_bond').prop('hidden', 'true');
      				$('#tunai').prop('hidden', 'true');
      				$('#bank_garansi').prop('hidden', 'true');
      				$('#jam_la').prop('hidden', 'true');
      			} else {
      				$('#jam_la').prop('hidden', false);
      				$('#jam_per').prop('hidden', 'true');
      				$('#customs_bond').prop('hidden', 'true');
      				$('#tunai').prop('hidden', 'true');
      				$('#bank_garansi').prop('hidden', 'true');
      			}
      		});
      	});
      </script>
      <script>
      	function myFunction() {

      		var index = document.getElementById("slc_asu").selectedIndex;
      		//alert(index);
      		var con = document.getElementById("slc_asu").options[index].getAttribute("data-con");
      		document.getElementsByName("telegram_id")[0].value = con;
      	}
      </script>
      
      <script>
        function validasi(){
          var penjamin = document.getElementById('penjamin');
 
          if (harusDiisi(penjamin, "PENJAMIN belum dipilih")) {
            return true;
          };
            return false;
          }
        function harusDiisi(att, msg){
            if (att.value.length == 0) {
                alert(msg);
                att.focus();
                return false;
            }
 
      return true;
      }
   </script>