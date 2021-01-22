<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kawasanberikat extends CI_Controller
{

	// Load Library dan Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model("m_data");
		$this->load->library("form_validation");
		$this->load->library('fungsi');
		$this->load->library('Ciqrcode');

		if (empty($this->session->userdata('masuk'))) {
			redirect(site_url(), 'refresh');
		}
		
	}

	// Menampilkan View : Overview / Dashboard
	public function index()
	{
		//mengambil session id_tpb
		$a = $this->session->userdata('id');

		//mengambil database
		$data['izin'] =
			$this->db->query("SELECT * FROM data_jaminan as A
						JOIN data_izin as B 
						ON A.id_surat = B.id_surat
						JOIN tpbdetail as C 
						ON B.id_tpb = C.id_tpb
						JOIN penjamindetail as D 
						ON A.id_penjamin = D.id_penjamin
						JOIN data_status as E 
						ON B.id_surat = E.id_surat
						JOIN s_status as F 
						ON E.status = F.status
						JOIN data_perben as G
						ON A.id_jaminan = G.id_jaminan
						WHERE A.id_tpb = $a
						ORDER BY G.hardcopy ASC
						")->result();
						
	    //mengambil database
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
						
		$this->load->view("kb/v_head");
		$this->load->view("kb/overview", $data);
		$this->load->view("kb/v_foot");
	}

	// Menampilkan View : List_Izin 
	function list_izin()
	{
		//mengambil session id_tpb
		$a = $this->session->userdata('id');

		//mengambil database
		$data['izin'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_status as E
							ON A.id_surat = E.id_surat
							JOIN kegiatan as D
							ON A.kegiatan = D.id
							LEFT JOIN s_status as F
							ON E.status = F.status
							WHERE A.id_tpb = $a
							AND E.status IN('1', '20')  
							")->result();

		$this->load->view("kb/v_head");
		$this->load->view("kb/list_izin", $data);
		$this->load->view("kb/v_foot");
	}

	// Menampilkan View : List_Izin 
	function list_jaminan()
	{
		//mengambil session id_tpb
		$a = $this->session->userdata('id');

		//mengambil database
		$data['izin'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							JOIN kegiatan as D
							ON A.kegiatan = D.id
							JOIN data_status as E
							ON A.id_surat = E.id_surat
							JOIN s_status as F
							ON E.status = F.status
							WHERE A.id_tpb = $a 
							AND E.status BETWEEN '4' AND '5'
							ORDER BY A.tgl_surat DESC
							")->result();

		$this->load->view("kb/v_head");
		$this->load->view("kb/list_izin", $data);
		$this->load->view("kb/v_foot");
	}

	// Menampilkan View : List_Realisasi
	function list_realisasi()
	{
		$a = $this->session->userdata('id');

		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							JOIN kegiatan as D
							ON A.kegiatan = D.id
							JOIN data_status as E
							ON A.id_surat = E.id_surat
							JOIN s_status as F
							ON E.status = F.status
							JOIN data_jaminan as G 
							ON A.id_surat = G.id_surat
							WHERE A.id_tpb = $a 
							AND E.status BETWEEN '5' AND '11'
							ORDER BY A.tgl_surat DESC 
							")->result();

		$this->load->view("kb/v_head");
		$this->load->view("kb/list_realisasi", $data);
		$this->load->view("kb/v_foot", $data);
	}

	// Menampilkan View : List_Izin 
	function list_penarikan()
	{
		//mengambil session id_tpb
		$a = $this->session->userdata('id');

		//mengambil database
		$data['izin'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							JOIN kegiatan as D
							ON A.kegiatan = D.id
							JOIN data_status as E
							ON A.id_surat = E.id_surat
							JOIN s_status as F
							ON E.status = F.status
							JOIN data_jaminan as G 
							ON A.id_surat = G.id_surat
							JOIN data_perben as H
							ON G.id_jaminan = H.id_jaminan
							WHERE A.id_tpb = $a 
							AND E.status >= '16'
							ORDER BY A.tgl_surat DESC
							")->result();

		$this->load->view("kb/v_head");
		$this->load->view("kb/list_izin", $data);
		$this->load->view("kb/v_foot");
	}
	
	function laporan()
		{
			$a = $this->session->userdata('id');

			$data['laporan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							JOIN kegiatan as D
							ON A.kegiatan = D.id
							JOIN data_status as F
							ON A.id_surat = F.id_surat
							JOIN s_status as E
							ON F.status = E.status
							LEFT JOIN data_jaminan as G 
							ON A.id_surat = G.id_surat
							LEFT JOIN data_perben as H
							ON G.id_jaminan = H.id_jaminan
							LEFT JOIN penjamindetail as I 
							ON G.id_penjamin = I.id_penjamin
							WHERE A.id_tpb = $a 
							ORDER BY A.tgl_surat DESC
							")->result();
					
			$this->load->view("kb/v_head");
			$this->load->view("kb/laporan", $data);
			$this->load->view("kb/v_foot");
		}

	// Menampilkan View : Detail
	function detail($id)
	{
		$data['detail'] =
			$this->db->query(" SELECT * FROM data_izin as A
							JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							JOIN bckasi as D
							ON A.pkc = D.pkc
							JOIN data_status as C 
							ON A.id_surat = C.id_surat
							JOIN s_status as E
							ON C.status = E.status
							LEFT JOIN data_jaminan as F 
							ON A.id_surat = F.id_surat
							LEFT JOIN data_perben as G
							ON F.id_jaminan = G.id_jaminan
							WHERE A.id_surat = $id
							")->result();
		
		$data['revisi'] =
			$this->db->query(" SELECT * FROM data_izin as A
							JOIN bckasi as D
							ON A.pkc = D.pkc
							LEFT JOIN data_jaminan as F 
							ON A.id_surat = F.id_surat
							LEFT JOIN data_perben as G
							ON F.id_jaminan = G.id_jaminan
							LEFT JOIN revisi as H
							ON A.id_surat = H.id_surat
							WHERE A.id_surat = $id
							")->result();					

		$this->load->view("kb/v_head");
		$this->load->view("kb/detail", $data);
		$this->load->view("kb/v_foot");
	}

	// Menampilkan View : Monitoring
	function monitoring()
	{
		$a = $this->session->userdata('id');

		$data['izin'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							JOIN kegiatan as D
							ON A.kegiatan = D.id
							JOIN data_status as F
							ON A.id_surat = F.id_surat
							JOIN s_status as E
							ON F.status = E.status
							LEFT JOIN data_jaminan as G 
							ON A.id_surat = G.id_surat
							LEFT JOIN data_perben as H
							ON G.id_jaminan = H.id_jaminan
							WHERE A.id_tpb = $a 
							ORDER BY A.tgl_surat DESC
							")->result();

		$this->load->view("kb/v_head");
		$this->load->view("kb/monitoring", $data);
		$this->load->view("kb/v_foot");
	}

	// Menampilkan View : Profil
	function profil()
	{
		$a = $this->session->userdata('id');

		$data['profil'] =
			$this->db->query("SELECT * FROM tpbdetail as A
							JOIN tpbuser as B 
							ON A.id_tpb = B.id_tpb
							WHERE A.id_tpb = $a
							")->result();

		$this->load->view("kb/v_head");
		$this->load->view("kb/profil", $data);
		$this->load->view("kb/v_foot");
	}
	
	        // Proses Update Profil
        	function update_profil()
        	{
        		//persiapan update profil
        		$id_tpb = $this->input->post('id_tpb');
        		$npwp_tpb = $this->input->post('npwp_tpb');
        		$no_skep = $this->input->post('no_skep');
        		$alamat_tpb = $this->input->post('alamat_tpb');
        		$telepon_tpb = $this->input->post('telepon_tpb');
        		$faksimili_tpb = $this->input->post('faksimili_tpb');
        		//eksekusi update profil	
        		$where = array('id_tpb' => $id_tpb);
        		$data = array(
        			'npwp_tpb' => $npwp_tpb,
        			'no_skep' => $no_skep,
        			'alamat_tpb' => $alamat_tpb,
        			'telepon_tpb' => $telepon_tpb,
        			'faksimili_tpb' => $faksimili_tpb,
        		);
        		$this->m_data->update_data($where, $data, 'tpbdetail');
                
                //persiapan update password
        		$password = $this->input->post('password');
        		//esksekusi update password
        		$data = array('password' => $password);
        		$this->m_data->update_data($where, $data, 'tpbuser');
        
        		//kembali ke halaman status
        		redirect('kawasanberikat/profil');
        	}
        
	// Menampilkan View : Input_Jaminan
	function input($id)
	{
		//mengambil id_surat
		$where = array('id_surat' => $id);

		$data['surat'] =
			$this->db->query(" SELECT * FROM data_izin
									WHERE data_izin.id_surat = $id
									")->result();

		$data['penjamin'] =
			$this->db->query(" SELECT * FROM penjamindetail
						")->result();

		$this->load->view("kb/v_head");
		$this->load->view("kb/input_jaminan", $data);
		$this->load->view("kb/v_foot");
	}

	// Menampilkan View : Input_Realisasi
	function real($id)
	{
		$where = array('id_surat' => $id);
		$data['izin'] =
			$this->db->query(" SELECT * FROM data_izin as A
										JOIN data_jaminan as B
										ON A.id_surat = B.id_surat
										WHERE A.id_surat = $id
									")->result();

		$data['masuk'] =
			$this->db->query(" SELECT * FROM data_realisasi
										WHERE id_surat = $id
										AND jns_dok = 2
									")->result();

		$data['keluar'] =
			$this->db->query(" SELECT * FROM data_realisasi
										WHERE id_surat = $id
										AND jns_dok = 1
									")->result();

		$data['satuan'] =
			$this->db->query("SELECT * FROM jenis_satuan
									")->result();

		$this->load->view("kb/v_head");
		$this->load->view("kb/input_realisasi", $data);
		$this->load->view("kb/v_foot");
	}

	// Proses Input_Jaminan
	function input_jaminan_act()
	{
		//persiapan input data jaminan
		$data['jaminan'] = $this->m_data->get_data('data_jaminan')->result();
		$id_surat = $this->input->post('id_surat');
		$status = $this->input->post('status');
		$id_tpb = $this->input->post('id_tpb');
		$id_penjamin = $this->input->post('id_penjamin');
		$bentuk_jaminan = $this->input->post('bentuk_jaminan');
        
        $sql = $this->db->query("SELECT id_surat FROM data_jaminan WHERE id_surat ='$id_surat'");
        $cek_no = $sql->num_rows();
        if($cek_no > 0){
            $this->session->set_flashdata('message', 'Gagal ! Nomor Surat sudah diajukan ke penjamin !');
            redirect(site_url('kawasanberikat/list_jaminan'));
        } else {
        
		//eksekusi input jaminan					
		$data = array(
			'id_surat' => $id_surat,
			'id_tpb' => $id_tpb,
			'id_penjamin' => $id_penjamin,
			'bentuk_jaminan' => $bentuk_jaminan,
		);
		$this->m_data->insert_data($data, 'data_jaminan');

		//eksekusi update status
		$where = array('id_surat' => $id_surat);
		$data = array(
			'status' => $status
		);
		$this->m_data->update_data($where, $data, 'data_status');

		$this->sendmessage_aju();

		//kembali ke halaman status
		redirect('kawasanberikat/list_izin');
        }
	}

	// Proses Pengajuan ke Perbendaharaan
	function ajup()
	{
		$id_surat = $this->input->post('id_surat');
		$status = $this->input->post('status');

		$where = array('id_surat' => $id_surat);
		$data = array(
			'status' => $status
		);
		$this->m_data->update_data($where, $data, 'data_status');

		$this->sendmessage_ajup();

		redirect('kawasanberikat/list_realisasi');
	}

	// Proses Selesai Input Realisasi
	function selesai()
	{
		$id_jaminan = $this->input->post('id_jaminan');
		$id_surat = $this->input->post('id_surat');
		$realisasi = $this->input->post('realisasi');

		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'realisasi' => $realisasi
		);
		$this->m_data->update_data($where, $data, 'data_jaminan');

		redirect('kawasanberikat/real/' . $id_surat);
	}

	// Proses Batal Input Realisasi
	function batal()
	{
		$id_jaminan = $this->input->post('id_jaminan');
		$id_surat = $this->input->post('id_surat');
		$realisasi = $this->input->post('realisasi');

		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'realisasi' => $realisasi
		);
		$this->m_data->update_data($where, $data, 'data_jaminan');

		redirect('kawasanberikat/real/' . $id_surat);
	}

	function realisasi()
	{
		$id_surat = $this->input->post('id_surat');
		$jns_dok = $this->input->post('jns_dok');
		$no_dok = $this->input->post('no_dok');
		$tgl_dok = $this->input->post('tgl_dok');
		$uraian_barang = $this->input->post('uraian_barang');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$satuan_barang = $this->input->post('satuan_barang');

		$data = array(
			'id_surat' => $id_surat,
			'jns_dok' => $jns_dok,
			'no_dok' => $no_dok,
			'tgl_dok' => $tgl_dok,
			'uraian_barang' => $uraian_barang,
			'jumlah_barang' => $jumlah_barang,
			'satuan_barang' => $satuan_barang
		);

		$this->m_data->insert_data($data, 'data_realisasi');
		redirect('kawasanberikat/real/' . $id_surat);
	}


	// Proses Hapus Data BC 261
	function hapus_realisasi($id)
	{
		$where = array('id_realisasi' => $id);
		$this->m_data->delete_data($where, 'data_realisasi');

		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
	}

	// Proses Pengajuan Penarikan
	function penarikan_act()
	{
		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');
		
		$status = $this->input->post('status');
		$tgl = $this->input->post('tgl_penarikan');
		
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'tgl_penarikan' => $tgl
		);
		$this->m_data->update_data($where, $data, 'data_jaminan');
		
		$where = array('id_surat' => $id_surat);
		$data = array(
			'status' => $status
		);
		$this->m_data->update_data($where, $data, 'data_status');

		$this->sendmessage_tarik();

		redirect('kawasanberikat/list_penarikan');
	}

	private $filename = 'data_excel';

	public function import()
	{

		$id_surat = $this->input->post('id_surat');

		if (isset($_POST['upload'])) {
			$upload = $this->m_data->upload_file($this->filename);

			include APPPATH . 'third_party/PHPExcel.php';

			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx');
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

			$data = array();

			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'id_surat' => $id_surat,
						'jns_dok' => $row['A'],
						'no_dok' => $row['B'],
						'tgl_dok' => $row['C'],
						'uraian_barang' => $row['D'],
						'jumlah_barang' => $row['E'],
						'satuan_barang' => $row['F'],
					));
				}
				$numrow++;
			}

			$this->m_data->insert_batch($data, 'data_realisasi');

			redirect("kawasanberikat/real/" . $id_surat);
		}
	}

	function sendmessage_aju()
	{
		$telegram_id = $this->input->post('telegram_id');
		$kaber = $this->input->post('kaber');
		$nosurat = $this->input->post('nosurat');

		$secret_token = "1282151621:AAEmK43YDDxM2uvQcs279DSB2Atkq-rJXgg";

		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=_" . $kaber . "_: Anda menerima pengajuan jaminan baru dengan nomor surat *S-"
			. urlencode($nosurat) . "*.";
		$ch = curl_init();
		$optArray = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);

		// mengalihkan halaman ke halaman list jaminan
		redirect('kawasanberikat/list_izin');
	}
	function sendmessage_ajup()
	{
		$data = $this->db->query(" SELECT * FROM bcuser as A
		WHERE A.unit = '2' AND A.level = '3' AND LENGTH(A.telegram_id) > '5'
		")->result();
		$kaber = $this->input->post('kaber');
		$nosurat = $this->input->post('nosurat');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";
		foreach ($data as $tel_id) {
			$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $tel_id->telegram_id;
			$url = $url . "&text=_" . $kaber . "_: Anda menerima pengajuan e-BPJ baru dengan nomor surat *S-"
				. urlencode($nosurat) . "*.";
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
		redirect('kawasanberikat/list_realisasi');
	}

	function sendmessage_tarik()
	{
		$data = $this->db->query(" SELECT * FROM bcuser as A
		WHERE A.unit = '2' AND A.level = '3' AND LENGTH(A.telegram_id) > '5'
		")->result();
		$kaber = $this->input->post('kaber');
		$nosurat = $this->input->post('nosurat');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";
		foreach ($data as $tel_id) {
			$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $tel_id->telegram_id;
			$url = $url . "&text=_" . $kaber . "_: Anda menerima pengajuan penarikan jaminan dengan nomor surat *S-"
				. urlencode($nosurat) . "*.";
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
		redirect('kawasanberikat/list_penarikan');
	}
}
