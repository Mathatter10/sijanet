<?php			
			$pdf = new TCPDF('P','cm','A4','true');
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->setMargins(2,2,2,0);
			$pdf->SetFont('times', '', 10);

			$pdf->AddPage();
			ob_start();
			?>
			<?php foreach($jaminan as $j): ?>
				<?php $a = site_url('createpdf/QRcode/'.$j->nomor_bpj); ?>
		<head>
			<title>E-BPJ</title>
			<style type="text/css">
				.font1 { font: 10px; }
				.spasi {line-height: 20px;}
				.border {border : 1px solid black;}
			</style>
		</head>	
		<table width="100%" border="0">	
			<table align="center" border="1" class="font1">
				<tr>
					<td align="left" style="font-size: 8;">
						<b>KEMENTERIAN KEUANGAN RI</b><br/>
						Direktorat Jenderal Bea dan Cukai<br/>
						KPPBC TMP A Bandung<br/>
						Kode Kantor: 050500
					</td>
					<td align="center" valign="center">
						<b>BUKTI PENERIMAAN JAMINAN<br/>
						&nbsp;<br/>
						&nbsp;<br/>
						NOMOR: <?php echo $j->nomor_bpj; ?>/eBPJ/<?php $bentuk =$j->bentuk_jaminan;
													switch ($bentuk){
														case 1:
														echo "CB";
														break;
														case 2:
														echo "TN";
														break;
														case 3:
														echo "BG";
														break;
														case 4:
														echo "JP";
														break;
														case 5:
														echo "JL";
														break;
													}
													?>			/<?php $tahun = date('Y', strtotime($j->tanggal_bpj)); echo $tahun ?></b>
					</td>
					<td align="left" style="font-size: 8;">
						Lembar ke 1: untuk Pihak yang menyerahkan Jaminan<br/>
						Lembar ke 2: untuk pengeluaran barang /disematkan pada berkas<br/>
						Lembar ke 3: untuk Pejabat Bea dan Cukai /Bendahara Penerimaan
					</td>						
				</tr>
			</table>
			<br/>
			<table align="center" width="100%" class="spasi border">
				<tr border="">
					<td align="left">&nbsp;Jenis Identitas</td>
					<td align="left" colspan="2">: NPWP</td>
				</tr>
				<tr>
					<td align="left">&nbsp;Nomor Identitas</td>
					<td align="left" colspan="2">: <?php echo $j->npwp_tpb; ?></td>
				</tr>
				<tr>
					<td align="left">&nbsp;Nama</td>
					<td align="left" colspan="2">: <?php echo $j->nama_tpb; ?></td>
				</tr>
				<tr class="bawah">
					<td align="left">&nbsp;Alamat</td>
					<td align="left" colspan="2">: <?php echo $j->alamat_tpb; ?></td>
				</tr>
			</table>
			<table align="center" width="100%" class="spasi border">
				<tr>
					<td align="left">&nbsp;Bentuk Jaminan</td>
					<td align="left" colspan="2">: <?php $bentuk =$j->bentuk_jaminan;
													switch ($bentuk){
														case 1:
														echo "Customs Bond";
														break;
														case 2:
														echo "Jaminan Tunai";
														break;
														case 3:
														echo "Jaminan Bank Garansi";
														break;
														case 4:
														echo "Jaminan Perusahaan";
														break;
														case 5:
														echo "Jaminan Lainnya";
														break;
													}
													?>													
					</td>
				</tr>
				<tr>
					<td align="left">&nbsp;Nomor</td>
					<td align="left" colspan="2">: <?php echo $j->no_jaminan; ?></td>
				</tr>
				<tr>
					<td align="left">&nbsp;Tanggal</td>
					<td align="left" colspan="2">: <?php $tanggal = $j->tgl_jaminan;
													echo $this->fungsi->tgl_indo($tanggal);
													 ?></td>
				</tr>
				<tr>
					<td align="left">&nbsp;Penjamin</td>
					<td align="left" colspan="2">: <?php echo $j->nama_penjamin; ?></td>
				</tr>
				<tr>
					<td align="left">&nbsp;Alamat Penjamin</td>
					<td align="left" colspan="2">: <?php echo $j->alamat_penjamin; ?></td>
				</tr>
				<?php if($j->revisi == '1'){ foreach($revisi as $r): ?>
                  <tr>
					<td align="left">&nbsp;Jumlah Jaminan</td>
					<td align="left" colspan="2">: <?php $angka = $r->nilai_rev;
													echo $this->fungsi->rupiah($angka);
												 ?></td>
				</tr>
				<tr>
					<td align="left">&nbsp;Dengan Huruf</td>
					<td align="left" colspan="2">: <?php $nilai = $r->nilai_rev;
													echo $this->fungsi->terbilang($nilai);
													 ?> Rupiah
					</td>
				</tr><?php endforeach; } else { ?>
				<tr>
					<td align="left">&nbsp;Jumlah Jaminan</td>
					<td align="left" colspan="2">: <?php $angka = $j->nilai;
													echo $this->fungsi->rupiah($angka);
												 ?></td>
				</tr>
				<tr>
					<td align="left">&nbsp;Dengan Huruf</td>
					<td align="left" colspan="2">: <?php $nilai = $j->nilai;
													echo $this->fungsi->terbilang($nilai);
													 ?> Rupiah
					</td>
				</tr> <?php } ?>
			</table>
			<table align="center" width="100%" class="spasi border">
				<tr>
					<td align="left">&nbsp;Dokumen sumber &nbsp;penyerahan Jaminan</td>
					<td align="left" colspan="2">: Surat Persetujuan <?php echo $j->ket_giat; ?></td>
				</tr>
				<tr>
					<td align="left">&nbsp;Nomor</td>
					<td align="left" colspan="2">: S-<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?></td>
				</tr>
				<tr>
					<td align="left">&nbsp;Tanggal</td>
					<td align="left" colspan="2">: <?php $tanggal = $j->tgl_surat;
													echo $this->fungsi->tgl_indo($tanggal);
													 ?></td>
				</tr>
			</table>

			<table border="1">
				<tr>
					<td width="50%">
					&nbsp;Catatan Pejabat Bea dan Cukai/&nbsp;Bendahara Penerimaan: <br/>
					&nbsp;&nbsp;<?php echo $j->catatan_teliti; ?>
					<br/><br/>
					&nbsp;Pihak II / TLDDP : <?php echo $j->tujuan; ?> <br/>
					&nbsp;Jatuh Tempo : <?php $tanggal = $j->jth_tempo;
										echo $this->fungsi->tgl_indo($tanggal);
										?>
					</td>
					<td rowspan="2" width="50%"> 
					&nbsp;Bandung, <?php $tanggal = $j->tanggal_bpj;echo $this->fungsi->tgl_indo($tanggal);?><br/>
					&nbsp;Pejabat Bea dan Cukai/Bendahara Penerimaan,<br/>
					&nbsp;<br/>
					&nbsp;<br/>
					&nbsp;<br/>
					&nbsp;<br/>
					&nbsp;<br/>
					&nbsp;<?php echo $j->nama_teliti; ?>
					</td>
				</tr>
				<tr>
					<td> &nbsp;Yang menyerahkan Jaminan
					<br/><br/><br/>
					</td>
				</tr>
			</table>

			<table border="0">
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td width="50">
						<br/>
						<img src="<?php echo $a ?>" width="50" height="50"/>
					</td>
					<td width="450">
						<p>Formulir ini dicetak secara otomatis oleh sistem komputer dan tidak memerlukan tanda tangan pejabat dan cap dinas </p>
					</td>					
				</tr>
			</table>
		</table>
		<?php endforeach;
		/* Fungsi untuk membuat terbilang rupiah -- Start */
		function penyebut($nilai) {
			$nilai = abs($nilai);
			$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			$temp = "";
			if ($nilai < 12) {
				$temp = " ". $huruf[$nilai];
			} else if ($nilai <20) {
				$temp = penyebut($nilai - 10). " Belas";
			} else if ($nilai < 100) {
				$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
			} else if ($nilai < 200) {
				$temp = " Seratus" . penyebut($nilai - 100);
			} else if ($nilai < 1000) {
				$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
			} else if ($nilai < 2000) {
				$temp = " Seribu" . penyebut($nilai - 1000);
			} else if ($nilai < 1000000) {
				$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
			} else if ($nilai < 1000000000) {
				$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
			} else if ($nilai < 1000000000000) {
				$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
			} else if ($nilai < 1000000000000000) {
				$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
			}     
			return $temp;
		}
	 
		function terbilang($nilai) {
			if($nilai<0) {
				$hasil = "minus ". trim(penyebut($nilai));
			} else {
				$hasil = trim(penyebut($nilai));
			}     		
			return $hasil;
		}
		/* Fungsi untuk membuat terbilang rupiah -- End */
	?>	
	<?php 
	$content = ob_get_contents();
	ob_end_clean();
	$pdf->writeHTML($content, true, false, true, false, '');
	$pdf->Output('BPJ.pdf', 'I');
	?>