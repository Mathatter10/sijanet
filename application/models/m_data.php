<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class M_data extends CI_Model{
	
	// FUNGSI CRUD
	// fungsi untuk mengambil data dari database
	function get_data($table){
		return $this->db->get($table);
	}

	// fungsi untuk menginput data ke database
	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	// fungsi untuk menginput multiple data ke database 
	function insert_batch($data,$table){
		$this->db->insert_batch($table,$data);
	}

	// fungsi untuk mengedit data
	function get_where($where,$table){
		return $this->db->get_where($table,$where);
	}

	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// fungsi untuk menghapus data dari database
	function delete_data($where,$table){
		$this->db->delete($table,$where);
	}
	// AKHIR FUNGSI CRUD

	public function upload_file($filename){
			$this->load->library('upload');

			$config['upload_path'] = './excel';
			$config['allowed_types'] = 'xlsx';
			$config['max_size'] = '2048';
			$config['overwrite'] = true;
			$config['file_name'] = $filename;

			$this->upload->initialize($config);
			if($this->upload->do_upload('file')){
				$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
				return $return;
			} else {
				$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_error());
				return $return;
			}
		}
}

?>