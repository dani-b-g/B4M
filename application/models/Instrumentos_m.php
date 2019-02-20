<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instrumentos_m extends CI_Model
{


    public function getIns()
    {
        $this->db->from("instrumentos");
        $resultado = $this->db->get();
        return $resultado->result_array();
    }


}
    