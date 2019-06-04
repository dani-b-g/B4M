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
		return $this->db->from("instrumentos")
			->order_by('nombre_ins','ASC')
         	->get()->result_array();
    }


}
    