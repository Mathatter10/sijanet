<?php
    class Perben extends CI_Model
    {
        function pencarian($penjamin){
            $this->db->where('id_penjamin',$penjamin);
            return $this->db->get('data_jaminan');
        }
    }
?>