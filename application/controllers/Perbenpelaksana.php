<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbenpelaksana extends CI_Controller
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

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/home', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Tabel Jaminan Customs Bond
	function list_rekam()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							LEFT JOIN tpbdetail as B 
							ON A.id_tpb = B.id_tpb
							LEFT JOIN pengusaha_detail as C 
							ON A.id_tpb = C.id_pengusaha
							JOIN data_status as E 
							ON A.id_surat = E.id_surat
							JOIN s_status as F 
							ON E.status = F.status
							JOIN kegiatan as H 
							ON A.kegiatan = H.id
							WHERE E.status IN ('1','23')
						")->result();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_rekam', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Tabel Jaminan Customs Bond
	function list_jaminan_cb()
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
						WHERE B.bentuk_jaminan = '1' AND E.status = '6'
						ORDER BY E.status ASC
						")->result();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_jaminan_cb', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Tabel Jaminan Tunai
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
							WHERE B.bentuk_jaminan = '2' AND C.status = '12'
							ORDER BY C.status ASC
							")->result();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_jaminan_tn', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Tabel Bank Garansi
	function list_jaminan_bg()
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
							WHERE B.bentuk_jaminan = '3' AND C.status = '8'
							ORDER BY C.status ASC
							")->result();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_jaminan_bg', $data);
		$this->load->view('perben/pelaksana/v_foot');
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

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_jaminan_ln', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Jaminan Di Tolak
	function list_jaminan_ditolak()
	{
		$data['tolak'] =
			$this->db->query("SELECT * FROM penolakan as A
			                   JOIN data_jaminan as B 
			                   ON A.id_jaminan = B.id_jaminan 
			                   JOIN data_izin as C 
			                   ON B.id_surat = C.id_surat
			                   JOIN tpbdetail as D 
							   ON B.id_tpb = D.id_tpb
							   JOIN penjamindetail as E
						       ON B.id_penjamin = E.id_penjamin
						       JOIN penolakan as F 
						       ON B.id_jaminan = F.id_jaminan
							")->result();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_jaminan_ditolak', $data);
		$this->load->view('perben/pelaksana/v_foot');
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
							WHERE C.status = '16'
							ORDER BY C.status DESC
							")->result();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_penarikan_jaminan', $data);
		$this->load->view('perben/pelaksana/v_foot');
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

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_jatuh_tempo', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Tabel Jaminan Customs Bond
	function list_penarikan_lain()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
						JOIN data_izin as B 
						ON A.id_surat = B.id_surat
						JOIN tpbdetail as C 
						ON B.id_tpb = C.id_tpb
						LEFT JOIN penjamindetail as D 
						ON A.id_penjamin = D.id_penjamin
						JOIN data_status as E 
						ON B.id_surat = E.id_surat
						JOIN s_status as F 
						ON E.status = F.status
						JOIN data_perben as G
						ON A.id_jaminan = G.id_jaminan
						WHERE B.kegiatan >= 8
						")->result();


		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_jaminan', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Tabel Jaminan Customs Bond
	function list_ebpj()
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
						JOIN data_izin as B 
						ON A.id_surat = B.id_surat
						JOIN tpbdetail as C 
						ON B.id_tpb = C.id_tpb
						LEFT JOIN penjamindetail as D 
						ON A.id_penjamin = D.id_penjamin
						JOIN data_status as E 
						ON B.id_surat = E.id_surat
						JOIN s_status as F 
						ON E.status = F.status
						LEFT JOIn data_perben as G
						ON A.id_jaminan = G.id_jaminan
						WHERE E.status = '11'
						ORDER BY E.status ASC
						")->result();


		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_ebpj', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Tabel Jaminan Customs Bond
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

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/list_penolakan', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Detail Jaminan
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

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/detail_jaminan',$data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Detail Jaminan
	function setting()
	{
		$a = $this->session->userdata('id');

		$data['jaminan'] =
			$this->db->query("SELECT * FROM bcuser as A
							where id_bc = $a
						")->result();
		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/setting', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Detail Jaminan
	function rekam_tools()
	{
		$a = $this->session->userdata('id');

		$data['pengumuman'] =
			$this->db->query("SELECT * FROM tools where jenis_tools = '1'
						")->result();
						
	    $data['peraturan'] =
			$this->db->query("SELECT * FROM tools where jenis_tools = '2'
						")->result();
						
		$data['faq'] =
			$this->db->query("SELECT * FROM tools where jenis_tools = '3'
						")->result();
						
		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/rekam_tools', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}


	//Halaman Periksa Jaminan
	function periksa_jaminan_cb($id)
	{
		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							LEFT JOIN data_izin as B
							ON A.id_surat = B.id_surat
							LEFT JOIN data_status as C
							ON B.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON A.id_penjamin = F.id_penjamin
							LEFT JOIN kegiatan as H 
							ON B.kegiatan = H.id
							WHERE A.id_jaminan = $id
							")->result();

		$data['nomor'] = $this->nomor_model->get_ttsj();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/periksa_jaminan_cb', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Periksa Jaminan Tunai
	function periksa_jaminan_tn($id)
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
							WHERE B.bentuk_jaminan = '2'
							AND A.id_surat = $id
							")->result();

		$data['nomor'] = $this->nomor_model->get_ttsj();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/periksa_jaminan_tn', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Periksa Jaminan Bank Garansi
	function periksa_jaminan_bg($id)
	{
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
							WHERE B.bentuk_jaminan = '3'
							AND B.id_surat = $id
							")->result();

		$data['nomor'] = $this->nomor_model->get_ttsj();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/periksa_jaminan_bg', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	//Halaman Periksa Jaminan
	function periksa_penarikan_jaminan($id)
	{
		$a = $this->session->userdata('id');

		$data['jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							LEFT JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							LEFT JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							LEFT JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							WHERE A.id_surat = $id
							")->result();
							
        $data['nomor'] = $this->nomor_model->get_ttsj();
		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/periksa_penarikan_jaminan', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	

	// Fungsi Rekam Izin
	function rekam_izin()
	{
		$data['tpbdetail'] =
			$this->db->query("SELECT * FROM tpbdetail ORDER BY nama_tpb ASC")->result();
		$data['pengusaha_detail'] =
			$this->db->query("SELECT * FROM pengusaha_detail")->result();
		$data['bckasi'] =
			$this->db->query("SELECT * FROM bckasi as A
						  JOIN bcuser as B ON A.id_bc = b.id_bc
						  ORDER BY id_kasi")->result();
		$data['kegiatan'] =
			$this->db->query("SELECT * FROM kegiatan ORDER BY id")->result();
		$data['last'] =
			$this->db->query("SELECT id_surat FROM data_izin ORDER BY id_surat DESC LIMIT 1")->result();


		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/rekam_izin', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	// Fungsi Rekam Jaminan
	function rekam_jaminan($id)
	{
		$data['izin'] =
			$this->db->query("SELECT * FROM data_izin as A
							LEFT JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							LEFT JOIN data_status as C
							ON A.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							LEFT JOIN tpbdetail as E 
							ON A.id_tpb = E.id_tpb
							LEFT JOIN pengusaha_detail as F
							ON E.id_tpb = F.id_pengusaha
							WHERE A.id_surat = $id
							")->result();

			$data['penjamin'] =
			$this->db->query(" SELECT * FROM penjamindetail
							")->result();	

			$data['last'] =
			$this->db->query("SELECT id_jaminan FROM data_jaminan ORDER BY id_jaminan DESC LIMIT 1")->result();
			
			$data['nomor'] = $this->nomor_model->get_ttsj();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/rekam_jaminan', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}
	
	function laporan()
		{
			$a = $this->session->userdata('id');

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
							JOIN kegiatan as H 
							ON A.kegiatan = H.id
							ORDER BY A.tgl_surat DESC
							")->result();
					
			$this->load->view("perben/pelaksana/v_head");
			$this->load->view("perben/pelaksana/laporan", $data);
			$this->load->view("perben/pelaksana/v_foot");
		}

	// Fungsi Rekam Perusahaan
	
	function rekam_perusahaan()
	{
		$data['perusahaan'] =
			$this->db->query("SELECT * FROM tpbdetail ORDER BY id_tpb
							")->result();

		$this->load->view('perben/pelaksana/v_head');
		$this->load->view('perben/pelaksana/rekam_perusahaan', $data);
		$this->load->view('perben/pelaksana/v_foot');
	}

	// Fungsi Tambah Jaminan Customs Bond
	function rekam_izin_act()
	{
		$data['data_izin'] = $this->m_data->get_data('data_izin')->result();
		$permohonan = $this->input->post('permohonan');
		$no_surat = $this->input->post('no_surat');
		$tgl_surat = $this->input->post('tgl_surat');
		$pkc = $this->input->post('pkc');
		$id_tpb = $this->input->post('id_tpb');
		$kegiatan = $this->input->post('kegiatan');
		$jth_tempo = $this->input->post('jth_tempo');
		$nilai = $this->input->post('nilai');
		$tujuan = $this->input->post('tujuan');

		$data = array(
			'no_permohonan' => $permohonan,
			'no_surat' => $no_surat,
			'tgl_surat' => $tgl_surat,
			'pkc' => $pkc,
			'id_tpb' => $id_tpb,
			'kegiatan' =>$kegiatan,
			'jth_tempo' => $jth_tempo,
			'nilai' => $nilai,
			'tujuan' => $tujuan,
		);
		$this->m_data->insert_data($data, 'data_izin');

		$data['data_izin'] = $this->m_data->get_data('data_izin')->result();
		$idsurat = $this->input->post('id_surat');
		$status = $this->input->post('status');

		$data = array(
			'id_surat' => $idsurat,
			'status' => $status,
		);
		$this->m_data->insert_data($data, 'data_status');

		redirect(site_url() . 'perbenpelaksana/list_rekam');
	}

	function rekam_jaminan_act()
	{	
		$data['jaminan'] = $this->m_data->get_data('data_jaminan')->result();
		$id_surat = $this->input->post('id_surat');

		$bentuk_jaminan = $this->input->post('bentuk_jaminan');
		$no_jaminan = $this->input->post('no_jaminan');
		$tgl_jaminan = $this->input->post('tgl_jaminan');
		$id_penjamin = $this->input->post('id_penjamin');
		$id_tpb = $this->input->post('id_tpb');

		$status = $this->input->post('status');

		// Input ke tabel data_jaminan
		$data = array(
			'id_surat' => $id_surat,
			'bentuk_jaminan' => $bentuk_jaminan,	
			'no_jaminan' => $no_jaminan,
			'tgl_jaminan' => $tgl_jaminan,
			'id_penjamin' => $id_penjamin,
			'id_tpb' => $id_tpb,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'data_jaminan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . 'perbenpelaksana/');
	}



	// Fungsi Tambah Jaminan Customs Bond
	function rekam_jaminan_tn()
	{
		$id_surat = $this->input->post('id_surat');

		$no_jaminan = $this->input->post('no_jaminan');
		$tgl_jaminan = $this->input->post('tgl_jaminan');
		$bentuk_jaminan = $this->input->post('bentuk_jaminan');
		$id_tpb = $this->input->post('id_tpb');
		

		$status = $this->input->post('status');

		$data = array(
		    'id_surat' => $id_surat,
			'no_jaminan' => $no_jaminan,
			'tgl_jaminan' => $tgl_jaminan,
			'bentuk_jaminan' => $bentuk_jaminan,
			'id_tpb' => $id_tpb,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'data_jaminan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/list_jaminan_tn');
	}

	// Fungsi Tambah Jaminan Bank Garansi
	function rekam_jaminan_bg()
	{
		$id_surat = $this->input->post('id_surat');

		$no_jaminan = $this->input->post('no_jaminan');
		$tgl_jaminan = $this->input->post('tgl_jaminan');
		$bentuk_jaminan = $this->input->post('bentuk_jaminan');
		$id_tpb = $this->input->post('id_tpb');
		

		$status = $this->input->post('status');

		$data = array(
		    'id_surat' => $id_surat,
			'no_jaminan' => $no_jaminan,
			'tgl_jaminan' => $tgl_jaminan,
			'bentuk_jaminan' => $bentuk_jaminan,
			'id_tpb' => $id_tpb,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'data_jaminan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/list_jaminan_bg');
	}

	// Fungsi Tambah Jaminan Customs Bond
	function rekam_penarikan_jaminan_act()
	{
		$data['izin'] = $this->m_data->get_data('data_perben')->result();
		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');
		$status = $this->input->post('status');
		$catatan_periksa_penarikan = $this->input->post('catatan_periksa_penarikan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');
		
		// update status penarikan
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'catatan_periksa_penarikan' => $catatan_periksa_penarikan,
		);
		$this->m_data->update_data($where, $data, 'data_perben');

		$this->sendmessage_periksa2();

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/list_penarikan_jaminan/' . $id_jaminan);
	}

	// Fungsi Periksa Jaminan Customs Bond
	function periksa_jaminan_cb_act()
	{

		$id_jaminan = $this->input->post('id_jaminan');
		$id_surat = $this->input->post('id_surat');
		$nama_periksa = $this->input->post('nama_periksa');
		$waktu_periksa = $this->input->post('waktu_periksa');
		$nomor = $this->input->post('nomor_ttsj');
		$tanggal = $this->input->post('tanggal_ttsj');
		$status = $this->input->post('status');
		$catatan_periksa = $this->input->post('catatan_periksa');
        
        // update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');
        
		$data = array(
			'id_jaminan' => $id_jaminan,
			'nama_periksa' => $nama_periksa,
			'waktu_periksa' => $waktu_periksa,
			'catatan_periksa' => $catatan_periksa,
			'nomor_ttsj' => $nomor,
			'tanggal_ttsj' => $tanggal,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'data_perben');

		$this->sendmessage_periksa();

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/list_jaminan_cb');
	}

	// Fungsi Periksa Jaminan Tunai
	function periksa_jaminan_tn_act()
	{

		$data['izin'] = $this->m_data->get_data('data_jaminan')->result();
		$id_jaminan = $this->input->post('id_jaminan');
		$id_surat = $this->input->post('id_surat');
		$status = $this->input->post('status');
		$nama_periksa = $this->input->post('nama_periksa');
		$catatan_periksa = $this->input->post('catatan_periksa');
		$waktu_periksa = $this->input->post('waktu_periksa');
		$nomor = $this->input->post('nomor_ttsj');
		$tanggal = $this->input->post('tanggal_ttsj');
		
		$no_jaminan = $this->input->post('no_jaminan');
		$tgl_jaminan = $this->input->post('tgl_jaminan');

		$data = array(
			'id_jaminan' => $id_jaminan,
			'nama_periksa' => $nama_periksa,
			'waktu_periksa' => $waktu_periksa,
			'catatan_periksa' => $catatan_periksa,
			'nomor_ttsj' => $nomor,
			'tanggal_ttsj' => $tanggal,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'data_perben');
		
		//update no dan tgl jaminan
		$where = array('id_jaminan' => $id_jaminan);
		$data = array('no_jaminan' => $no_jaminan, 'tgl_jaminan' => $tgl_jaminan);
		$this->m_data->update_data($where, $data, 'data_jaminan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/list_jaminan_tn');
	}

	// Fungsi Periksa Jaminan Tunai
	function periksa_jaminan_bg_act()
	{

		$data['izin'] = $this->m_data->get_data('data_jaminan')->result();
		$id_jaminan = $this->input->post('id_jaminan');
		$id_surat = $this->input->post('id_surat');
		$status = $this->input->post('status');
		$nama_periksa = $this->input->post('nama_periksa');
		$catatan_periksa = $this->input->post('catatan_periksa');
		$waktu_periksa = $this->input->post('waktu_periksa');
		$nomor = $this->input->post('nomor_ttsj');
		$tanggal = $this->input->post('tanggal_ttsj');
		
		$no_jaminan = $this->input->post('no_jaminan');
		$tgl_jaminan = $this->input->post('tgl_jaminan');

		$data = array(
			'id_jaminan' => $id_jaminan,
			'nama_periksa' => $nama_periksa,
			'waktu_periksa' => $waktu_periksa,
			'catatan_periksa' => $catatan_periksa,
			'nomor_ttsj' => $nomor,
			'tanggal_ttsj' => $tanggal,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'data_perben');
		
		//update no dan tgl jaminan
		$where = array('id_jaminan' => $id_jaminan);
		$data = array('no_jaminan' => $no_jaminan, 'tgl_jaminan' => $tgl_jaminan);
		$this->m_data->update_data($where, $data, 'data_jaminan');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/list_jaminan_bg');
	}



	// Fungsi Tolak Jaminan
	function tolak_jaminan_act()
	{

		$data['izin'] = $this->m_data->get_data('data_perben')->result();
		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');
		$nama_teliti = $this->input->post('nama_teliti');
		$waktu_teliti = $this->input->post('waktu_teliti');
		$status = $this->input->post('status');
		$catatan_teliti = $this->input->post('catatan_teliti');


		// insert data ke database
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'nama_teliti' => $nama_teliti,
			'waktu_teliti' => $waktu_teliti,
			'catatan_teliti' => $catatan_teliti,
		);
		$this->m_data->update_data($where, $data, 'data_perben');

		// update status jaminan
		$where = array('id_surat' => $id_surat);
		$data = array('status' => $status);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/jaminan_ditolak');
	}

	// Fungsi Tambah Pengusaha
	function tambah_pengusaha_act()
	{

		$data['pengusaha'] = $this->m_data->get_data('tpbdetail')->result();
		$id_tpb = $this->input->post('id_tpb');
		$npwp_tpb = $this->input->post('npwp_tpb');
		$nama_tpb = $this->input->post('nama_tpb');
		$alamat_tpb = $this->input->post('alamat_tpb');
		$no_skep = $this->input->post('no_skep');

		$data = array(
			'id_tpb' => $id_tpb,
			'npwp_tpb' => $npwp_tpb,
			'nama_tpb' => $nama_tpb,
			'alamat_tpb' => $alamat_tpb,
			'no_skep' => $no_skep,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'tpbdetail');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/rekam_izin');
	}

	// Fungsi Terima Hardcopy
	function terima_hardcopy()
	{

		$data['izin'] = $this->m_data->get_data('data_perben')->result();
		$id_jaminan = $this->input->post('id_jaminan');
		$hardcopy = $this->input->post('hardcopy');

		$data = array(
			'id_jaminan' => $id_jaminan,
			'hardcopy' => $hardcopy,
		);

		// update status jaminan
		$where = array('id_jaminan' => $id_jaminan);
		$data = array('hardcopy' => $hardcopy);
		$this->m_data->update_data($where, $data, 'data_perben');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana');
	}
	
	// Fungsi Tambah Pengusaha
	function tambah_tools_pengumuman()
	{
		$jenis_tools = $this->input->post('jenis_tools');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$tanggal = $this->input->post('tanggal');
		$user = $this->input->post('user');
		
		$data = array(
			'jenis_tools' => $jenis_tools,
			'judul' => $judul,
			'isi' => $isi,
			'tanggal' => $tanggal,
			'user' => $user,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'tools');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/rekam_tools');
	}

	// Fungsi Tambah Pengusaha
	function tambah_tools_peraturan()
	{
		$jenis_tools = $this->input->post('jenis_tools');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$link = $this->input->post('link');
		$tanggal = $this->input->post('tanggal');
		$user = $this->input->post('user');
		
		$data = array(
			'jenis_tools' => $jenis_tools,
			'judul' => $judul,
			'isi' => $isi,
			'link' => $link,
			'tanggal' => $tanggal,
			'user' => $user,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'tools');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/rekam_tools');
	}

	// Fungsi Tambah Pengusaha
	function tambah_tools_faq()
	{
		$jenis_tools = $this->input->post('jenis_tools');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$tanggal = $this->input->post('tanggal');
		$user = $this->input->post('user');
		
		$data = array(
			'jenis_tools' => $jenis_tools,
			'judul' => $judul,
			'isi' => $isi,
			'tanggal' => $tanggal,
			'user' => $user,
		);
		// insert data ke database
		$this->m_data->insert_data($data, 'tools');

		// mengalihkan halaman ke halaman list jaminan
		redirect(site_url() . '/perbenpelaksana/rekam_tools');
	}

	function sendmessage_periksa()
	{
		$data = $this->db->query(" SELECT * FROM bcuser as A
		WHERE A.unit = '2' AND A.level = '2' AND LENGTH(A.telegram_id) > '5'
		")->result();
		$pelaksana = $this->input->post('pelaksana');
		$nosurat = $this->input->post('nosurat');
		$catatan = $this->input->post('catatan_periksa');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";
		foreach ($data as $tel_id) {
			$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $tel_id->telegram_id;
			$url = $url . "&text=_" . $pelaksana . "_: Anda menerima pengajuan e-BPJ baru dengan nomor surat *S-"
				. urlencode($nosurat) . "*. Catatan :" . $catatan;
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
		redirect(site_url() . '/perbenpelaksana/list_jaminan_cb');
	}

	function sendmessage_periksa2()
	{
		$data = $this->db->query(" SELECT * FROM bcuser as A
		WHERE A.unit = '2' AND A.level = '2' AND LENGTH(A.telegram_id) > '5'
		")->result();
		$pelaksana = $this->input->post('pelaksana');
		$nobpj = $this->input->post('nobpj');
		$catatan = $this->input->post('catatan_periksa');

		$secret_token = "895320479:AAEaFcR7JqlUUnpwSjZfBgrDR2prfWtAHcU";
		foreach ($data as $tel_id) {
			$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $tel_id->telegram_id;
			$url = $url . "&text=_" . $pelaksana . "_: Anda menerima pengajuan penarikan e-BPJ nomor *"
				. urlencode($nobpj) . "*.";
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
		redirect(site_url() . '/perbenpelaksana/list_penarikan_jaminan/' . $id_jaminan);
	}
}
