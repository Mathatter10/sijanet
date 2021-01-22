<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ContohPostToken extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		$header = $this->input->request_headers();
		if(!isset($header['Token'])){
			echo "Token Tidak Ada";
			exit;
		}
		else{
			$token ="12345678";
			if($header['Token']!=$token){
				echo "Token Salah";
				exit;
			}
		}
		
	}

	public function index()
	{
		$data = (array)json_decode(trim(file_get_contents('php://input')), true);
	    $nomor = $data['no_surat'];
	    
		if(strlen($data['no_surat'])<1){
			$response = array(
				"success" => 0,
				"message" => "Data Kosong atau Nomor sudah diinput"
			);
			echo json_encode($response);
			exit;
		}else{
		    $sql = $this->db->query("SELECT no_surat,tgl_surat FROM data_izin WHERE no_surat = '$nomor' AND year(tgl_surat) = year(current_date())");
            $cek_no = $sql->num_rows();
            if($cek_no > 0){
                $response = array(
				"success" => 0,
				"message" => "Nomor Surat Sudah diinput!!!!!"
			);
			echo json_encode($response);
			exit;
            } else {
		    $this->m_data->insert_data($data, 'data_izin');
		    
		    $status = array(
		            "status" => 1
		        );
		    
		    $this->m_data->insert_data($status, 'data_status');
		    
		    $response = array(
				"success" => 1,
				"message" => "Data berhasil masuk ke database"
			);
			echo json_encode($response);
		    exit;
	        }
    	}
    }
}

?>