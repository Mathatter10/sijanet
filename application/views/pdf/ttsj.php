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
					Untuk disematkan<br/>
					pada berkas		
					</th>
				</tr>
			</table>

			<table align="center" width="100%">
				<caption><b>TANDA TERIMA SEMENTARA JAMINAN</b></caption><br/>
				<tr>
					<td width="150"></td>
					<td align="left">Nomor Agenda</td>
					<td width="10">:</td>
					<td align="left"><i>eTTSJ-<?php echo $j->nomor_ttsj ?>.<?php $tahun = date('Y', strtotime($j->tanggal_ttsj)); echo $tahun ?></i></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left">Tanggal</td>
					<td>:</td>
					<td align="left"><i><?php echo date('d-m-Y', strtotime($j->waktu_periksa)) ?></i></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left">Waktu</td>
					<td>:</td>
					<td align="left"><i><?php echo date('H:i:s', strtotime($j->waktu_periksa)) ?> WIB</i></td>
					<td></td>
				</tr>
			</table>
			<br/><br/>
			<table align="center" width="100%" >
				<tr>
					<td align="left">Telah diterima Jaminan dalam rangka kepabeanan:</td>
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
					<td align="left">Nomor</td>
					<td align="center" width="10">:</td>
					<td colspan="2" align="left"><?php echo $j->no_jaminan; ?> Tanggal <?php echo $j->tgl_jaminan ?></td>
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
			</table>
			<br/><br/>
			<table align="center" width="100%">
				<tr>
					<td align="center" width="50%">Yang Menyerahkan</td>
					<td align="center" width="50%">Yang Menerima</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><?php echo $j->nama_tpb ?></td>
					<td><?php echo $j->nama_periksa ?></td>
				</tr>
			</table>

			<table align="center" width="100%">
				<tr>
					<td align="left" width="50">No. Telp.</td>
					<td align="left" width=10>:</td>
					<td><i></i></td>
				</tr>
				<tr>
					<td align="left" width="50">Alamat</td>
					<td align="left" >:</td>
					<td><i></i></td>
				</tr>
				<tr>
					<td colspan="3" align="left">telah dikonfirmasi kepada Penjamin secara :</td>
				</tr>
			</table>

			<table width="100%" border="1" rules="all" align="left">
				<tr>
					<td rules="all" rowspan="2"  width="10%">Lisan</td>
					<td width="25%">Tanggal</td>
					<td width="15%">waktu</td>
					<td colspan="2" width="50%">Penjamin: </td>
				</tr>
				<tr>
					<td colspan="2">Oleh</td>
					<td>Nama:</td>
					<td>Telp</td>
				</tr>
				<tr border="1">
					<td rowspan="2">Tertulis</td>
					<td>Surat no.:</td>
					<td>tgl</td>
					<td style="font-size: 9">No.:S-<?php echo $j->no_surat; ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($j->tgl_surat)); echo $tahun ?></td>
					<td>tgl</td>
				</tr>
				<tr>
					<td colspan="2">Tgl. kirim</td>
					<td colspan="2">Diterima tgl</td>
				</tr>
			</table>

			<table align="center" width="100%">
				<tr>
					<td align="left" colspan="7">dengan hasil:</td>
				</tr>
				<tr>
					<td align="left" width="10">1.</td>
					<td align="left" >Identitas Penjamin dan Terjamin</td>
					<td align="center" >:</td>
					<td align="left">Sesuai / Tidak *)</td>
				</tr>
				<tr>
					<td align="left" >2.</td>
					<td align="left" >Jumlah jaminan</td>
					<td align="center" >:</td>
					<td align="left">Sesuai / Tidak *)</td>
				</tr>
				<tr>
					<td align="left" >3.</td>
					<td align="left" >Jangka waktu</td>
					<td align="center" >:</td>
					<td align="left">Sesuai / Tidak *)</td>
				</tr>
				<tr>
					<td align="left" >4.</td>
					<td align="left" >Keterangan lain</td>
					<td align="center" >:</td>
					<td align="left">............................</td>
				</tr>				
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<table width="100%" align="center">
				<tr>					
					<td align="left">Kesimpulan</td>
					<td align="center">:</td>
					<td align="left">Diterbitkan BPJ/Dikembalikan *)</td>
				</tr>
				<tr>			
					<td align="left">No BPJ</td>
					<td align="center">:</td>
					<td align="left">....................................</td>
				</tr>
				<tr>			
					<td align="left">Tanggal</td>
					<td align="center">:</td>
					<td align="left">....................................</td>
				</tr>
				<tr>
					<td  align="left"><i>*) Coret yang tidak perlu</i></td>
					<td align="left">Alasan</td>
					<td align="left">:</td>
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
					Untuk Pemohon<br/>			
					</th>
				</tr>
			</table>
			<table align=center width="100%">
				<caption><b>TANDA TERIMA SEMENTARA JAMINAN</b></caption><br/>
				<tr>
					<td width="150"></td>
					<td align="left" width=150>Nomor Agenda</td>
					<td align="center" width="10">:</td>
					<td align="left"><i>eTTSJ-<?php echo $j->nomor_ttsj ?>.<?php $tahun = date('Y', strtotime($j->tanggal_ttsj)); echo $tahun ?></i></td> 
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=150>Tanggal</td>
					<td align="center" width="10">:</td>
					<td align="left"><?php echo date('d-m-Y', strtotime($j->waktu_periksa)) ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left"width=150>Waktu</td>
					<td align="center" width="10">:</td>
					<td align="left"><?php echo date('H:i:s', strtotime($j->waktu_periksa)) ?> WIB</td>
					<td></td>
				</tr>
			</table>
			<table align="center" width="100%">
				<tr>
					<td align="left">Telah diterima Jaminan dalam rangka kepabeanan:</td>
				</tr>
			</table>
			<br/>
			<table align="center" width="100%">
				<tr>
					<td width="150"></td>
					<td align="left" width=200>Bentuk Jaminan</td>
					<td align="center" width="10">:</td>
					<td align="left"><i> <?php $bentuk =$j->bentuk_jaminan;
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
					<td align="left"width=200>Nomor</td>
					<td align="center" width="10">:</td>
					<td colspan="2" align="left"><?php echo $j->no_jaminan; ?> Tanggal <?php echo $j->tgl_jaminan ?></td>
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
			</table>
			<table align="center" width="100%">
				<tr>
					<td align="center" width="50%">Yang Menyerahkan</td>
					<td align="center" width="50%">Yang Menerima</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><?php echo $j->nama_tpb ?></td>
					<td><?php echo $j->nama_periksa ?></td>
				</tr>
				<tr>
					<td align="center" width="50%"><i></i></td>
					<td align="center" width="50%"><br> </td>
				</tr>
			</table>
			<table width="100%" align="justify">
				<tr>
					<td>Tanda Terima Sementara ini bukan merupakan Bukti Penerimaan Jaminan sebagaimana dimaksud dalam pasal 20 ayat (4) Peraturan Menteri Keuangan Nomor 259/PMK.04/2010 dan hanya ditukarkan dengan Bukti Penerimaan Jaminan yang diterbitkan oleh Kantor Pabean dalam hasil konfirmasi penerbitan Jaminan sesuai.
					</td>
				</tr>
				<tr>
					<td align="center">Dikembalikan dengan alasan: ...............................................................................</td>
				</tr>
			</table>
		</table>
		<?php endforeach; ?>	
	<?php
	$content =  ob_get_contents();
	            ob_end_clean();
	$pdf->writeHTML($content, true, false, true, false, '');
	$pdf->Output('TTSJ.pdf', 'I');
	?>