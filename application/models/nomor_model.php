<?php
	class Nomor_model extends CI_Model 
	{
	    function __construct()
	    {
	          
	    }
	    
		function get_ttsj()
		{
		    $tahun = date('Y');
		    
			$q = $this->db->query("SELECT MAX(RIGHT(nomor_ttsj,4)) as ttsj FROM data_perben WHERE year(tanggal_ttsj) = $tahun");
			$kd = "";
			if($q->num_rows()>0){
				foreach($q->result() as $k){
					$tmp = ((int)$k->ttsj)+1;
					$kd = sprintf("%04s",$tmp);
				}
			} else {
				$kd = "0001";
			}
			return $kd;
		}

		function get_bpj()
		{
		    $tahun = date('Y');
		    
			$q = $this->db->query("SELECT MAX(RIGHT(nomor_bpj,4)) as bpj FROM data_perben WHERE year(tanggal_ttsj) = $tahun");
			$kd = "";
			if($q->num_rows()>0){
				foreach($q->result() as $k){
					$tmp = ((int)$k->bpj)+1;
					$kd = sprintf("%04s",$tmp);
				}
			} else {
				$kd = "0001";
			}
			return $kd;
		}

		function get_ttpj()
		{
		    $tahun = date('Y');
		    
			$q = $this->db->query("SELECT MAX(RIGHT(nomor_ttpj,4)) as ttpj FROM data_perben WHERE year(tanggal_ttsj) = $tahun");
			$kd = "";
			if($q->num_rows()>0){
				foreach($q->result() as $k){
					$tmp = ((int)$k->ttpj)+1;
					$kd = sprintf("%04s",$tmp);
				}
			} else {
				$kd = "0001";
			}
			return $kd;
		}
	}
?>