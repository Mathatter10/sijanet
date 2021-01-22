		public function form()
		{
			$data = array ();

			if(isset($_POST['preview'])){
				$upload = $this->m_data->upload_file($this->filename);

				if($upload['result'] == "success"){
					include APPPATH.'third_party/PHPExcel/PHPExcel.php';

					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

					$data['sheet'] = $sheet;
				} else {
					$data['upload_error'] = $upload['error'];
				}
			}

			$this->load->view('form', $data);
		}

		public function import (){
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';

			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

			$data = array();

			$numrow = 1;
			foreach($sheet as $row){
				if($numrow > 1){
					array_push($data, array(
						'id_surat'
						'jns_dok' => $row['A'];
						'no_dok' => $row['B'];
						'tgl_dok' => $row['C'];
						'uraian_barang' => $row['D'];
						'jumlah_barang' => $row['E'];
						'satuan_barang' => $row['F'];
					));
				}

				$numrow++;
			}
			$this->m_data->insert_multiple($data);

			redirect('siswa');
		}