<?php	
	set_time_limit(0);
	ini_set('memory_limit', '640M');

	class Createpdf extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('Pdf');
			$this->load->library('Ciqrcode');
			$this->load->library('fungsi');
		}

		// Load Fungsi QRCode
		public function QRcode ($id)
		{
			//render qr kode dalam format gambar PNG
			QRcode::png(
						$id,
						$outfile = false,
						$level = QR_ECLEVEL_H,
						$size = 6,
						$margin = 2
			);
		}

		public function jaminan($id){
			$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							LEFT JOIN data_izin as C
							ON A.id_surat = C.id_surat
							LEFT JOIN kegiatan as D 
							ON C.kegiatan = D.id
							LEFT JOIN penjamindetail as G 
							ON A.id_penjamin = G.id_penjamin
							JOIN penjaminttd as H 
							ON A.id_jaminan = H.id_jaminan
							LEFT JOIN revisi as I 
							ON A.id_surat = I.id_surat
							WHERE C.id_surat = $id
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

			$this->load->view('pdf/jaminan', $data);
		}

		public function cetak_jaminan($id){
			$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							LEFT JOIN data_izin as C
							ON A.id_surat = C.id_surat
							LEFT JOIN kegiatan as D 
							ON C.kegiatan = D.id
							LEFT JOIN penjamindetail as G 
							ON A.id_penjamin = G.id_penjamin
							JOIN penjaminttd as H 
							ON A.id_jaminan = H.id_jaminan
							LEFT JOIN revisi as I 
							ON A.id_surat = I.id_surat
							WHERE C.id_surat = $id
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

			$this->load->view('pdf/cetak_jaminan', $data);
		}

		public function bpj($id){

			$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							LEFT JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							LEFT JOIN data_izin as C
							ON A.id_surat = C.id_surat
							LEFT JOIN kegiatan as D 
							ON C.kegiatan = D.id
							LEFT JOIN penjamindetail as G 
							ON A.id_penjamin = G.id_penjamin
							JOIN data_perben as I 
							ON A.id_jaminan = I.id_jaminan
							WHERE A.id_surat = $id
							")->result();
							
			$data['revisi'] =
			$this->db->query(" SELECT * FROM data_jaminan as A
							LEFT JOIN data_izin as B 
							ON A.id_surat = B.id_surat
							LEFT JOIN data_perben as C
							ON A.id_jaminan = C.id_jaminan
							JOIN revisi as H
							ON B.id_surat = H.id_surat
							WHERE A.id_surat = $id
							")->result();	
							
			$this->load->view('pdf/bpj', $data);
		}

		public function laporan($id){
			$data['laporan'] =
			$this->db->query("SELECT * FROM data_jaminan as A 
							JOIN tpbdetail as B 
							ON A.id_tpb = B.id_tpb 
							JOIN data_izin as C 
							ON A.id_surat = C.id_surat
							JOIN data_perben as D 
							ON A.id_jaminan = D.id_jaminan
							WHERE A.id_surat = $id
							")->result();
			
			$data['keluar'] =
			$this->db->query(" SELECT * FROM data_realisasi
									WHERE id_surat = $id AND jns_dok ='1'
								")->result();
			$data['masuk'] =
			$this->db->query(" SELECT * FROM data_realisasi
									WHERE id_surat = $id AND jns_dok ='2'
								")->result();
			$this->load->view('pdf/laporan', $data);
		}

		public function ttsj($id){
			$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							LEFT JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							LEFT JOIN data_izin as C
							ON A.id_surat = C.id_surat
							LEFT JOIN kegiatan as D 
							ON C.kegiatan = D.id
							LEFT JOIN penjamindetail as G 
							ON A.id_penjamin = G.id_penjamin
							LEFT JOIN data_perben as I 
							ON A.id_jaminan = I.id_jaminan
							WHERE A.id_surat = $id
							")->result();
			$this->load->view('pdf/ttsj', $data);
		}

		public function ttpj($id){
			$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							LEFT JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							LEFT JOIN data_izin as C
							ON A.id_surat = C.id_surat
							LEFT JOIN kegiatan as D 
							ON C.kegiatan = D.id
							LEFT JOIN penjamindetail as G 
							ON A.id_penjamin = G.id_penjamin
							JOIN data_perben as I 
							ON A.id_jaminan = I.id_jaminan
							WHERE A.id_surat = $id
							")->result();
			$this->load->view('pdf/ttpj', $data);
		}
		
		public function pencairan($id){

			$data['jaminan'] =
			$this->db->query("SELECT * FROM data_jaminan as A
							LEFT JOIN tpbdetail as B
							ON A.id_tpb = B.id_tpb
							LEFT JOIN data_izin as C
							ON A.id_surat = C.id_surat
							LEFT JOIN kegiatan as D 
							ON C.kegiatan = D.id
							LEFT JOIN penjamindetail as G 
							ON A.id_penjamin = G.id_penjamin
							JOIN data_perben as I 
							ON A.id_jaminan = I.id_jaminan
							JOIN penolakan as J 
							ON A.id_jaminan = J.id_jaminan
							WHERE A.id_jaminan = $id
							")->result();
							
			$this->load->view('pdf/pencairan', $data);
		}
	}

?>