<?php
	
	class Login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('login_model');
		}

		function index()
		{
			$this->load->view('login/login');
			$this->output->cache(5);
		}

		function auth()
		{
			$username=htmlspecialchars($this->input->post('username', TRUE),ENT_QUOTES);
			$password=htmlspecialchars($this->input->post('password', TRUE),ENT_QUOTES);
			

			$cek_tpb=$this->login_model->auth_tpb($username,$password);
			$cek_pegawai=$this->login_model->auth_pegawai($username,$password);
			$cek_penjamin=$this->login_model->auth_penjamin($username,$password);

			if($cek_pegawai->num_rows() > 0){ //jika login sebagai BCUSER
				$data=$cek_pegawai->row_array();
					$this->session->set_userdata('masuk', TRUE);
					$this->session->set_userdata('id',$data['id_bc']);
					$this->session->set_userdata('username',$data['username']);
					$this->session->set_userdata('nip',$data['nip']);
					$this->session->set_userdata('nama',$data['nama_bc']);
					if($data['unit']=='1'){ //jika login sebagai unit PKC
							if($data['level']=='1'){ //jika login sebagai KASI
								$this->session->set_userdata('unit','1');
								$this->session->set_userdata('level','1');
								$this->session->set_userdata('jabatan','Kepala Seksi PKC');
								redirect('seksi');
					} elseif($data['level']=='2'){ //jika login sebagai Kasubsi
								$this->session->set_userdata('unit','1');
								$this->session->set_userdata('level','2');
								$this->session->set_userdata('jabatan','Kepala Subseksi PKC');
								redirect('kasubsi');
					} else { //jika login sebagai pelaksana
								$this->session->set_userdata('unit','1');
								$this->session->set_userdata('level','3');
								$this->session->set_userdata('jabatan','Pelaksana Staff PKC');
								redirect('pelaksana');
					}}elseif($data['unit']=='2'){ //jika login sebagai Perben
							if($data['level']=='1'){ //jika login sebagai kasi
								$this->session->set_userdata('unit','2');
								$this->session->set_userdata('level','1');
								$this->session->set_userdata('jabatan','Kepala Seksi Perbendaharaan');
								redirect('perbenkasi');
					} elseif($data['level']=='2'){ //jika login sebagai kasubsi
								$this->session->set_userdata('unit','2');
								$this->session->set_userdata('level','2');
								$this->session->set_userdata('jabatan','Kepala Subseksi Perbendaharaan');
								redirect('perbenkasubsi');
					} else { //jika login sebagai pelaksana
								$this->session->set_userdata('unit','2');
								$this->session->set_userdata('level','3');
								$this->session->set_userdata('jabatan','Pelaksana Perbendaharaan');
								redirect('perbenpelaksana');
					}} elseif($data['unit']=='3'){
							if($data['level']=='0'){ //jika login sebagai superuser
								$this->session->set_userdata('jabatan','Superuser');
								redirect('superuser');
					}}
				} else { //jika login sebagai penjamin
					$cek_penjamin=$this->login_model->auth_penjamin($username,$password);
                    if($cek_penjamin->num_rows() > 0){
                            $data=$cek_penjamin->row_array();
                    		$this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('id',$data['id_penjamin']);
                            $this->session->set_userdata('nama',$data['nama_penjamin']);
                            $this->session->set_userdata('unit','8');
                            redirect('penjamin');
                } else { //jika login sebagai TPB
					$cek_tpb=$this->login_model->auth_tpb($username,$password);
                    if($cek_tpb->num_rows() > 0){
                            $data=$cek_tpb->row_array();
                    		$this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('id',$data['id_tpb']);
                            $this->session->set_userdata('nama',$data['nama_tpb']);
                            $this->session->set_userdata('unit','9');
                            redirect('kawasanberikat');
                    }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                            redirect($url);
                    }
        		}
				
			}
		}

		function logout()
		{
			$this->session->sess_destroy();
			$url=base_url('');
			redirect($url);
		}
	}

?>