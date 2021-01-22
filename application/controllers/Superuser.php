<?php 
	class Superuser extends CI_Controller {
		
		// untuk load model kawasan berikat
		public function __construct()
		{
			parent::__construct();
			$this->load->model("m_data");
			$this->load->library("form_validation");
			
			if(empty($this->session->userdata('masuk')))
			{
			redirect(site_url(), 'refresh');
			}
		}

		// menampilkan overview / beranda
		public function index()
		{
			$this->load->view("superuser/v_head");
			$this->load->view("superuser/overview.php");
			$this->load->view("superuser/v_foot");
		}
		
		// menampilkan menu Data Perizinan
		function databc()
		{
			//mengambil database
			$data['userbc'] =
			$this->db->query("SELECT * FROM bcuser
							 ORDER BY level
							")->result();
					
			$this->load->view("superuser/v_head");
			$this->load->view("superuser/databc", $data);
			$this->load->view("superuser/v_foot");
		}

		function datatpb()
		{
			//mengambil database
			$data['usertpb'] =
			$this->db->query("SELECT * FROM tpbdetail
							")->result();
					
			$this->load->view("superuser/v_head");
			$this->load->view("superuser/datatpb", $data);
			$this->load->view("superuser/v_foot");
		}

		function datapenjamin()
		{
			//mengambil database
			$data['userpenjamin'] =
			$this->db->query("SELECT * FROM penjamindetail
							")->result();
					
			$this->load->view("superuser/v_head");
			$this->load->view("superuser/datapenjamin", $data);
			$this->load->view("superuser/v_foot");
		}

		function rekam_pegawai()
		{
			$data['pegawai'] =
				$this->db->query("SELECT * FROM tpbdetail ORDER BY id_tpb
								")->result();

			$this->load->view('superuser/v_head');
			$this->load->view('superuser/rekam_pegawai', $data);
			$this->load->view('superuser/v_foot');
		}

		function rekam_perusahaan()
		{
			$data['perusahaan'] =
				$this->db->query("SELECT * FROM tpbdetail ORDER BY id_tpb
								")->result();

			$this->load->view('superuser/v_head');
			$this->load->view('superuser/rekam_perusahaan', $data);
			$this->load->view('superuser/v_foot');
		}

		function rekam_penjamin()
		{
			$data['penjamin'] =
				$this->db->query("SELECT * FROM penjamindetail ORDER BY id_penjamin
								")->result();

			$this->load->view('superuser/v_head');
			$this->load->view('superuser/rekam_penjamin', $data);
			$this->load->view('superuser/v_foot');
		}

		function rekam_cluster_perusahaan()
		{
			$data['pegawai'] =
				$this->db->query("SELECT * FROM tpbdetail ORDER BY id_tpb
								")->result();

			$this->load->view('superuser/v_head');
			$this->load->view('superuser/rekam_cluster_perusahaan', $data);
			$this->load->view('superuser/v_foot');
		}

		function clustering_hanggar()
		{
			//mengambil database
			$data['cluster'] =
			$this->db->query("SELECT * FROM bchanggar as A
						INNER JOIN bcuser as B 
						ON A.id_bc = B.id_bc
							")->result();

			$this->load->view('superuser/v_head');
			$this->load->view('superuser/clustering_hanggar', $data);
			$this->load->view('superuser/v_foot');
		}

		function edit_cluster_hanggar($id)
		{	
			$a = $this->session->userdata('id');
			$data['hanggar'] =
				$this->db->query("SELECT * FROM bchanggar as A
						INNER JOIN bcuser as B 
						ON A.id_bc = B.id_bc
						WHERE A.id_bc = $id
							")->result();

			$data['bchanggar'] =
				$this->db->query("SELECT * FROM bcuser ORDER BY id_bc
								")->result();

			$this->load->view('superuser/v_head');
			$this->load->view('superuser/edit_cluster_hanggar', $data);
			$this->load->view('superuser/v_foot');
		}

		function clustering_perusahaan()
		{
			//mengambil database
			$data['cluster'] =
			$this->db->query("SELECT * FROM bchanggar as A
						INNER JOIN bcuser as B 
						ON A.id_bc = B.id_bc
						INNER JOIN tpbdetail as C
						ON A.id_hanggar = C.id_hanggar
						LEFT JOIN bckasi as D
						ON C.id_kasi = D.id_kasi
							")->result();

			$this->load->view('superuser/v_head');
			$this->load->view('superuser/clustering_perusahaan', $data);
			$this->load->view('superuser/v_foot');
		}

		function edit_cluster_perusahaan($id)
		{	
			$a = $this->session->userdata('id');
			$data['perusahaan'] =
				$this->db->query("SELECT * FROM bchanggar as A
						INNER JOIN bcuser as B 
						ON A.id_bc = B.id_bc
						INNER JOIN tpbdetail as C
						ON A.id_hanggar = C.id_hanggar
						LEFT JOIN bckasi as D
						ON C.id_kasi = D.id_kasi
						WHERE C.id_tpb = $id
							")->result();

			$data['bckasi'] =
			$this->db->query("SELECT * FROM bckasi as A
						  JOIN bcuser as B ON A.id_bc = b.id_bc
						  ORDER BY id_kasi")->result();

			$data['bchanggar'] =
			$this->db->query("SELECT * FROM bcuser as A
						INNER JOIN bchanggar as B
						ON A.id_bc = b.id_bc
							")->result();

			$this->load->view('superuser/v_head');
			$this->load->view('superuser/edit_cluster_perusahaan', $data);
			$this->load->view('superuser/v_foot');
		}

		// Fungsi Tambah Pegawai
		function tambah_pegawai_act()
		{
			$id_bc = $this->input->post('id_bc');
			$nama_bc = $this->input->post('nama_bc');
			$nip = $this->input->post('nip');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$unit = $this->input->post('unit');
			$level = $this->input->post('level');
			$telegram_id = $this->input->post('telegram_id');

			$data = array(
				'id_bc' => $id_bc,
				'nama_bc' => $nama_bc,
				'nip' => $nip,
				'username' => $username,
				'password' => $password,
				'unit' => $unit,
				'level' => $level,
				'telegram_id' => $telegram_id,
			);
			// insert data ke database
			$this->m_data->insert_data($data, 'bcuser');
 
			// mengalihkan halaman ke halaman list jaminan
			redirect(site_url() . '/superuser/databc');
		}

		// Fungsi Tambah Pegawai
		function tambah_perusahaan_act()
		{

			$id_tpb = $this->input->post('id_tpb');
			$nama_tpb = $this->input->post('nama_tpb');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'id_tpb' => $id_tpb,
				'nama_tpb' => $nama_tpb,
				'username' => $username,
				'password' => $password,
			);
			// insert data ke database
			$this->m_data->insert_data($data, 'tpbuser');

			$id_tpb = $this->input->post('id_tpb');
			$npwp_tpb = $this->input->post('npwp_tpb');
			$nama_tpb = $this->input->post('nama_tpb');
			$alamat_tpb = $this->input->post('alamat_tpb');
			$no_skep = $this->input->post('no_skep');
			$telepon_tpb = $this->input->post('telepon_tpb');
			$faksimili_tpb = $this->input->post('faksimili_tpb');
			$id_hanggar = $this->input->post('id_hanggar');
			$telegram_id = $this->input->post('telegram_id');

			$data = array(
				'id_tpb' => $id_tpb,
				'npwp_tpb' => $npwp_tpb,
				'nama_tpb' => $nama_tpb,
				'alamat_tpb' => $alamat_tpb,
				'no_skep' => $no_skep,
				'telepon_tpb' => $telepon_tpb,
				'faksimili_tpb' => $faksimili_tpb,
				'id_hanggar' => $id_hanggar,
				'telegram_id' => $telegram_id,
			);
			$this->m_data->insert_data($data, 'tpbdetail');

			// mengalihkan halaman ke halaman list jaminan
			redirect(site_url() . '/superuser/datatpb');
		}

		// Fungsi Tambah Pegawai
		function tambah_penjamin_act()
		{

			$id_penjamin = $this->input->post('id_penjamin');
			$nama_penjamin = $this->input->post('nama_penjamin');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'id_penjamin' => $id_penjamin,
				'nama_penjamin' => $nama_penjamin,
				'username' => $username,
				'password' => $password,
			);
			// insert data ke database
			$this->m_data->insert_data($data, 'penjaminuser');

			$id_penjamin = $this->input->post('id_penjamin');
			$npwp_penjamin = $this->input->post('npwp_penjamin');
			$nama_penjamin = $this->input->post('nama_penjamin');
			$alamat_penjamin = $this->input->post('alamat_penjamin');
			$telepon = $this->input->post('telepon');
			$faksimili = $this->input->post('faksimili');
			$telegram_id = $this->input->post('telegram_id');

			$data = array(
				'id_penjamin' => $id_penjamin,
				'npwp_penjamin' => $npwp_penjamin,
				'nama_penjamin' => $nama_penjamin,
				'alamat_penjamin' => $alamat_penjamin,
				'telepon' => $telepon,
				'faksimili' => $faksimili,
				'telegram_id' => $telegram_id,
			);
			$this->m_data->insert_data($data, 'penjamindetail');

			// mengalihkan halaman ke halaman list jaminan
			redirect(site_url() . '/superuser/datapenjamin');
		}

		// Fungsi Tambah Pegawai
		function edit_cluster_hanggar_act($id)
		{

			$data['hanggar'] = $this->m_data->get_data('bcuser')->result();
			$id_bc = $this->input->post('id_bc');
			$id_hanggar = $this->input->post('id_hanggar');
			$telegram_id = $this->input->post('telegram_id');
			
			$where = array('id_bc' => $id_bc);
			$data = array(
				'telegram_id' => $telegram_id,
			);
			
			// update status jaminan
			$where = array('id_hanggar' => $id_hanggar);
			$data = array('id_bc' => $id_bc);
			$this->m_data->update_data($where, $data, 'bchanggar');

			// mengalihkan halaman ke halaman list jaminan
			redirect(site_url() . 'superuser/clustering_hanggar');
		}

		// Fungsi Tambah Pegawai
		function edit_cluster_perusahaan_act()
		{

			$data['perusahaan'] = $this->m_data->get_data('tpbdetail')->result();
			$id_detail = $this->input->post('id_detail');
			$id_kasi = $this->input->post('id_kasi');
			$id_hanggar = $this->input->post('id_hanggar');
			$telegram_id = $this->input->post('telegram_id');
			
			// update status jaminan
			$where = array('id_detail' => $id_detail);
			$data = array(
				'id_kasi' => $id_kasi,
				'id_hanggar' => $id_hanggar,
				'telegram_id' => $telegram_id,
			);
			$this->m_data->update_data($where, $data, 'tpbdetail');

			// mengalihkan halaman ke halaman list jaminan
			redirect(site_url() . 'superuser/clustering_perusahaan');
		}
		
		// Delete Record
    	function deletebc($id)
    	{
    		$where = array('id_bc' => $id);
    		$this->m_data->delete_data($where, 'bcuser');
    
    		redirect(site_url() . 'superuser/databc');
    	}
    	function deletetpb($id)
    	{
    		$where = array('id_tpb' => $id);
    		$this->m_data->delete_data($where, 'tpbuser');
    
    		redirect(site_url() . 'superuser/datatpb');
    	}
    	function deletepenjamin($id)
    	{
    		$where = array('id_penjamin' => $id);
    		$this->m_data->delete_data($where, 'penjamindetail');
    
    		redirect(site_url() . 'superuser/datapenjamin');
    	}

	}
?>