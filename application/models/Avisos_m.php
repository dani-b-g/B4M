<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisos_m extends CI_Model
{
	/**
	 * Insertamos un evento en la base de datos
	 *
	 * @param [type] $datos
	 * @return void
	 */
    public function insertar($datos)
    {
        return $this->db->insert('anuncios', $datos);
	}
	/**
	 * Obtenemos todos los avisos
	 *
	 * @return void
	 */
    public function getAvisos()
    {
        return $this->db->select()
            ->from('avisos_usu')
            ->order_by('fecha_an', 'DESC')
            ->get()->result();
    }
}
