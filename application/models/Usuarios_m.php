<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_m extends CI_Model
{
    public function insertar($datos)
    {

        return $this->db->insert("usuarios", $datos);
    }

    public function existeEnDB($usu)
    {


        $this->db->from("usuarios");
        $this->db->where('nombre_usu', $usu);
        return $this->db->count_all_results();
    }

    public function getLogin($datos)
    {

        $this->db->from("usuarios");
        $this->db->where('nombre_usu', $datos['nombre_usu']);
        $resultado = $this->db->get();
        return $resultado->row();
        // $sql = "SELECT * from clientes where usuario_cli=?";
        // $resultado = $this->db->query($sql, array($datos['usuario_cli']));
        // return $resultado->row();
    }
    public function insertarUsuIns($datos)
    {
        return $this->db->insert("usu_ins", $datos);
    }
    public function getIdLastUsu()
    {
        $this->db->select_max('id_usu');
        return $this->db->get("usuarios");
    }
}

