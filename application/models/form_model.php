<?php

	class Form_model extends CI_model{
		public function view() {
			
		}
		public function upload_file($filename)		
		{
			$this->load->library('upload'); // LOAD LIBRARY UPLOAD

			$config['upload_path'] = './excel/';
			$config['allowd_types'] = 'xlxs';
			$config['max_size'] = '2048';
			$config['overwrite'] = true;
			$config['file_name'] = $filename;

			$this->upload->initialize($config); // LOAD KONFIGURASI UPLOAD
			if($this->upload->do_upload('file')){
				$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
				return $return;
			} else {
				$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
				return $return;
			}
		}

		public function insert_multiple($data)
		{
			$this->db->insert_batch('data_realisasi', $data);
		}

	}
?>