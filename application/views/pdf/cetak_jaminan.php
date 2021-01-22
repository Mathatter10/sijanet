<?php			
			$pdf = new TCPDF('P','cm','A4','true');
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->setMargins(0.5,0.5,0.5,0);
			$pdf->SetFont('times', '', 10);

			$pdf->AddPage();
			ob_start();
			?>
			<?php foreach($jaminan as $j): ?>
				<?php $a = site_url('createpdf/QRcode/'.$j->no_jaminan); ?>
			<head>
				<title>Jaminan Elektronik</title>
			</head>
			<table align="center" border="1" width="100%" height="100%">
			<table align="center" rules="none" border=0 >
				<tr>				
					<td align="center">
						<b>CUSTOMS BOND<br/>
						NOMOR: <?php echo $j->no_jaminan; ?></b>
					</td>		
				</tr>
			</table>
			<table align="center" width="700" rules="none" border=0  height="10px" class="normal">
				<tr>
					<td></td>
				</tr>
				<tr>
					<td align="left" width="46%">&nbsp; 1. Yang bertanda tangan di bawah ini, kami :</td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;     a. Nama</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->nama_ttd ?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		b. Jabatan</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->jabatan_ttd ?></td>
				</tr>
			</table>
			<table align="center" width="700" rules="none" border=0 class="normal">
				<tr>
					<td align="left" width="46%">&nbsp; 2. Dalam hal ini bertindak dan atas nama :</td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		a. Nama Perusahaan</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->nama_penjamin ?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		b. Berkedudukan di</td>
					<td align="left" width="10">:</td>
					<td align="left">Bandung</td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		c. NPWP</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->npwp_penjamin ?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		d. Alamat</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->alamat_penjamin ?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		e. Telepon</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->telepon?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		f. Faksimili dan email</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->faksimili?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		yang selanjutnya disebut <i>Surety</i>,</td>
					<td align="left" width="10">:</td>
					<td align="left"></td>
				</tr>
			</table>
			<table align="center" width="700" rules="none" border=0 class="normal">
				<tr height="10px">
					<td align="left" width="46%">&nbsp;3. Berjanji dan menjamin :</td>
				</tr>
				<tr height="10px">
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		a. Nama </td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->nama_tpb?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		b. NPWP</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->npwp_tpb?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;	c. Alamat</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->alamat_tpb?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		d. Telepon</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->telepon_tpb?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		e. Faksimili dan Email</td>
					<td align="left" width="10">:</td>
					<td align="left"><?php echo $j->faksimili_tpb?></td>
				</tr>
				<tr>
					<td align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;		yang selanjutnya disebut <i>Principal</i>,</td>
					<td align="left" width="10"></td>
					<td align="left"></td>
				</tr>
			</table>
			<table width="95%">
				<tr>
					<td></td>
				</tr>
				<tr><td width="2%"></td>
				<td align="justify" width="100%">
					    <?php if($j->revisi == '1'){ foreach($revisi as $r):?>
                    &nbsp;&nbsp;&nbsp;dengan melepaskan hak istimewa untuk menuntut supaya barang-barang <i>Principal</i> lebih dahulu disita dan dijual untuk melunasi hutang-hutangnya yang oleh undang-undang diberikan kepada <i>Surety</i> sesuai dengan Pasal 1832 Kitab Undang-Undang Hukum Perdata, termasuk juga haknya untuk terlebih dahulu mendapat pembayaran piutang, uang paling banyak sebesar <b><?php $angka = $r->nilai_rev; echo $this->fungsi->rupiah($angka);?></b> (<i><?php $nilai = $r->nilai_rev; echo $this->fungsi->terbilang($nilai);?> Rupiah</i>) untuk penjaminan kegiatan di bidang kepabeanan berupa <b><?php echo $j->ket_giat?></b> dengan surat persetujuan No. Surat Izin / Tanggal : <b>S-<?php echo $r->no_rev ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($r->tgl_surat)); echo $tahun ?></b> tanggal <?php $tanggal = $r->tgl_rev; echo $this->fungsi->tgl_indo($tanggal);?> yang dilakukan oleh <i>Principal</i> pada KPPBC TIPE MADYA PABEAN A BANDUNG (yang selanjutnya disebut <i>Obligee</i>). <?php endforeach; } else { ?>
					&nbsp;&nbsp;&nbsp;dengan melepaskan hak istimewa untuk menuntut supaya barang-barang <i>Principal</i> lebih dahulu disita dan dijual untuk melunasi hutang-hutangnya yang oleh undang-undang diberikan kepada <i>Surety</i> sesuai dengan Pasal 1832 Kitab Undang-Undang Hukum Perdata, termasuk juga haknya untuk terlebih dahulu mendapat pembayaran piutang, uang paling banyak sebesar <b><?php $angka = $j->nilai; echo $this->fungsi->rupiah($angka);?></b> (<i><?php $nilai = $j->nilai; echo $this->fungsi->terbilang($nilai);?> Rupiah</i>) untuk penjaminan kegiatan di bidang kepabeanan berupa <b><?php echo $j->ket_giat?></b> dengan surat persetujuan No. Surat Izin / Tanggal : <b>S-<?php echo $j->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?></b> tanggal <?php $tanggal = $j->tgl_surat; echo $this->fungsi->tgl_indo($tanggal);?> yang dilakukan oleh <i>Principal</i> pada KPPBC TIPE MADYA PABEAN A BANDUNG (yang selanjutnya disebut <i>Obligee</i>). <?php } ?>
					<p>&nbsp;&nbsp;&nbsp;	Klaim atas <i>Customs Bond</i> ini harus telah selesai diajukan oleh <i>Obligee</i> dan diterima oleh <i>Surety</i> dalam jangka waktu paling lama 30 (tiga puluh) hari sejak tanggal jatuh tempo <i>Customs Bond</i> ini dengan menggunakan Surat Pencairan Jaminan.</p>
					<p>&nbsp;&nbsp;&nbsp;	Klaim Jaminan secara sebagian dari nilai <i>Customs Bond</i> dan berulang kali dibolehkan, sepanjang nilai pembyaran total yang telah dilakukan oleh <i>Surety</i> tidak melebihi nilai <i>Customs Bond</i> ini sebesar nilai yang telah dibayarkan.</p>
					<p>&nbsp;&nbsp;&nbsp;	Pembayaran atas klaim <i>Customs Bond</i> dilakukan paling lama 6 (enam) hari kerja sejak tanggal diterimanya Surat Pencairan Jaminan dengan ketentuan disetorkan ke Kas Negara sejumlah yang tertera dalam Surat Pencairan Jaminan.</p>
					<p>&nbsp;&nbsp;&nbsp;	Apabila sampai dengan jatuh tempo klaim <i>Customs Bond</i>, <i>Surety</i> tidak menerima Surat Pencairan Jaminan dari <i>Obligee</i>, <i>Surety</i> tidak bertanggung jawab lagi atas pembayaran dimaksud (batal demi hukum tanpa menghilangkan tagihan negara kepada <i>Principal</i>). </p>
					<p>&nbsp;&nbsp;&nbsp;	Penyesuaian jaminan hanya dapat dilakukan setelah mendapat persetujuan Kepala Kantor Pabean.</p>
					<p>&nbsp;&nbsp;&nbsp;	<i>Customs Bond</i> ini berlaku terhitung mulai tanggal <?php $tanggal = $j->tgl_surat; echo $this->fungsi->tgl_indo($tanggal);?> sampai dengan tanggal <?php $tanggal = $j->jth_tempo; echo $this->fungsi->tgl_indo($tanggal);?> (jatuh tempo <i>Customs Bond</i>).</p>
					<p>Dibuat dan ditandatangani di BANDUNG pada tanggal <?php $tanggal = $j->tgl_jaminan; echo $this->fungsi->tgl_indo($tanggal);?> </p>
					</td>
				</tr>
			</table>
				<table align=center>
				<tr>
					<td>
						
					</td>
					<td  align="justify" >
					    <br/>
						Bandung, <?php $tanggal = $j->tgl_jaminan; echo $this->fungsi->tgl_indo($tanggal);?>
						<br/>
						PENJAMIN
						<br/>
						<?php echo $j->nama_penjamin?>
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
						<?php echo $j->nama_ttd?>
						<br/>
						<?php echo $j->jabatan_ttd?>
					</td>
				</tr>
				</table>
			</table>

		<?php endforeach;
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
		?>
			<?php
			$content = ob_get_contents();
		ob_end_clean();
	$pdf->writeHTML($content, true, false, true, false, '');
	$pdf->Output('E-Jaminan.pdf', 'I');
	?>