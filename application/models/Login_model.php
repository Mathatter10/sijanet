<?php
	
		class Login_model extends CI_Model
		{
			function auth_tpb($username,$password){
				$query=$this->db->query("SELECT * FROM tpbuser WHERE username='$username' AND password='$password' LIMIT 1");
				return $query;
			}

			function auth_pegawai($username,$password){
				$query=$this->db->query("SELECT * FROM bcuser WHERE username='$username' AND password='$password' LIMIT 1 ");
				return $query;
			}

			function auth_penjamin($username,$password){
				$query=$this->db->query("SELECT * FROM penjaminuser WHERE username='$username' AND password='$password' LIMIT 1");
				return $query;
			}	

		}

?>