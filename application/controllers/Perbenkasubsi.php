<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbenkasubsi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('m_data');
		$this->load->model('nomor_model');
		$this->load->library('fungsi');
		
		if (empty($this->session->userdata('masuk'))) {
			redirect(site_url(), 'refresh');
		}
		
		if($this->session->userdata('unit')!='2'){
		    redirect(site_url(), 'refresh');
		}
	}

	//Halaman Kosong
	function blank()
	{
		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/home');
		$this->load->view('perben/kasubsi/v_foot');
	}

	//HALAMAN
	//Halaman Index Seksi
	function index()
	{
		$data['jaminan'] =
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
						WHERE F.status >= 11 
						AND G.hardcopy IS NULL
						")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/home', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman List Jaminan Customs Bond
	function list_jaminan_cb()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							LEFT JOIN tpbdetail as E 
							ON A.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							LEFT JOIN data_perben as G
							ON B.id_jaminan = G.id_jaminan
						    WHERE B.bentuk_jaminan = '1' AND c.status = '8'
							")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_jaminan_cb', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman List Jaminan Tunai
	function list_jaminan_tn()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							INNER JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							LEFT JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							INNER JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							WHERE B.bentuk_jaminan = '2' AND C.status = '8'
							ORDER BY C.status ASC
							")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_jaminan_tn', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman List Jaminan Tunai
	function list_jaminan_bg()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							INNER JOIN data_izin as B
							ON A.id_surat = B.id_surat
							LEFT JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							INNER JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							WHERE B.bentuk_jaminan = '3' AND C.status = '8'
							ORDER BY C.status ASC
							")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_jaminan_bg', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	function list_jaminan_ln()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
						JOIN data_jaminan as B 
						ON A.id_surat = B.id_surat
						LEFT JOIN tpbdetail as C 
						ON B.id_tpb = C.id_tpb
						LEFT JOIN data_status as E 
						ON A.id_surat = E.id_surat
						LEFT JOIN s_status as F 
						ON E.status = F.status
						WHERE B.bentuk_jaminan = '5' AND E.status = '8'
						ORDER BY E.status ASC
						")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_jaminan_ln', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	function list_konfirmasi()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
						INNER JOIN data_jaminan as B 
						ON A.id_surat = B.id_surat
						JOIN tpbdetail as C 
						ON B.id_tpb = C.id_tpb
						JOIN penjamindetail as D 
						ON B.id_penjamin = D.id_penjamin
						JOIN data_status as E 
						ON A.id_surat = E.id_surat
						JOIN s_status as F 
						ON E.status = F.status
						WHERE E.status BETWEEN '9' AND '10'
						ORDER BY E.status ASC
						")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_konfirmasi', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	// Fungsi Rekam Jaminan
	function list_penarikan_jaminan()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							JOIN data_perben as G 
							ON B.id_jaminan = G.id_jaminan
							WHERE C.status = '18'
							ORDER BY C.status DESC
							")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_penarikan_jaminan', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}
    
    // Fungsi Rekam Jaminan
	function list_penarikan()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							JOIN data_perben as G 
							ON B.id_jaminan = G.id_jaminan
							WHERE C.status >= 18
							ORDER BY C.status DESC
							")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_penarikan', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}
	
	function list_ebpj()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
						JOIN data_jaminan as B 
						ON A.id_surat = B.id_surat
						JOIN tpbdetail as C 
						ON B.id_tpb = C.id_tpb
						LEFT JOIN penjamindetail as D 
						ON B.id_penjamin = D.id_penjamin
						JOIN data_status as E 
						ON A.id_surat = E.id_surat
						LEFT JOIN s_status as F 
						ON E.status = F.status
						LEFT JOIN data_perben as G
						ON B.id_jaminan = G.id_jaminan
						WHERE E.status = '11'
						ORDER BY E.status ASC
						")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_ebpj', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	function list_penolakan()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
						JOIN data_jaminan as B 
						ON A.id_surat = B.id_surat
						JOIN tpbdetail as C 
						ON B.id_tpb = C.id_tpb
						LEFT JOIN penjamindetail as D 
						ON B.id_penjamin = D.id_penjamin
						JOIN data_status as E 
						ON A.id_surat = E.id_surat
						LEFT JOIN s_status as F 
						ON E.status = F.status
						LEFT JOIN data_perben as G
						ON B.id_jaminan = G.id_jaminan
						WHERE E.status = '0'
						ORDER BY E.status ASC
						")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_penolakan', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	function list_jaminan()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
						JOIN data_jaminan as B 
						ON A.id_surat = B.id_surat
						JOIN tpbdetail as C 
						ON B.id_tpb = C.id_tpb
						LEFT JOIN penjamindetail as D 
						ON B.id_penjamin = D.id_penjamin
						JOIN data_status as E 
						ON B.id_surat = E.id_surat
						LEFT JOIN s_status as F 
						ON E.status = F.status
						")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_jaminan', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman Monitoring jatuh tempo
	function list_jatuh_tempo()
	{
		$data['izin'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON A.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							LEFT JOIN data_perben as G
							ON B.id_jaminan = G.id_jaminan
							ORDER BY A.tgl_surat DESC
							")->result();
		
		$data['penjamin'] =
			$this->db->query(" SELECT * FROM penjamindetail
						")->result();
						
		$data['tpb'] =
			$this->db->query(" SELECT * FROM tpbdetail
						")->result();
		
		$data['status'] =
			$this->db->query(" SELECT * FROM s_status
						")->result();
												
		$data['kegiatan'] =
			$this->db->query(" SELECT * FROM kegiatan
						")->result();
		
		$data['status'] =
			$this->db->query(" SELECT * FROM s_status
						")->result();				

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/list_jatuh_tempo', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman Lihat Jaminan
	function detail_jaminan($id)
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							LEFT JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							LEFT JOIN tpbdetail as C
							ON B.id_tpb = C.id_tpb
							LEFT JOIN penjamindetail as D
							ON B.id_penjamin = D.id_penjamin
							WHERE A.id_surat = $id
							")->result();
		
		$data['surat'] =
			$this->db->query("SELECT * FROM data_izin as A
							LEFT JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							LEFT JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							LEFT JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							JOIN kegiatan as H 
							ON A.kegiatan = H.id
							WHERE A.id_surat = $id
							")->result();
		
		$data['perben'] =
			$this->db->query("SELECT * FROM data_izin as A
							LEFT JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							LEFT JOIN data_perben as C
							ON B.id_jaminan = C.id_jaminan
							LEFT JOIN data_status as D
							ON A.id_surat = D.id_surat
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
							WHERE F.id_surat = $id
							")->result();					

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/detail_jaminan',$data);
		$this->load->view('perben/kasubsi/v_foot');
	}
	
	//Halaman Penerbitan BPJ
	function penerbitan_bpj($id)
	{
		$a = $this->session->userdata('id');
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							LEFT JOIN data_perben as G 
							ON B.id_jaminan = G.id_jaminan
							JOIN kegiatan as H 
							ON A.kegiatan = H.id
							WHERE A.id_surat = $id
							")->result();

		$data['nomor'] = $this->nomor_model->get_bpj();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/penerbitan_bpj', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	function penelitian_lanjut($id)
	{
		$a = $this->session->userdata('id');
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN data_perben as G 
							ON B.id_jaminan = G.id_jaminan
							WHERE A.id_surat = $id
							")->result();

		$data['nomor'] = $this->nomor_model->get_bpj();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/penelitian_lanjut', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman Lihat Jaminan
	function penelitian_jaminan_cb($id)
	{
		$a = $this->session->userdata('id');
		
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							LEFT JOIN data_perben as G 
							ON B.id_jaminan = G.id_jaminan
							JOIN kegiatan as H 
							ON A.kegiatan = H.id
							WHERE A.id_surat = $id
							")->result();

		$data['notif'] =
			$this->db->query("SELECT * FROM data_izin as A
									JOIN data_jaminan as B
									ON A.id_surat = B.id_surat
									JOIN tpbdetail as E 
									ON B.id_tpb = E.id_tpb
									WHERE A.id_surat = $id
									")->result();

		$data['nomor'] = $this->nomor_model->get_bpj();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/penelitian_jaminan_cb', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman Penelitian Jaminan Tunai
	function penelitian_jaminan_tn($id)
	{
        $a = $this->session->userdata('id');
        
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							INNER JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							INNER JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							INNER JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN data_perben as F
							ON B.id_jaminan = F.id_jaminan
							WHERE B.bentuk_jaminan = '2'
							AND A.id_surat = $id
							")->result();
		$data['notif'] =
			$this->db->query("SELECT * FROM data_izin as A
									JOIN data_jaminan as B
									ON A.id_surat = B.id_surat
									JOIN tpbdetail as E 
									ON B.id_tpb = E.id_tpb
									WHERE A.id_surat = $id
									")->result();

		$data['nomor'] = $this->nomor_model->get_bpj();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/penelitian_jaminan_tn', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman Penelitian Jaminan Bank Garansi
	function penelitian_jaminan_bg($id)
	{
        $a = $this->session->userdata('id');
        
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							INNER JOIN data_izin as B
							ON A.id_surat = B.id_surat
							INNER JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							INNER JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN data_perben as F
							ON B.id_jaminan = F.id_jaminan
							WHERE B.bentuk_jaminan = '3'
							AND B.id_surat = $id
							")->result();
		$data['notif'] =
			$this->db->query("SELECT * FROM data_izin as A
									JOIN data_jaminan as B
									ON A.id_surat = B.id_surat
									JOIN tpbdetail as E 
									ON B.id_tpb = E.id_tpb
									WHERE A.id_surat = $id
									")->result();

		$data['nomor'] = $this->nomor_model->get_bpj();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/penelitian_jaminan_bg', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman Periksa Jaminan
	function penelitian_penarikan_jaminan($id)
	{
		$a = $this->session->userdata('id');

		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							INNER JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							INNER JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							INNER JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							INNER JOIN data_perben as G
							ON B.id_jaminan = G.id_jaminan
							WHERE A.id_surat = $id
							")->result();

		$data['notif'] =
			$this->db->query("SELECT * FROM data_izin as A
            				JOIN data_jaminan as B
            				ON A.id_surat = B.id_surat
            				JOIN tpbdetail as E 
            				ON B.id_tpb = E.id_tpb
            				WHERE A.id_surat = $id
            				")->result();

		$data['nomor'] = $this->nomor_model->get_ttpj();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/penelitian_penarikan_jaminan', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}

	//Halaman Jaminan Di Tolak
	function jaminan_ditolak()
	{
		$data['izin'] =
			$this->db->query("SELECT * FROM data_izin as A
							JOIN data_izin as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							JOIN data_perben as G 
							LEFT ON B.id_jaminan = G.id_jaminan
							WHERE C.status = '13'
							ORDER BY B.tgl_surat DESC
							")->result();

		$this->load->view('perben/kasubsi/v_head');
		$this->load->view('perben/kasubsi/jaminan_ditolak', $data);
		$this->load->view('perben/kasubsi/v_foot');
	}
	
	function laporan()
	{
		$data['laporan'] =
		$this->db->query("SELECT * FROM data_izin as A
						LEFT JOIN data_jaminan as B
						ON A.id_surat = B.id_surat
						JOIN data_status as C
						ON A.id_surat = C.id_surat
						JOIN s_status as D
						ON C.status = D.status
						LEFT JOIN tpbdetail as E 
						ON A.id_tpb = E.id_tpb
						LEFT JOIN penjamindetail as F 
						ON B.id_penjamin = F.id_penjamin
						LEFT JOIN data_perben as G
						ON B.id_jaminan = G.id_jaminan
						ORDER BY A.tgl_surat DESC
						")->result();
				
		$this->load->view("perben/kasubsi/v_head");
		$this->load->view("perben/kasubsi/laporan", $data);
		$this->load->view("perben/kasubsi/v_foot");
	}

	//Fungsi Tambah Jaminan Customs Bond
	function tambah_jaminan_act()
	{

		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');

		$nama_teliti = $this->input->post('nama_teliti');
		$waktu_teliti = $this->input->post('waktu_teliti');
		$catatan_teliti = $this->input->post('catatan_teliti');
		$nomor_bpj = $this->input->post('nomor_bpj');
		$tanggal_bpj = $this->input->post('tanggal_bpj');

		$bentuk_konfirmasi = $this->input->post('bentuk_konfirmasi');

		$status = $this->input->post('status');

		// insert data ke database
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'nama_teliti' => $nama_teliti,
			'waktu_teliti' => $waktu_teliti,
			'catatan_teliti' => $catatan_teliti,
			'nomor_bpj' => $nomor_bpj,
			'tanggal_bpj' => $tanggal_bpj,
			'bentuk_konfirmasi' => $bentuk_konfirmasi,
		);
		$this->m_data->update_data($where, $data, 'data_perben');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		$this->sendmessage_teliti();

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenkasubsi/list_konfimasi');
	}

	//Fungsi Tambah Jaminan Tunai
	function tambah_jaminan_tn_act()
	{

		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');

		$nama_teliti = $this->input->post('nama_teliti');
		$waktu_teliti = $this->input->post('waktu_teliti');
		$catatan_teliti = $this->input->post('catatan_teliti');
		$nomor_bpj = $this->input->post('nomor_bpj');
		$tanggal_bpj = $this->input->post('tanggal_bpj');

		$status = $this->input->post('status');

		// insert data ke database
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'nama_teliti' => $nama_teliti,
			'waktu_teliti' => $waktu_teliti,
			'catatan_teliti' => $catatan_teliti,
			'nomor_bpj' => $nomor_bpj,
			'tanggal_bpj' => $tanggal_bpj,
		);
		$this->m_data->update_data($where, $data, 'data_perben');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenkasubsi/list_jaminan_tn');
	}

	//Fungsi Tambah Jaminan Bank Garansi
	function tambah_jaminan_bg_act()
	{

		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');

		$nama_teliti = $this->input->post('nama_teliti');
		$waktu_teliti = $this->input->post('waktu_teliti');
		$catatan_teliti = $this->input->post('catatan_teliti');
		$nomor_bpj = $this->input->post('nomor_bpj');
		$tanggal_bpj = $this->input->post('tanggal_bpj');

		$status = $this->input->post('status');

		// insert data ke database
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'nama_teliti' => $nama_teliti,
			'waktu_teliti' => $waktu_teliti,
			'catatan_teliti' => $catatan_teliti,
			'nomor_bpj' => $nomor_bpj,
			'tanggal_bpj' => $tanggal_bpj,
		);
		$this->m_data->update_data($where, $data, 'data_perben');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenkasubsi/list_jaminan_bg');
	}

	//Fungsi Tambah Jaminan Customs Bond
	function tambah_pengembalian_act()
	{	
		$data['izin'] = $this->m_data->get_data('penolakan')->result();

		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');
		$status = $this->input->post('status');
		$catatan_pengembalian = $this->input->post('catatan_pengembalian');
		$waktu_rekam = $this->input->post('waktu_rekam');
		$nip_rekam = $this->input->post('nip_rekam');
		$bentuk_penolakan = $this->input->post('bentuk_penolakan');
		
		// insert data ke database
		$data = array(
			'id_jaminan' => $id_jaminan,
			'catatan_pengembalian' => $catatan_pengembalian,
			'waktu_rekam' => $waktu_rekam,
			'nip_rekam' => $nip_rekam,
			'bentuk_penolakan' => $bentuk_penolakan,
		);
		$this->m_data->insert_data($data, 'penolakan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenkasubsi/list_penarikan_jaminan'); 
	}

	//Fungsi Tambah Jaminan Customs Bond
	function tambah_pencairan_act()
	{

		$data['izin'] = $this->m_data->get_data('penolakan')->result();
		
		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');
		$bea_masuk = $this->input->post('bea_masuk');
		$ppn = $this->input->post('ppn');
		$pph = $this->input->post('pph');
		$denda = $this->input->post('denda');
		$nomor_billing = $this->input->post('nomor_billing');
		$waktu_rekam = $this->input->post('waktu_rekam');
		$nip_rekam = $this->input->post('nip_rekam');
		$bentuk_penolakan = $this->input->post('bentuk_penolakan');
		$status = $this->input->post('status');

		// insert data ke database
		$data = array(
			'id_jaminan' => $id_jaminan,
			'bea_masuk' => $bea_masuk,
			'ppn' => $ppn,
			'pph' => $pph,
			'denda' => $denda,
			'nomor_billing' => $nomor_billing,
			'waktu_rekam' => $waktu_rekam,
			'nip_rekam' => $nip_rekam,
			'bentuk_penolakan' => $bentuk_penolakan,
		);
		$this->m_data->insert_data($data, 'penolakan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenkasubsi/list_penarikan_jaminan');
	}

	// Fungsi Tambah Jaminan Customs Bond
	function rekam_penarikan_jaminan_act()
	{
		
		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');
		$nomor_ttpj = $this->input->post('nomor_ttpj');
		$tanggal_ttpj = $this->input->post('tanggal_ttpj');
		$status = $this->input->post('status');

		$catatan_penelitian_penarikan = $this->input->post('catatan_penelitian_penarikan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// update status penarikan
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'catatan_penelitian_penarikan' => $catatan_penelitian_penarikan,
			'nomor_ttpj' => $nomor_ttpj,
			'tanggal_ttpj' => $tanggal_ttpj,
		);
		$this->m_data->update_data($where, $data, 'data_perben');

		$this->sendmessage_teliti2();

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenkasubsi/list_penarikan_jaminan/');
	}

	//Fungsi Tambah Konfirmasi
	function tambah_konfirmasi_act()
	{

		$data['izin'] = $this->m_data->get_data('data_perben')->result();

		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');
		$status = $this->input->post('status');
		$bentuk_konfirmasi = $this->input->post('bentuk_konfirmasi');
		$catatan_konfirmasi = $this->input->post('catatan_konfirmasi');

		// insert data ke database
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'bentuk_konfirmasi' => $bentuk_konfirmasi,
			'catatan_konfirmasi' => $catatan_konfirmasi,

		);
		$this->m_data->update_data($where, $data, 'data_perben');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		$this->sendmessage_konfirm1();

		// mengalihkan halaman ke halaman list jaminan
		redirect('/perbenkasubsi/list_konfirmasi/');
	}

	//Fungsi Konfirmasi
	function konfirmasi()
	{
		$id_surat = $this->input->post('id_surat');
		$status = $this->input->post('status');
		$where = array('id_surat' => $id_surat);
		$data = array(
			'status' => $status
		);
		$this->m_data->update_data($where, $data, 'data_status');

		redirect('perbenkasubsi/list_jaminan');
	}

	function sendmessage_konfirm1()
	{
		$telegram_id = $this->input->post('telegram_id');
		$nosurat = $this->input->post('nosurat');
		$nojaminan = $this->input->post('nojaminan');
		$kasubsi = $this->input->post('kasubsi');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";

		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=_" . $kasubsi . "_: Anda memiliki jaminan untuk dikonfirmasi dengan nomor surat *S-"
			. urlencode($nosurat) . "* dan no e-Jaminan *" . $nojaminan . "*.";
		$ch = curl_init();
		$optArray = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);

		// mengalihkan halaman ke halaman list jaminan
		redirect('/perbenkasubsi/list_konfirmasi/');
	}

	function sendmessage_teliti()
	{
		$telegram_id = $this->input->post('telegram_id');
		$nosurat = $this->input->post('nosurat');
		$nojaminan = $this->input->post('nojaminan');
		$kasubsi = $this->input->post('kasubsi');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";

		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=_" . $kasubsi . "_: Pengajuan e-BPJ Anda dengan nomor surat *S-"
			. urlencode($nosurat) . "* telah disetujui dan diterbitkan e-BPJ nomor *" . $nojaminan . "/eBPJ/CB/2019*.";
		$ch = curl_init();
		$optArray = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenkasubsi/list_jaminan_cb');
	}

	function sendmessage_teliti2()
	{
		$telegram_id = $this->input->post('telegram_id');
		$nosurat = $this->input->post('nosurat');
		$nottpj = $this->input->post('nomor_ttpj');
		$kasubsi = $this->input->post('kasubsi');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";

		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=_" . $kasubsi . "_: Pengajuan penarikan jaminan Anda dengan nomor surat *S-"
			. urlencode($nosurat) . "* telah disetujui dan diterbitkan TTPJ nomor *eTTPJ-" . $nottpj . ".2019*.";
		$ch = curl_init();
		$optArray = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenkasubsi/list_penarikan_jaminan/');
	}
	
	function pencarian(){
	    $this->load->model('perben');
	    
	    $penjamin = $this->input->get('penjamin');
	    $data['hasil'] = $this->perben->pencarian($penjamin)->result_array();
	    $this->load->view('perben/kasubsi/pencarian',$data);
	}

}
