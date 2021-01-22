<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasubsi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('m_data');

		if (empty($this->session->userdata('masuk'))) {
			redirect(site_url(), 'refresh');
		}
		
		if($this->session->userdata('unit')!='1'){
		    redirect(site_url(), 'refresh');
		}
	}

	//Halaman Kosong
	function blank()
	{
		$this->load->view('pkc/kasubsi/v_head');
		$this->load->view('pkc/kasubsi/v_blank');
		$this->load->view('pkc/kasubsi/v_foot');
	}

	//HALAMAN
	//Halaman Index
	function index()
	{
		$this->load->view('pkc/kasubsi/v_head');
		$this->load->view('pkc/kasubsi/v_index');
		$this->load->view('pkc/kasubsi/v_foot');
	}

	//Halaman Daftar Jaminan
	function list_jaminan()
	{
		$a = $this->session->userdata('id');
		$data['data_izin'] =
			$this->db->query("SELECT * FROM data_izin as A
			INNER JOIN tpbdetail as B
			ON A.id_tpb = B.id_tpb
			INNER JOIN bchanggar as C 
			ON C.id_hanggar = B.id_hanggar
			INNER JOIN data_status as D
			ON A.id_surat = D.id_surat
			JOIN s_status as E 
			ON D.status = E.status
			WHERE C.id_bc = $a
			ORDER BY A.id_surat DESC
							 ")->result();

		$this->load->view('pkc/kasubsi/v_head');
		$this->load->view('pkc/kasubsi/v_list', $data);
		$this->load->view('pkc/kasubsi/v_foot');
	}

	//Halaman Monitoring
	function monitoring()
	{
		$a = $this->session->userdata('id');
		$data['data_jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
			INNER JOIN data_izin as B
			ON A.id_surat = B.id_surat
			INNER JOIN tpbdetail as C
			ON A.id_tpb = C.id_tpb
			INNER JOIN penjamindetail as D
			ON A.id_penjamin = D.id_penjamin
			INNER JOIN bchanggar as E
			ON E.id_hanggar = C.id_hanggar
			INNER JOIN data_status as F
			ON A.id_surat = F.id_surat
			WHERE E.id_bc = $a
			ORDER BY B.jth_tempo ASC
							 ")->result();

		$this->load->view('pkc/kasubsi/v_head');
		$this->load->view('pkc/kasubsi/v_monitoring', $data);
		$this->load->view('pkc/kasubsi/v_foot');
	}


	//Halaman Detail
	function detail($id)
	{
		$where = array('id_surat' => $id);
		$data['data_izin'] =
			$this->db->query(
				"SELECT * FROM data_izin as A 
						JOIN tpbdetail as B ON A.id_tpb = B.id_tpb
						JOIN bckasi as C ON A.pkc = C.pkc
						JOIN data_status as D ON A.id_surat = D.id_surat
						JOIN s_status as E ON D.status = E.status
						JOIN kegiatan as F ON A.kegiatan = F.id
						WHERE A.id_surat = $id
						ORDER BY A.id_surat DESC"
			)->result();

		//Halaman Detail -->Data Jaminan
		$data['data_jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
		JOIN data_izin as B ON A.id_surat = B.id_surat
		JOIN tpbdetail as C ON A.id_tpb = C.id_tpb
		JOIN penjamindetail as D ON A.id_penjamin = D.id_penjamin
		WHERE B.id_surat = $id")->result();

		$data['kegiatan'] =
			$this->db->query("SELECT * FROM kegiatan ORDER BY id")->result();
		$data['bckasi'] =
			$this->db->query("SELECT * FROM bckasi ORDER BY id_kasi")->result();
		$data['tpb'] =
			$this->db->query("SELECT * FROM tpbdetail ORDER BY id_tpb")->result();

		//Halaman Detail -->Data BPJ
		$data['ebpj'] =
		$this->db->query("SELECT * FROM data_jaminan as A
		JOIN data_izin as B ON A.id_surat = B.id_surat
		JOIN tpbdetail as C ON A.id_tpb = C.id_tpb
		JOIN data_perben as D ON A.id_jaminan = D.id_jaminan
		WHERE B.id_surat = $id")->result();


		//Halaman Detail -->Data Perpanjangan Jaminan
		$data['perpanjangan'] =
			$this->db->query("SELECT * FROM perpanjangan as A
		JOIN data_izin as B ON A.id_jampj = B.id_surat
		/*JOIN tpb as C ON B.nama_kb = C.id_tpb
		JOIN pkc as D ON B.kasubsi = D.id*/
		WHERE B.id_surat = $id ORDER BY A.id_pj DESC")->result();

		//Halaman Detail -->Data Pembatalan Jaminan
		$data['pembatalan'] =
			$this->db->query("SELECT * FROM pembatalan as A
		JOIN data_izin as B ON A.id_jampb = B.id_surat
		WHERE B.id_surat = $id")->result();

		//Halaman Detail -->Data Revisi
		$data['revisi'] =
			$this->db->query("SELECT * FROM revisi as A
		JOIN data_izin as B ON A.id_surat = B.id_surat
		JOIN tpbdetail as C ON B.id_tpb = C.id_tpb
		JOIN bckasi as D ON B.pkc = D.pkc
		JOIN kegiatan as E ON B.kegiatan = E.id
		WHERE B.id_surat = $id")->result();

		$this->load->view('pkc/kasubsi/v_head');
		$this->load->view('pkc/kasubsi/v_detail', $data);
		$this->load->view('pkc/kasubsi/v_foot');
	}

	//Halaman Detail Monitoring
	function detailmon($id)
	{
		$where = array('id_surat' => $id);
		$data['data_izin'] =
			$this->db->query(
				"SELECT * FROM data_izin as A 
							JOIN tpbdetail as B ON A.id_tpb = B.id_tpb
							JOIN bckasi as C ON A.pkc = C.pkc
							JOIN data_status as D ON A.id_surat = D.id_surat
							JOIN s_status as E ON D.status = E.status
							JOIN kegiatan as F ON A.kegiatan = F.id
							WHERE A.id_surat = $id
							ORDER BY A.id_surat DESC"
			)->result();

		//Halaman Detail Monitoring -->Data Jaminan
		$data['data_jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
			JOIN data_izin as B ON A.id_surat = B.id_surat
			JOIN tpbdetail as C ON A.id_tpb = C.id_tpb
			JOIN penjamindetail as D ON A.id_penjamin = D.id_penjamin
			WHERE B.id_surat = $id")->result();

		$data['kegiatan'] =
			$this->db->query("SELECT * FROM kegiatan ORDER BY id")->result();

		$data['bckasi'] =
			$this->db->query("SELECT * FROM bckasi as A
				JOIN bcuser as B ON A.id_bc = b.id_bc
				ORDER BY id_kasi")->result();

		$data['tpb'] =
			$this->db->query("SELECT * FROM tpbdetail ORDER BY id_tpb")->result();

		//Halaman Detail Monitoring -->Data Perpanjangan Jaminan
		$data['perpanjangan'] =
			$this->db->query("SELECT * FROM perpanjangan as A
			JOIN data_izin as B ON A.id_jampj = B.id_surat
			/*JOIN tpb as C ON B.nama_kb = C.id_tpb
			JOIN pkc as D ON B.kasubsi = D.id*/
			WHERE B.id_surat = $id ORDER BY A.id_pj DESC")->result();

		//Halaman Detail Monitoring -->Data Pembatalan Jaminan
		$data['pembatalan'] =
			$this->db->query("SELECT * FROM pembatalan as A
			JOIN data_izin as B ON A.id_jampb = B.id_surat
			WHERE B.id_surat = $id")->result();

		//Halaman Detail Monitoring -->Data Revisi
		$data['revisi'] =
			$this->db->query("SELECT * FROM revisi as A
			JOIN data_izin as B ON A.id_surat = B.id_surat
			JOIN tpbdetail as C ON B.id_tpb = C.id_tpb
			JOIN bckasi as D ON B.pkc = D.pkc
			JOIN kegiatan as E ON B.kegiatan = E.id
			WHERE B.id_surat = $id")->result();

		//Halaman Detail Monitoring -->Data Revisi
		$data['keluar'] =
			$this->db->query("SELECT * FROM data_realisasi
			WHERE id_surat = $id AND jns_dok ='1'")->result();

		$data['masuk'] =
			$this->db->query("SELECT * FROM data_realisasi
			WHERE id_surat = $id AND jns_dok ='2'")->result();

		$this->load->view('pkc/kasubsi/v_head');
		$this->load->view('pkc/kasubsi/v_detailmon', $data);
		$this->load->view('pkc/kasubsi/v_foot');
	}


	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'login/?alert=logout');
	}
}
