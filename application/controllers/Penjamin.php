<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penjamin extends CI_Controller
{

	// Load Library dan Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		$this->load->library('form_validation');
		$this->load->library('fungsi');

		if (empty($this->session->userdata('masuk'))) {
			redirect(site_url(), 'refresh');
		}
		
		if($this->session->userdata('unit')!='8'){
		    redirect(site_url(), 'refresh');
		}
	}

	//Menampilkan View : Overview
	public function index()
	{
	    $data['info'] =
			$this->db->query("SELECT * FROM tools
			                WHERE jenis_tools = '1'
						")->result();
						
		$data['peraturan'] =
			$this->db->query("SELECT * FROM tools
			                WHERE jenis_tools = '2'
						")->result();
		
		$data['faq'] =
			$this->db->query("SELECT * FROM tools
			                WHERE jenis_tools = '3'
						")->result();				
	    
		$this->load->view("penjamin/v_head");
		$this->load->view("penjamin/overview",$data);
		$this->load->view("penjamin/v_foot");
		
	}

	//Menampilkan View : List_Pengajuan
	public function list_pengajuan()
	{
		$a = $this->session->userdata('id');

		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN tpbuser as B
							ON A.id_tpb = B.id_tpb
							JOIN data_jaminan as C
							ON A.id_surat = C.id_surat
							JOIN kegiatan as F
							ON A.kegiatan = F.id
							JOIN data_status as D
							ON A.id_surat = D.id_surat
							JOIN s_status as E
							ON D.status = E.status
							WHERE C.id_penjamin = $a 
							AND D.status = '4'
							ORDER BY A.tgl_surat DESC
							")->result();

		$this->load->view("penjamin/v_head");
		$this->load->view("penjamin/list_pengajuan", $data);
		$this->load->view("penjamin/v_foot");
		
	}

	// Menampilkan View : List_jaminan
	public function list_jaminan()
	{
		$a = $this->session->userdata('id');

		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							LEFT JOIN tpbuser as B
							ON A.id_tpb = B.id_tpb
							LEFT JOIN data_izin as C
							ON A.id_surat = C.id_surat
							JOIN data_status as D 
							ON C.id_surat = D.id_surat
							JOIN s_status as E
							ON D.status = E.status
							LEFT JOIN kegiatan as F
							ON C.kegiatan = F.id
							WHERE A.id_penjamin = $a
							AND D.status > '4'
							ORDER BY C.tgl_surat DESC 
							")->result();
						
		$this->load->view("penjamin/v_head");
		$this->load->view("penjamin/list_jaminan", $data);
		$this->load->view("penjamin/v_foot");
		
	}

	// Menampilkan View : List_konfirmasi
	public function list_konfirmasi()
	{
		$a = $this->session->userdata('id');

		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							LEFT JOIN tpbuser as B
							ON A.id_tpb = B.id_tpb
							LEFT JOIN data_izin as C
							ON A.id_surat = C.id_surat
							LEFT JOIN kegiatan as F
							ON C.kegiatan = F.id
							LEFT JOIN data_status as D
							ON C.id_surat = D.id_surat
							LEFT JOIN s_status as E
							ON D.status = E.status
							WHERE A.id_penjamin = $a 
							AND D.status = '9'
							ORDER BY C.tgl_surat DESC
							")->result();

		$this->load->view("penjamin/v_head");
		$this->load->view("penjamin/list_jaminan", $data);
		$this->load->view("penjamin/v_foot");
		
	}

	// Menampilkan View : Profil
	function profil()
	{
		$a = $this->session->userdata('id');

		$data['profil'] =
			$this->db->query("SELECT * FROM penjamindetail as A
							JOIN penjaminuser as B 
							ON A.id_penjamin = B.id_penjamin
							WHERE A.id_penjamin = $a
							")->result();

		$this->load->view("penjamin/v_head");
		$this->load->view("penjamin/profil", $data);
		$this->load->view("penjamin/v_foot");
	}

	//Menampilkan View : Teliti
	function teliti($id)
	{
		$data['jaminan'] =
			$this->db->query(" SELECT * FROM data_jaminan as A
								LEFT JOIN tpbuser as B
								ON A.id_tpb = B.id_tpb
								LEFT JOIN data_izin as C
								ON A.id_surat = C.id_surat
								LEFT JOIN kegiatan as E
								ON C.kegiatan = E.id
								LEFT JOIN tpbdetail as F
								ON A.id_tpb = F.id_tpb
								WHERE A.id_jaminan = $id
								")->result();
		$data['revisi'] =
			$this->db->query(" SELECT * FROM data_jaminan as A
							LEFT JOIN data_izin as B 
							ON A.id_surat = B.id_surat
							LEFT JOIN data_perben as C
							ON A.id_jaminan = C.id_jaminan
							JOIN revisi as H
							ON B.id_surat = H.id_surat
							WHERE A.id_jaminan = $id
							")->result();							

		$this->load->view("penjamin/v_head");
		$this->load->view("penjamin/teliti", $data);
		$this->load->view("penjamin/v_foot");
	}

	//Menampilkan View : Teliti
	function ubah($id)
	{
		$data['jaminan'] =
			$this->db->query(" SELECT * FROM data_jaminan as A
								LEFT JOIN tpbuser as B
								ON A.id_tpb = B.id_tpb
								LEFT JOIN data_izin as C
								ON A.id_surat = C.id_surat
								LEFT JOIN kegiatan as E
								ON C.kegiatan = E.id
								LEFT JOIN penjaminttd as F 
								ON A.id_jaminan = F.id_jaminan
								WHERE A.id_jaminan = $id
								")->result();
		$data['revisi'] =
			$this->db->query(" SELECT * FROM data_jaminan as A
							LEFT JOIN data_izin as B 
							ON A.id_surat = B.id_surat
							LEFT JOIN data_perben as C
							ON A.id_jaminan = C.id_jaminan
							JOIN revisi as H
							ON B.id_surat = H.id_surat
							WHERE A.id_jaminan = $id
							")->result();						

		$this->load->view("penjamin/v_head");
		$this->load->view("penjamin/ubah", $data);
		$this->load->view("penjamin/v_foot");
	}

	// Menampilkan View : Detail
	function detail($id)
	{
		$data['jaminan'] =
			$this->db->query(" SELECT * FROM data_jaminan as A
								LEFT JOIN tpbuser as B
								ON A.id_tpb = B.id_tpb
								LEFT JOIN data_izin as C
								ON A.id_surat = C.id_surat
								LEFT JOIN penjaminttd as D
								ON A.id_jaminan = D.id_jaminan
								LEFT JOIN kegiatan as E
								ON C.kegiatan = E.id
								WHERE A.id_jaminan = $id
								")->result();
        $data['revisi'] =
			$this->db->query(" SELECT * FROM data_jaminan as A
							LEFT JOIN data_izin as B 
							ON A.id_surat = B.id_surat
							LEFT JOIN data_perben as C
							ON A.id_jaminan = C.id_jaminan
							JOIN revisi as H
							ON B.id_surat = H.id_surat
							WHERE A.id_jaminan = $id
							")->result();	

		$this->load->view("penjamin/v_head");
		$this->load->view("penjamin/detail", $data);
		$this->load->view("penjamin/v_foot");
		
	}

	// Proses Update Profil
	function update_profil()
	{
		//persiapan update profil
		$id_penjamin = $this->input->post('id_penjamin');
		$npwp_penjamin = $this->input->post('npwp_penjamin');
		$alamat_penjamin = $this->input->post('alamat_penjamin');
		$telepon = $this->input->post('telepon');
		$faksimili = $this->input->post('faksimili');

		//eksekusi update profil	
		$where = array('id_penjamin' => $id_penjamin);
		$data = array(
			'npwp_penjamin' => $npwp_penjamin,
			'alamat_penjamin' => $alamat_penjamin,
			'telepon' => $telepon,
			'faksimili' => $faksimili,
		);
		$this->m_data->update_data($where, $data, 'penjamindetail');

		$password = $this->input->post('password');
		$data = array('password' => $password);
		$this->m_data->update_data($where, $data, 'penjaminuser');

		//kembali ke halaman status
		redirect('penjamin/profil');
	}

	// Proses Input Nomor Jaminan
	function input()
	{
		//persiapan input data
		$data['jaminan'] = $this->m_data->get_data('data_jaminan')->result();
		$id_jaminan = $this->input->post('id_jaminan');

		$no_jaminan = $this->input->post('no_jaminan');
		$tanggal = $this->input->post('tanggal');
		$nama_ttd = $this->input->post('nama_ttd');
		$jabatan_ttd = $this->input->post('jabatan_ttd');
        
        $sql = $this->db->query("SELECT no_jaminan FROM data_jaminan where no_jaminan ='$no_jaminan'");
        $cek_no = $sql->num_rows();
        if($cek_no > 0){
            $this->session->set_flashdata('message', 'Gagal ! Nomor Jaminan sudah pernah diinput !');
            redirect(site_url('penjamin/teliti/'.$id_jaminan));
        } else {
		$where = array('id_jaminan' => $id_jaminan);
		//eksekusi input data
		$data = array(
			'no_jaminan' => $no_jaminan,
			'tgl_jaminan' => $tanggal
		);
		$this->m_data->update_data($where, $data, 'data_jaminan');

		$data = array(
			'id_jaminan' => $id_jaminan,
			'nama_ttd' => $nama_ttd,
			'jabatan_ttd' => $jabatan_ttd
		);
		$this->m_data->insert_data($data, 'penjaminttd');

		//persiapan update status
		$data['status'] = $this->m_data->get_data('data_status')->result();
		$id_surat = $this->input->post('id_surat');
		$status = $this->input->post('status');

		$where = array('id_surat' => $id_surat);
		//eksekusi update status
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		$this->sendmessage();
		redirect('penjamin/list_jaminan');
        }
	}

	// Proses Ubah Jaminan
	function ubah_act()
	{
		//persiapan input data
		$data['jaminan'] = $this->m_data->get_data('data_jaminan')->result();
		$no_jaminan = $this->input->post('no_jaminan');
		$id_jaminan = $this->input->post('id_jaminan');
		$nama_ttd = $this->input->post('nama_ttd');
		$jabatan_ttd = $this->input->post('jabatan_ttd');

		$where = array('id_jaminan' => $id_jaminan);

		//eksekusi input data
		$data = array('no_jaminan' => $no_jaminan);
		$this->m_data->update_data($where, $data, 'data_jaminan');

		$data = array(
			'nama_ttd' => $nama_ttd,
			'jabatan_ttd' => $jabatan_ttd
		);
		$this->m_data->update_data($where, $data, 'penjaminttd');

		redirect('penjamin/detail/' . $id_jaminan);
	}

	// Proses Konfirmasi Jaminan		
	function konfirmasi_act()
	{
		$id_surat = $this->input->post('id_surat');
		$status = $this->input->post('status');
		$where = array('id_surat' => $id_surat);
		$data = array(
			'status' => $status
		);
		$this->m_data->update_data($where, $data, 'data_status');

		$this->sendmessage_konfirm2();

		redirect('penjamin/list_jaminan');
	}

	// Proses Tolak Jaminan 
	function tolak_jaminan()
	{
		// Validasi Input POST
		$id_surat = $this->input->post('id_surat');
		$status = $this->input->post('status');

		$id_jaminan = $this->input->post('id_jaminan');

		//eksekusi update status
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		//eksekusi hapus jaminan
		$where = array('id_jaminan' => $id_jaminan);
		$this->m_data->delete_data($where, 'data_jaminan');

		redirect('penjamin/list_jaminan');
	}

	function sendmessage()
	{
		$telegram_id = $this->input->post('telegram_id');
		$message_text = $this->input->post('message_text');
		$nosurat = $this->input->post('no_surat');
		$penjamin = $this->input->post('penjamin');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";

		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=_" . $penjamin . "_: Pengajuan jaminan Anda no *" .  $nosurat . "* telah disetujui dengan nomor e-Jaminan *"
			. urlencode($message_text) . "*.";

		$ch = curl_init();
		$optArray = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);
		redirect('penjamin/list_jaminan');
	}

	function sendmessage_konfirm2()
	{
		$data = $this->db->query(" SELECT * FROM bcuser as A
					WHERE A.unit = '2' AND A.level = '2' AND LENGTH(A.telegram_id) > '5'
					")->result();
		$penjamin = $this->input->post('penjamin');
		$nosurat = $this->input->post('nosurat');
		$nojaminan = $this->input->post('nojaminan');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";
		foreach ($data as $tel_id) {
			$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $tel_id->telegram_id;
			$url = $url . "&text=_" . $penjamin . "_: Anda menerima konfirmasi atas jaminan dengan nomor surat *S-"
				. urlencode($nosurat) . "* dan no e-Jaminan *" . $nojaminan . "*.";
			$ch = curl_init();
			$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true
			);
			curl_setopt_array($ch, $optArray);
			$result = curl_exec($ch);
			curl_close($ch);
		}
		// mengalihkan halaman ke halaman list jaminan
		redirect('penjamin/list_jaminan');
	}
}
