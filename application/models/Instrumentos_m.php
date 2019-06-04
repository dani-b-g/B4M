<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instrumentos_m extends CI_Model
{

	/**
	 * Obtenemos los instrumentos en forma de array
	 *
	 * @return void
	 */
    public function getIns()
    {
        $this->db->from("instrumentos");
        $resultado = $this->db->get();
        return $resultado->result_array();
    }


}
    