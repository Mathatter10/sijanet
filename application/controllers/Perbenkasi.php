<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbenkasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('m_data');
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
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/home');
		$this->load->view('perben/kasi/v_foot');
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

		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/home',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	//Halaman List Jaminan Customs Bond
	function list_jaminan_cb()
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
						WHERE E.status = '8'
						ORDER BY E.status ASC
							")->result();

		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_jaminan_cb',$data);
		$this->load->view('perben/kasi/v_foot');
	}
	
	//Halaman List Jaminan Tunai
	function list_jaminan_tn()
	{

		$data['jaminan'] =
		$this->db->query("SELECT * FROM data_jaminan as A
							INNER JOIN data_izin as B
							ON A.id_surat = B.id_surat
							INNER JOIN data_status as C
							ON B.id_surat = C.id_surat
							INNER JOIN s_status as D
							ON C.status = D.status
							INNER JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							WHERE A.bentuk_jaminan = '2'
							")->result();
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_jaminan_tn',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	function list_jaminan_bg()
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
						WHERE A.bentuk_jaminan = '3' AND E.status = '6'
						ORDER BY E.status ASC
						")->result();
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_jaminan_bg',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	function list_jaminan_ln()
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
						WHERE A.bentuk_jaminan = '5' AND E.status = '6'
						ORDER BY E.status ASC
						")->result();

		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_jaminan_ln',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	function list_konfirmasi()
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
						WHERE E.status >= 9 AND  E.status = '10'
						ORDER BY E.status ASC
							")->result();
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_konfirmasi',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	// Fungsi Rekam Jaminan
	function list_penarikan_jaminan()
	{	
		$a = $this->session->userdata('id');

		$data['jaminan'] =
		$this->db->query("SELECT * FROM data_jaminan as A
							JOIN data_izin as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON B.id_surat = C.id_surat
							JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							JOIN penjamindetail as F 
							ON A.id_penjamin = F.id_penjamin
							JOIN data_perben as G 
							ON A.id_jaminan = G.id_jaminan
							WHERE C.status >= '16'
							ORDER BY C.status ASC
							")->result();
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_penarikan_jaminan',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	function list_ebpj()
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
						LEFT JOIn data_perben as G
						ON A.id_jaminan = G.id_jaminan
						WHERE E.status = '11'
						ORDER BY E.status ASC
						")->result();
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_ebpj',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	function list_penolakan()
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
						LEFT JOIn data_perben as G
						ON A.id_jaminan = G.id_jaminan
						WHERE E.status = '0'
						ORDER BY E.status ASC
						")->result();

		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_penolakan',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	function list_jaminan()
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
						")->result();
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_jaminan',$data);
		$this->load->view('perben/kasi/v_foot');
	}

	//Halaman Data Perben
	function list_jatuh_tempo()
	{
		$data['izin'] =
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
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/list_jatuh_tempo',$data);
		$this->load->view('perben/kasi/v_foot');
	}	

	//Halaman Lihat Jaminan
	function detail_jaminan($id)
	{
		$data['jaminan'] =
		$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							JOIN kegiatan as G 
							ON A.kegiatan = G.id
							LEFT JOIN data_perben as H
							ON B.id_jaminan =  H.id_jaminan
							WHERE B.id_surat = $id
							")->result();
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/detail_jaminan',$data);
		$this->load->view('perben/kasi/v_foot');
	}
	
	//Halaman Lihat Jaminan
	function edit_jaminan($id)
	{
		$data['jaminan'] =
		$this->db->query("SELECT * FROM data_izin as A
							JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							JOIN data_status as C
							ON A.id_surat = C.id_surat
							JOIN s_status as D
							ON C.status = D.status
							JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON B.id_penjamin = F.id_penjamin
							JOIN kegiatan as G 
							ON A.kegiatan = G.id
							LEFT JOIN data_perben as H
							ON B.id_jaminan =  H.id_jaminan
							WHERE B.id_surat = $id
							")->result();
							
		$data['tpbdetail'] =
			$this->db->query("SELECT * FROM tpbdetail ORDER BY nama_tpb")->result();
		$data['kegiatan'] =
			$this->db->query("SELECT * FROM kegiatan ORDER BY id")->result();	
		$data['penjamin'] =
			$this->db->query(" SELECT * FROM penjamindetail	")->result();	
		
		$this->load->view('perben/kasi/v_head');
		$this->load->view('perben/kasi/edit_jaminan',$data);
		$this->load->view('perben/kasi/v_foot');
	}
	
	// Fungsi Tambah Jaminan Customs Bond
	function edit_jaminan_act()
	{
        // Inisialisasi Input Mulai
		$data['data_izin'] = $this->m_data->get_data('data_izin')->result();
		$id_surat = $this->input->post('id_surat');
		$id_jaminan = $this->input->post('id_jaminan');
		
		$no_surat = $this->input->post('no_surat');
		$id_tpb = $this->input->post('id_tpb');
		$kegiatan = $this->input->post('ket_giat');
		$id_penjamin = $this->input->post('id_penjamin');
		$no_jaminan = $this->input->post('no_jaminan');
		$tgl_jaminan = $this->input->post('tgl_jaminan');
		$jth_tempo = $this->input->post('jth_tempo');
		$nilai = $this->input->post('nilai');
		
		$nama_edit = $this->input->post('nama_edit');
		$waktu_edit = $this->input->post('waktu_edit');
		// Inisialisasi Input Selesai
        
        // Update data tabel data_izin Mulai
        $where = array('id_surat' => $id_surat);
		$data = array(
			'no_surat' => $no_surat,
			'id_tpb' => $id_tpb,
			'kegiatan' =>$kegiatan,
			'jth_tempo' => $jth_tempo,
			'nilai' => $nilai,
		);
		$this->m_data->update_data($where,$data, 'data_izin');
		// Update data tabel data_izin Selesai
		
        // Update data tabel data_jaminan Mulai
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'no_jaminan' => $no_jaminan,
			'tgl_jaminan' => $tgl_jaminan,
			'id_penjamin' =>$id_penjamin,
			'id_tpb' => $id_tpb,
		);
		$this->m_data->update_data($where,$data, 'data_jaminan');
		// Update data tabel data_jaminan Selesai
		
		// Update data tabel data_perben mulai
		$where = array('id_jaminan' => $id_jaminan);
		$data = array(
			'nama_edit' => $nama_edit,
			'waktu_edit' => $waktu_edit,
		);
		$this->m_data->update_data($where,$data, 'data_perben');
        
        echo $this->session->set_flashdata('success','Sukses');
        
		redirect(site_url() . 'perbenkasi/detail_jaminan/'.$id_surat);
	}
	
	function laporan()
		{
		    // Query Pemanggilan Data Laporan Mulai
			$data['laporan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							LEFT JOIN data_izin as B
							ON A.id_surat = B.id_surat
							LEFT JOIN data_status as C
							ON B.id_surat = C.id_surat
							LEFT JOIN s_status as D
							ON C.status = D.status
							LEFT JOIN tpbdetail as E 
							ON B.id_tpb = E.id_tpb
							LEFT JOIN penjamindetail as F 
							ON A.id_penjamin = F.id_penjamin
							LEFT JOIN data_perben as G
							ON A.id_jaminan = G.id_jaminan
							ORDER BY B.tgl_surat DESC
							")->result();
			// Query Pemanggilan Data Laporan Selesai				
					
			$this->load->view("perben/kasi/v_head");
			$this->load->view("perben/kasi/laporan", $data);
			$this->load->view("perben/kasi/v_foot");
		}
}
