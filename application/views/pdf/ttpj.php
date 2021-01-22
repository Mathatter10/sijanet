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
			<head>
				<title>Tanda Terima Sementara Jaminan</title>
				<style type="text/css" media="print">
						.page-break  { display:block; page-break-before:always; }
				</style>
			</head>

		<table align="center" width="100%" border="1">	
			<table align="center" border="1">
				<tr>			
					<th align="center" width="80%">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
						DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
						KPPBC TIPE MADYA PABEAN A BANDUNG
					</th>
					<th align="center" width="20%">LEMBAR 1<br/>
					Untuk Pejabat Bea<br/>
					dan Cukai	
					</th>
				</tr>
			</table>
			<br/><br/>
			<table align="center" width="100%">
				<caption><b>TANDA TERIMA PENGEMBALIAN JAMINAN</b></caption><br/>
				<tr>
					<td width="150"></td>
					<td align="left">Nomor Agenda</td>
					<td width="10">:</td>
					<td align="left">eTTPJ-<?php echo $j->nomor_ttpj ?>.<?php $tahun = date('Y', strtotime($j->tanggal_ttpj)); echo $tahun ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left">Tanggal</td>
					<td>:</td>
					<td align="left"><?php $tanggal = $j->tanggal_ttpj;
													echo $this->fungsi->tgl_indo($tanggal);
													 ?></td>
					<td></td>
				</tr>
			</table>
			<br/><br/>
			<table align="center" width="100%" >
				<tr>
					<td align="left">Telah dikembalikan Jaminan kepada Terjamin / Principal*:</td>
				</tr>	
			</table>
			<br/><br/>
			<table align="center" width="100%" >
				<tr>
					<td width="150"></td>
					<td align="left">Bentuk Jaminan</td>
					<td align="center" width="10">:</td>
					<td align="left"><i><?php $bentuk =$j->bentuk_jaminan;
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
													?>	</i></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left">Nomor dan tanggal</td>
					<td align="center" width="10">:</td>
					<td colspan="2" align="left"><?php echo $j->no_jaminan; ?> Tanggal <?php $tanggal = $j->tgl_jaminan;	echo $this->fungsi->tgl_indo($tanggal); ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=200>Nama Terjamin/principal</td>
					<td align="center" width="10">:</td>
					<td align="left" colspan="2"><?php echo $j->nama_tpb ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=200>Nama Penjamin/surety</td>
					<td align="center" width=10>:</td>
					<td align="left" colspan="2"><?php echo $j->nama_penjamin ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=200>Keterangan</td>
					<td align="center" width=10>:</td>
					<td><i></i></td>
					<td></td>
				</tr>
			</table>
			<p></p>
			<table align="center" width="100%">
				<tr>
					<td align="center" width="50%">Yang Menerima Kembali</td>
					<td align="center" width="50%">Yang Mengembalikan</td>
				</tr>
				<tr>
					<td><br/><br/><br/><br/></td>
				</tr>
				<tr>
					<td><?php echo $j->nama_tpb ?></td>
				</tr>
				<tr>
					<td align="center" width="50%"><i></i></td>
					<td align="center" width="50%"><br></td>
				</tr>
			</table>
			<table>
				<tr>
					<td>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>

			
			<table align="center" border="1" width="100%" rules="all">
			<!-- Lembar ke 2 -->
				<tr width="100%">			
					<th align="center" width="80%">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
						DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
						KPPBC TIPE MADYA PABEAN A BANDUNG
					</th>
					<th align="center" width="20%">LEMBAR 2<br/>
					Untuk Terjamin<br/>			
					</th>
				</tr>
			</table>
			<br/><br/>
			<table align=center width="100%">
				<caption><b>TANDA TERIMA PENGEMBALIAN JAMINAN</b></caption><br/>
				<tr>
					<td width="150"></td>
					<td align="left" width=150>Nomor Agenda</td>
					<td align="center" width="10">:</td>
					<td align="left">eTTPJ-<?php echo $j->nomor_ttpj ?>.<?php $tahun = date('Y', strtotime($j->tanggal_ttpj)); echo $tahun ?></td> 
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=150>Tanggal</td>
					<td align="center" width="10">:</td>
					<td align="left"><?php $tanggal = $j->tanggal_ttpj;
													echo $this->fungsi->tgl_indo($tanggal);
													 ?></td>
					<td></td>
				</tr>
			</table>
			<br/><br/>
			<table align="center" width="100%">
				<tr>
					<td align="left">Telah dikembalikan Jaminan kepada Terjamin/Principal*:</td>
				</tr>
			</table>
			<br/><br/>
			<table align="center" width="100%">
				<tr>
					<td width="150"></td>
					<td align="left" width=200>Bentuk Jaminan</td>
					<td align="center" width="10">:</td>
					<td align="left"><i><?php $bentuk =$j->bentuk_jaminan;
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
													?></i></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=200>Nomor dan tanggal</td>
					<td align="center" width="10">:</td>
					<td colspan="2" align="left"><?php echo $j->no_jaminan; ?> Tanggal <?php $tanggal = $j->tgl_jaminan;	echo $this->fungsi->tgl_indo($tanggal); ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=200>Nama Terjamin/principal</td>
					<td align="center" width="10">:</td>
					<td align="left" colspan="2"><?php echo $j->nama_tpb ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=200>Nama Penjamin/surety</td>
					<td align="center" width=10>:</td>
					<td align="left" colspan="2"><?php echo $j->nama_penjamin ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=200>Keterangan</td>
					<td align="center" width=10>:</td>
					<td><i></i></td>
					<td></td>
				</tr>
			</table>
			<p></p>
			<table align="center" width="100%">
				<tr>
					<td align="center" width="50%">Yang Menerima Kembali</td>
					<td align="center" width="50%">Yang Mengembalikan</td>
				</tr>
				<tr>
					<td><br/><br/><br/><br/></td>
				</tr>
				<tr>
					<td><?php echo $j->nama_tpb ?></td>
				</tr>
				<tr>
					<td align="center" width="50%"><i></i></td>
					<td align="center" width="50%"><br></td>
				</tr>
			</table>
		</table>
		<?php endforeach; ?>	
			<?php
			$content = ob_get_contents();
		ob_end_clean();
	$pdf->writeHTML($content, true, false, true, false, '');
	$pdf->Output('TTPJ.pdf', 'I');
	?>