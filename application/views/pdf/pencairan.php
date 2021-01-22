<?php			
			$pdf = new TCPDF('P','cm','A4','true');
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->setMargins(2.5,1.5,2.0,2.0);

			$fontname = TCPDF_FONTS::addTTFfont('C:\xampp\htdocs\fix\application\libraries\tcpdf\fonts\Arial.ttf', 'TrueTypeUnicode', '', 96);
			$pdf->SetFont('times','',12);

			$pdf->AddPage();
			ob_start();
			?>
			<head>
				<title>Jaminan Elektronik</title>
			</head>
			<table align="center" border="0" width="100%" height="100%">
				<?php foreach ($jaminan as $s): ?>
				<table align="center" rules="none" border=0 >
					<tr>
						<td width="10%">
						    <img src="<?php echo base_url('assets/images/logo-kemenkeu.png') ?>" width="700px" height="700px"/>
						</td>				
						<td align="center" width="90%">
							<span style="font-size: 13">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</span><br/>
							<span style="font-size: 11">DIREKTORAT JENDERAL BEA DAN CUKAI <br/>
							KANTOR WILAYAH DJBC JAWA BARAT</span><br/>
							<span style="font-size: 13">KPPBC TIPE MADYA PABEAN A BANDUNG </span> <br/>			
							<span style="font-size: 7">JALAN RUMAH SAKIT NO. 167 CINAMBO, BANDUNG 40294<br>
								TELEPON (022) 7810992; FASIMILE (022) 7803558 -7810997; SITUS www.bcbandung.beacukai.go.id<br>
							PUSAT KONTAK LAYANAN: 1500225 SURAT ELEKTRONIK: kppbcbandung@kemenkeu.go.id</span>				
						</td>		
					</tr>
				</table>
				<hr>
				<table align="center" border="0" width="100%" height="100%">
					<table align="left" rules="none" border=0 >
						<tr>				
							<td align="right">
								 <?php $tanggal = $s->tgl_pencairan; echo $this->fungsi->tgl_indo($tanggal);?>
							</td>		
						</tr>
						<tr>
							<td width="50">
								Nomor
							</td>
							<td width="10">
								:
							</td>
							<td>
								<?php echo $s->nomor_pencairan; ?>/SPJ/<?php echo date('Y', strtotime($s->tgl_pencairan)); ?>
							</td>
						</tr>
						<tr>
							<td width="50">
								Sifat
							</td>
							<td width="10">
								:
							</td>
							<td>
								Segera
							</td>
						</tr>
						<tr>
							<td width="50">
								Lampiran
							</td>
							<td width="10">
								:
							</td>
							<td>
								-
							</td>
						</tr>
						<tr>
							<td width="50">
								Hal
							</td>
							<td width="10">
								:
							</td>
							<td>
								Pencairan Jaminan
							</td>
						</tr>
					</table>
					<br><br>
					<table align="left" rules="none" border=0 >
						<tr>
							<td>
								Yth. Pimpinan <?php echo $s->nama_penjamin; ?>
							</td>
						</tr>
						<tr>
							<td>
								di <?php echo $s->alamat_penjamin; ?>
							</td>
						</tr>
					</table>

					<table width="100%">
						<tr>
							<td></td>
						</tr>
						<tr>
							<td align="justify" width="100%">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menunjuk <?php $bentuk =$s->bentuk_jaminan;
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
														echo "Jaminan Lainnya";
														break;
													}
													?>	 yang telah diterbitkan oleh <?php echo $s->nama_penjamin; ?> yang Saudara pimpin dengan nomor <?php echo $s->no_jaminan; ?> tanggal <?php $tanggal = $s->tgl_jaminan; echo $this->fungsi->tgl_indo($tanggal);?>, dengan ini diberitahukan hal-hal sebagai berikut :
							</td>
						</tr>
					</table>	
					<table align="center" width="700" rules="none" border=0  height="10px" class="normal">
						<tr>
							<td width="10">1.</td>
							<td align="left" width="10%">&nbsp; Nama</td>
							<td align="left" width="10">:</td>
							<td align="left"><?php echo $s->nama_tpb; ?></td>
						</tr>
						<tr>
							<td></td>
							<td align="left" width="10%">&nbsp;&nbsp;NPWP</td>
							<td align="left" width="10">:</td>
							<td align="left" width="55%"><?php echo $s->npwp_tpb; ?></td>
						</tr>
						<tr>
							<td></td>
							<td align="left" width="10%">&nbsp;&nbsp;Alamat</td>
							<td align="left" width="10">:</td>
							<td align="left"><?php echo $s->alamat_tpb; ?></td>
						</tr>
						<tr>
							<td align="left" colspan="4" width="95%">&nbsp;&nbsp;&nbsp;&nbsp;Hingga saat ini tidak memenuhi kewajiban pabean atas S-<?php echo $s->no_surat ?>/WBC.09/KPP.MP.04/2019</td>
						</tr>
					</table>
					<br><br>
					<table align="center" width="100%" rules="none" border=0  height="10px" class="normal">
						<tr>
							<td width="10">2.</td>
							<td align="justify" width="100%">Bahwa sehubungan dengan butir 1, sesuai dengan Pasal 27 Peraturan Menteri Keuangan Nomor 259/PMK.04/2010 tentang Jaminan Dalam Rangka Kepabeanan, diminta kepada Saudara untuk mencairkan <?php $bentuk =$s->bentuk_jaminan;
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
														echo "Jaminan Lainnya";
														break;
													}
													?> Saudara dan menyetor uang hasil pencairan tersebut ke rekening Kas Negara dalam jangka waktu paling lama 6 (enam) hari kerja sejak tanggal diterimanya Surat Pencairan Jaminan ini dengan rincian sebagai berikut :</td>
						</tr>
					</table>
					<br><br>					
					<table width="100%" border="1" align="center">
						<tr>
							<td width="20">No</td>
							<td>Kode Kantor</td>
							<td width="150">Dokumen Dasar Pembayaran</td>
							<td width="60">Akun</td>
							<td width="60">Kode Akun</td>
							<td width="100">Jumlah Pembayaran</td>
						</tr>
						<tr>
							<td width="20" rowspan="4">1</td>
							<td rowspan="4">050500</td>
							<td rowspan="4">Surat Persetujuan Subkontrak</td>
							<td>Bea Masuk</td>
							<td>412111</td>
							<td><?php $angka = $s->bea_masuk;
								echo $this->fungsi->rupiah($angka); ?></td>
						</tr>
						<tr>
							<td>PPN</td>
							<td>411212</td>
							<td><?php $angka = $s->ppn;
								echo $this->fungsi->rupiah($angka); ?></td>
						</tr>
						<tr>
							<td>PPh Psl 22</td>
							<td>411123</td>
							<td><?php $angka = $s->pph;
								echo $this->fungsi->rupiah($angka); ?></td>
						</tr>
						<tr>
							<td>Denda</td>
							<td>412113</td>
							<td><?php $angka = $s->denda;
								echo $this->fungsi->rupiah($angka); ?></td>
						</tr>
						<tr>
							<td colspan="5">Jumlah Pembayaran Penerimaan Negara</td>
							<td><?php $angka = $s->bea_masuk + $s->ppn + $s->pph + $s->denda; 
							    echo $this->fungsi->rupiah($angka); ?></td>
						</tr>	
					</table>
					<br><br>
					<table align="center" width="100%" rules="none" border=0  height="10px" class="normal">
						<tr>
							<td width="10">3.</td>
							<td align="justify" width="100%">Dalam hal terdapat selisih nilai jaminan dengan total nilai jaminan yang harus dicairkan dan disetorkan ke Kas Negara sebagaimana tersebut pada angka 2, maka menjadi hak <?php echo $s->nama_tpb; ?>.</td>
						</tr>
					</table>
					<br><br>
					<table align="center" width="100%" rules="none" border=0  height="10px" class="normal">
						<tr>
							<td width="10">4.</td>
							<td align="justify" width="100%">Bahwa <?php $bentuk =$s->bentuk_jaminan;
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
														echo "Jaminan Lainnya";
														break;
													}
													?> Saudara akan kami kembalikan setelah pencairan sebagaimana dimaksud pada butir 2 dilaksanakan dan dibuktikan dengan Surat Setoran Pabean, Cukai, dan Pajak (SSPCP) yang telah mendapat Nomor Tanda Penerimaan Negara (NTPN).</td>
						</tr>
					</table>
					<br><br>
					<table align="center" width="100%" rules="none" border=0  height="10px" class="normal">
						<tr>
							<td width="10">5. </td>
							<td align="left" width="90%">Apabila Saudara tidak melaksanakan pencairan sebagaimana dimaksud pada butir 2, maka :</td>
						</tr>
						<tr>
							<td></td>
							<td align="left" width="100%">&nbsp;&nbsp;a. kegiatan kepabeanan oleh Terjamin tidak dilayani,</td>
						</tr>
						<tr>
							<td></td>
							<td align="left" width="100%">&nbsp;&nbsp;b. penerbitan jaminan berikutnya tidak dilayani,</td>
						</tr>
						<tr>
							<td></td>
							<td align="left" width="100%">&nbsp;&nbsp;c. tagihan piutang selanjutnya akan diproses sesuai dengan ketentuan peraturan perundang-undangan tentang penagihan pajak dengan surat paksa.</td>
						</tr>
						<br/>	
						<tr>
							<td colspan="2" align="left">Demikian disampaikan untuk menjadi perhatian.</td>
						</tr>
					</table>
					<br><br>
					<table align=center>
						<tr>
							<td>
								
							</td>
							<td  align="justify" >
								a.n Kepala Kantor
								<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Seksi Perbendaharaan
								
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
								<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Harmiyarsyah
								<br/>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP
							</td>
						</tr>
					</table>
					<br/><br/><br/><br/>
					<table align="left" width="100%" rules="none" border=0  height="10px" class="normal">
						<tr>
							<td>Tembusan :</td>
						</tr>
						<tr>
							<td>1. Direktur Jenderal Bea dan Cukai u.p. Direktur PPS</td>
						</tr>
						<tr>
							<td>2. Kepala Kantor Wilayah DJBC Jawa Barat</td>
						</tr>
						<tr>
							<td>3. Pimpinan <?php echo $s->nama_tpb; ?></td>
						</tr>
					</table>
				</table>
			<?php endforeach; ?>
			</table>

			<?php
			$content = ob_get_contents();
		ob_end_clean();
	$pdf->writeHTML($content, true, false, true, false, '');
	$pdf->Output('example_006.pdf', 'I');
	?>