<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisos_m extends CI_Model
{
    public function insertar($datos)
    {
        return $this->db->insert('anuncios', $datos);
    }
    public function getAvisos()
    {
        return $this->db->select()
            ->from('avisos_usu')
            ->order_by('fecha_an', 'DESC')
            ->get()->result();
    }
}