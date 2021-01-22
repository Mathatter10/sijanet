<?php			
			$pdf = new TCPDF('L','cm','A4','true');
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			$pdf->setMargins(0.5,0.5,0.5,0);
			$pdf->SetFont('times', '', 10);

			$pdf->AddPage();
			ob_start();
			?>
			<head>
				<title>Jaminan Elektronik</title>
				<style type="text/css">
					#row {
					  border: 2px solid black;
					  padding: 25px;
					  background: url(mountain.jpg);
					  background-repeat: no-repeat;
					  background-size: auto;
					}

					.kiri {
					  width : 100%;
					  float: left;
					}

					.kanan {
					  width : 100%;
					  float: right;
					}
				</style>
			</head>
			<table align="center" width="100%">
				<table align="center" >
					<tr>
						<td></td>
					</tr>
					<tr>				
						<td align="center">
							<b>LEMBAR REALISASI<br/>
							PELAKSANAAN PENGELUARAN BARANG DARI TPB KE TLDDP DENGAN JAMINAN DAN PEMASUKANNYA KEMBALI</b>
						</td>		
					</tr>
				</table>
				<?php foreach($laporan as $l): ?>
				<table align="center"height="10px">					
					<tr>
						<td></td>
					</tr>
					<tr>
						<td align="left" width="46%">&nbsp; DATA PENYELENGGARA / PENGUSAHA TPB:</td>
					</tr>
					<tr>
						<td align="left" width="40%">&nbsp;&nbsp;&nbsp;&nbsp;	A. NPWP</td>
						<td align="left" width="10">:</td>
						<td align="left"><?php echo $l->npwp_tpb; ?></td>
					</tr>
					<tr>
						<td align="left" width="40%">&nbsp;&nbsp;&nbsp;&nbsp;	B. NAMA PENYELENGGARA / PENGUSAHA TPB</td>
						<td align="left" width="10">:</td>
						<td align="left"><?php echo $l->nama_tpb; ?></td>
					</tr>
					<tr>
						<td align="left" width="40%">&nbsp;&nbsp;&nbsp;&nbsp;	C. NOMOR SURAT IZIN TPB</td>
						<td align="left" width="10">:</td>
						<td align="left"><?php echo $l->no_skep; ?></td>
					</tr>
					<tr>
						<td align="left" width="40%">&nbsp;&nbsp;&nbsp;&nbsp;	D. NOMOR DAN TANGGAL SURAT PERSETUJUAN</td>
						<td align="left" width="10">:</td>
						<td align="left">S-<?php echo $l->no_surat ?>/WBC.09/KPP.MP.04/<?php $tahun = date('Y', strtotime($l->tgl_surat)); echo $tahun ?> / <?php $tanggal = $l->tgl_surat; echo $this->fungsi->tgl_indo($tanggal); ?></td>
					</tr>
					<tr>
						<td align="left" width="40%">&nbsp;&nbsp;&nbsp;&nbsp;	E. TANGGAL JATUH TEMPO</td>
						<td align="left" width="10">:</td>
						<td align="left"><?php $tanggal = $l->jth_tempo; echo $this->fungsi->tgl_indo($tanggal); ?></td>
					</tr>
					<tr>
						<td align="left" width="40%">&nbsp;&nbsp;&nbsp;&nbsp;	F. NOMOR BUKTI PENERIMAAN JAMINAN</td>
						<td align="left" width="10">:</td>
						<td align="left"><?php echo $l->nomor_bpj; ?>/BEND.PEN/CB/<?php $tahun = date('Y', strtotime($l->tanggal_bpj)); echo $tahun ?></td>
					</tr>						
				</table>
				
				<br/><br/>
		
			<div id="row">	
					<table border="1" class="kiri">
						<tr>
							<td colspan="4">PENGELUARAN BARANG</td>							
						</tr>
						<tr>
							<td>NO.</td>
							<td>NOPEN / TGL BC 2.6.1</td>
							<td>KODE BARANG</td>
							<td>JUMLAH SATUAN</td>							
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
							<td>4</td>						
						</tr>
						<?php $total = 0; $o='1'; foreach($keluar as $k):?>
						<tr>						
							<td><?php echo $o++; ?></td>
							<td><?php echo $k->no_dok?>/<?php echo $k->tgl_dok?></td>
							<td><?php echo $k->uraian_barang?></td>
							<td><?php echo $k->jumlah_barang?> <?php echo $k->satuan_barang?></td>
						    <?php $total += $k->jumlah_barang; ?>
						</tr>
						<?php endforeach;?>	
						<tr>
						    <td colspan="3">Total</td>
						    <td><?php echo number_format($total, 0, ',', '.'); ?></td>
						</tr>					
							
					</table>
					<br/><br/><br/><br/><br/>

					<table border="1" class="kanan">
						<tr>						
							<td colspan="4">PEMASUKAN BARANG</td>
						</tr>
						<tr>						
							<td>NO.</td>
							<td>NOPEN / TGL BC 2.6.2</td>
							<td>KODE BARANG</td>
							<td>JUMLAH SATUAN</td>
						</tr>
						<tr>						
							<td>5</td>
							<td>6</td>
							<td>7</td>
							<td>8</td>
						</tr>					
						<?php $total = 0; $o='1'; foreach($masuk as $m):?>
						<tr>						
							<td><?php echo $o++; ?></td>
							<td><?php echo $m->no_dok?>/<?php echo $m->tgl_dok?></td>
							<td><?php echo $m->uraian_barang?></td>
							<td><?php echo $m->jumlah_barang?> <?php echo $m->satuan_barang?></td>
						    <?php $total += $m->jumlah_barang; ?>
						</tr>
						<?php endforeach;?>
						<tr>
						    <td colspan="3">Total</td>
						    <td><?php echo number_format($total, 0, ',', '.'); ?></td>
						</tr>							
						
					</table>
			</div>

				<table border="0">
				<tr>
					<td colspan="2"></td>
				</tr>
				<?php if($l->tgl_penarikan == '0000-00-00 00:00:00')
				{} else{ ?>
				<tr>
					<td align="left">
					DISAHKAN OLEH : <?php echo $l->nama_tpb; ?><br/>
					TANGGAL : <?php echo $tanggal = $l->tgl_penarikan; ?>
						
					</td>
				</tr>
				<?php } ?>
				</table>
			<?php endforeach; ?>
			</table>	
			
			<?php 
			$content = ob_get_contents();
			ob_end_clean();
	$pdf->writeHTML($content, true, false, true, false, '');
	$pdf->Output('LAPORAN.pdf', 'I');
	?>