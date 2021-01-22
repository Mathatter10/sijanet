<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaksana extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('m_data');
		
        // Cek Session User //
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
		//$this->load->view('pkc/pelaksana/v_head');
		$this->load->view('pkc/pelaksana/blank');
		//$this->load->view('pkc/pelaksana/v_foot');
	}

	//HALAMAN
	//Halaman Index
	function index()
	{
		$this->load->view('pkc/pelaksana/v_head');
		$this->load->view('pkc/pelaksana/v_index');
		$this->load->view('pkc/pelaksana/v_foot');
	}

	//Halaman Daftar Jaminan
	function list_jaminan()
	{

		$data['data_izin'] =
			$this->db->query("SELECT * FROM data_izin as A
							INNER JOIN bckasi as B
							ON A.pkc = B.pkc
							INNER JOIN tpbdetail as C
							ON A.id_tpb = C.id_tpb
							INNER JOIN data_status as D
							ON A.id_surat = D.id_surat
							JOIN s_status as E 
							ON D.status = E.status
							ORDER BY A.id_surat DESC
							 ")->result();

		$this->load->view('pkc/pelaksana/v_head');
		$this->load->view('pkc/pelaksana/v_list', $data);
		$this->load->view('pkc/pelaksana/v_foot');
	}

	//Halaman Monitoring
	function monitoring()
	{

		$data['data_jaminan'] =
			$this->db->query("SELECT * FROM data_izin as A
							LEFT JOIN data_jaminan as B
							ON A.id_surat = B.id_surat
							LEFT JOIN tpbdetail as C
							ON A.id_tpb = C.id_tpb
							LEFT JOIN penjamindetail as D
							ON B.id_penjamin = D.id_penjamin
							INNER JOIN data_status as E
							ON A.id_surat = E.id_surat
							ORDER BY A.jth_tempo ASC
							 ")->result();

		$this->load->view('pkc/pelaksana/v_head');
		$this->load->view('pkc/pelaksana/v_monitoring', $data);
		$this->load->view('pkc/pelaksana/v_foot');
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
			$this->db->query("SELECT * FROM bckasi as A
			JOIN bcuser as B ON A.id_bc = b.id_bc
			ORDER BY id_kasi")->result();

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
		JOIN pkc as D ON B.seksi = D.id*/
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

		$this->load->view('pkc/pelaksana/v_head');
		$this->load->view('pkc/pelaksana/v_detail', $data);
		$this->load->view('pkc/pelaksana/v_foot');
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
		JOIN pkc as D ON B.seksi = D.id*/
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

		$this->load->view('pkc/pelaksana/v_head');
		$this->load->view('pkc/pelaksana/v_detailmon', $data);
		$this->load->view('pkc/pelaksana/v_foot');
	}


	//Halaman Input Jaminan
	function tambah_jaminan()
	{
		$data['tpbdetail'] =
			$this->db->query("SELECT * FROM tpbdetail ORDER BY nama_tpb")->result();
		$data['bckasi'] =
			$this->db->query("SELECT * FROM bckasi as A
			JOIN bcuser as B ON A.id_bc = b.id_bc
			ORDER BY id_kasi")->result();
		$data['kegiatan'] =
			$this->db->query("SELECT * FROM kegiatan ORDER BY id")->result();
		$data['last'] =
			$this->db->query("SELECT id_surat FROM data_izin ORDER BY id_surat DESC LIMIT 1")->result();

		$this->load->view('pkc/pelaksana/v_head');
		$this->load->view('pkc/pelaksana/v_input', $data);
		$this->load->view('pkc/pelaksana/v_foot');
	}

	//Halaman Edit Jaminan
	function edit_jaminan($id)
	{
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
		$data['tpbdetail'] =
			$this->db->query("SELECT * FROM tpbdetail ORDER BY nama_tpb")->result();
		$data['bckasi'] =
			$this->db->query("SELECT * FROM bckasi as A
				JOIN bcuser as B ON A.id_bc = b.id_bc
				ORDER BY id_kasi")->result();
		$data['kegiatan'] =
			$this->db->query("SELECT * FROM kegiatan ORDER BY id")->result();
		$data['last'] =
			$this->db->query("SELECT id_surat FROM data_izin ORDER BY id_surat DESC LIMIT 1")->result();

		$this->load->view('pkc/pelaksana/v_head');
		$this->load->view('pkc/pelaksana/v_edit', $data);
		$this->load->view('pkc/pelaksana/v_foot');
	}

	//Edit Jaminan
	function ubah_jaminan_act()
	{
		$id = $this->input->post('txt_idsurat');
		$no = $this->input->post('txt_noubah');
		$tgl = $this->ubah_tanggal($this->input->post('txt_tglubah'));
		$seksi = $this->input->post('opt_seksiubah');
		$nama = $this->input->post('opt_namaperubah');
		$kegiatan = $this->input->post('opt_kegiatanubah');
		$nilai = $this->input->post('txt_nilaiubah');
		$tempo = $this->ubah_tanggal($this->input->post('txt_tempoubah'));
		$tujuan = $this->input->post('txt_tujuanubah');

		$where = array(
			'id_surat' => $id
		);

		$data = array(
			'no_surat' => $no,
			'tgl_surat' => preg_replace("/[^A-Za-z0-9 ]/", '', $tgl),
			'pkc' => $seksi,
			'id_tpb' => $nama,
			'kegiatan' => $kegiatan,
			'nilai' => preg_replace("/\D/", '', $nilai),
			'jth_tempo' => preg_replace("/[^A-Za-z0-9 ]/", '', $tempo),
			'tujuan' => $tujuan,
		);

		$this->m_data->update_data($where, $data, 'data_izin');


		$ids = $this->input->post('txt_idsurat');
		$acts = $this->input->post('txt_aktifitas');
		$keterangan = $this->input->post('txt_keteranganubah');
		$operator = $this->input->post('txt_operator');

		$data = array(
			'id_surat' => $ids,
			'aktifitas' => $acts,
			'keterangan_hist' => $keterangan,
			'operator' => $operator,
		);

		$this->m_data->insert_data($data, 'history');


		// mengalihkan halaman ke halaman list jaminan
		redirect(base_url() . 'index.php/pelaksana/detail/' . $id);
	}



	//CRUD Jaminan
	//Function ubah format tanggal
	function ubah_tanggal($date)
	{
		$exp = explode('/', $date);
		if (count($exp) == 3) {
			$date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
		}
		return $date;
	}
	//Tambah Jaminan
	function tambah_jaminan_act()
	{
		$data['data_izin'] = $this->m_data->get_data('data_izin')->result();
		$mohon = $this->input->post('txt_permohonan');
		$no = $this->input->post('txt_no');
		$tgl = $this->ubah_tanggal($this->input->post('txt_tgl'));
		$seksi = $this->input->post('opt_pkc');
		$nama = $this->input->post('opt_nama');
		$kegiatan = $this->input->post('opt_kegiatan');
		$nilai = $this->input->post('txt_nilai');
		$tempo = $this->ubah_tanggal($this->input->post('txt_tempo'));
		$tujuan = $this->input->post('txt_tujuan');
        
        $sql = $this->db->query("SELECT no_surat,tgl_surat FROM data_izin WHERE no_surat ='$no' AND year(tgl_surat) = year(current_date())");
        $cek_no = $sql->num_rows();
        if($cek_no > 0){
            $this->session->set_flashdata('message', 'Gagal ! Nomor Surat sudah pernah diinput !');
            redirect(site_url('pelaksana/tambah_jaminan'));
        } else {
		$data = array(
			'no_permohonan' => $mohon,
			'no_surat' => $no,
			'tgl_surat' => preg_replace("/[^A-Za-z0-9 ]/", '', $tgl),
			'pkc' => $seksi,
			'id_tpb' => $nama,
			'kegiatan' => $kegiatan,
			'nilai' => preg_replace("/\D/", '', $nilai),
			'jth_tempo' => preg_replace("/[^A-Za-z0-9 ]/", '', $tempo),
			'tujuan' => $tujuan,
		);
		$this->m_data->insert_data($data, 'data_izin');


		$data['data_izin'] = $this->m_data->get_data('data_izin')->result();
		$idsurat = $this->input->post('txt_idsurat');
		$status = $this->input->post('txt_status');

		$data = array(
			'id_surat' => $idsurat,
			'status' => $status,
		);
		$this->m_data->insert_data($data, 'data_status');

		$this->sendmessage();
		redirect(base_url() . 'index.php/pelaksana/list_jaminan');
        }
	}

	//Perpanjangan Jaminan
	function perpanjang_act()
	{
		//Pra Insert tbl perpanjangan
		$data['perpanjangan'] = $this->m_data->get_data('perpanjangan')->result();
		$id = $this->input->post('id');
		$no_srt = $this->input->post('txt_nopj');
		$tgl = $this->ubah_tanggal($this->input->post('txt_tglpj'));
		$nilai = $this->input->post('txt_nilaipj');
		$tempo = $this->ubah_tanggal($this->input->post('txt_tempopj'));
		$alasan = $this->input->post('txt_alasanpj');
		$id_jam = $this->input->post('txt_idjampj');

		//Pra Update tbl data_izin
		$id = $this->input->post('txt_idjampj');
		$perpanjangan = $this->input->post('txt_perpanjangan');

		$where = array(
			'id_surat' => $id
		);

		//Insert tbl perpanjangan
		$data = array(
			'no_suratpj' => $no_srt,
			'tgl_suratpj' => preg_replace("/[^A-Za-z0-9 ]/", '', $tgl),
			'jaminanpj' => preg_replace("/\D/", '', $nilai),
			'new_due_date' => preg_replace("/[^A-Za-z0-9 ]/", '', $tempo),
			'alasanpj' => $alasan,
			'id_jampj' => $id_jam,
		);
		$this->m_data->insert_data($data, 'perpanjangan');


		//Update tbl srt_jaminan
		$data = array(
			'perpanjangan' => $perpanjangan,
		);
		$this->m_data->update_data($where, $data, 'data_izin');

		// mengalihkan halaman ke halaman list jaminan
		redirect(base_url() . 'index.php/pelaksana/detail/' . $id);
	}

	//Revisi Jaminan
	function revisi_act()
	{
		//Pra Insert tbl revisi
		$data['revisi'] = $this->m_data->get_data('revisi')->result();
		$id = $this->input->post('id');
		$no_srt = $this->input->post('txt_norev');
		$tgl = $this->ubah_tanggal($this->input->post('txt_tglrev'));
		$kegiatan = $this->input->post('opt_kegiatanrev');
		$nilai = $this->input->post('txt_nilairev');
		$tempo = $this->ubah_tanggal($this->input->post('txt_temporev'));
		$tujuan = $this->input->post('txt_keteranganrev');
		$keterangan = $this->input->post('txt_keteranganrev');
		$id_jam = $this->input->post('txt_idjamrev');

		//Pra Update tbl data_izin
		$id = $this->input->post('txt_idjamrev');
		$revisi = $this->input->post('txt_revisi');

		$where = array(
			'id_surat' => $id
		);

		//Insert tbl revisi
		$data = array(
			'no_rev' => $no_srt,
			'tgl_rev' => preg_replace("/[^A-Za-z0-9 ]/", '', $tgl),
			'kegiatan_rev' => $kegiatan,
			'nilai_rev' => preg_replace("/\D/", '', $nilai),
			'jth_tempo_rev' => preg_replace("/[^A-Za-z0-9 ]/", '', $tempo),
			'tujuan_rev' => $tujuan,
			'keterangan_rev' => $keterangan,
			'id_surat' => $id_jam,
		);
		$this->m_data->insert_data($data, 'revisi');


		//Update tbl data_izin
		$data = array(
			'revisi' => $revisi,
		);
		$this->m_data->update_data($where, $data, 'data_izin');

		// mengalihkan halaman ke halaman list jaminan
		redirect(base_url() . 'index.php/pelaksana/detail/' . $id);
	}

	//Pembatalan Jaminan
	function pembatalan_act()
	{
		//Pra Insert tbl pembatalan
		$data['pembatalan'] = $this->m_data->get_data('pembatalan')->result();
		$id = $this->input->post('id');
		$no_srt = $this->input->post('txt_nopb');
		$tgl = $this->ubah_tanggal($this->input->post('txt_tglpb'));
		$alasan = $this->input->post('txt_alasanpb');
		$id_jam = $this->input->post('txt_idjampb');

		//Pra Update tbl srt_jaminan
		$id = $this->input->post('txt_idjampb');
		$status = $this->input->post('txt_status');

		$where = array(
			'id_surat' => $id
		);

		//Insert tbl perpanjangan
		$data = array(
			'no_suratpb' => $no_srt,
			'tgl_suratpb' => preg_replace("/[^A-Za-z0-9 ]/", '', $tgl),
			'alasanpb' => $alasan,
			'id_jampb' => $id_jam,
		);
		$this->m_data->insert_data($data, 'pembatalan');


		//Update tbl srt_jaminan
		$data = array(
			'status' => $status,
		);
		$this->m_data->update_data($where, $data, 'data_status');

		// mengalihkan halaman ke halaman list jaminan
		redirect(base_url() . 'index.php/pelaksana/detail/' . $id);
	}

	function hapus_data($id)
	{
		$where = array(
			'id_surat' => $id
		);

		$this->m_data->delete_data($where, 'data_izin');

		redirect(base_url() . 'index.php/pelaksana/list_jaminan');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'login/?alert=logout');
	}
	
	function sendmessage()
	{
		$telegram_id = $this->input->post('telegram_id');
		$message_text = $this->input->post('message_text');
		$mohon = $this->input->post('txt_permohonan');
		$staff = $this->input->post('staff');

		$secret_token = "1282151621:AAEmK43YDDxM2uvQcs279DSB2Atkq-rJXgg";

		$url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
		$url = $url . "&text=_" . $staff . "_: Permohonan pengeluaran sementara dengan jaminan nomor *". $mohon . "* telah *disetujui* dengan surat persetujuan nomor *S-"
			. urlencode($message_text) . "/WBC.09/KPP.MP.04/" . date("Y") . "*.";
		$ch = curl_init();
		$optArray = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);

		// mengalihkan halaman ke halaman list jaminan
		redirect(base_url() . 'index.php/pelaksana/list_jaminan');
	}
}
