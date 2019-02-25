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
    /**
     * Remplazamos lso datos de la tabla con la del formulario
     *
     * @param Array $datos
     * @return void
     */
    public function insertarCambiosUsu($datos)
    {
        //seleccionamos los datos que queremos actualizar
        $data = array(
            'pass_usu' => $datos['pass_usu'],
            'email_usu' => $datos['email_usu'],
            'tipo_usu' => $datos['tipo_usu'],
            'apenom_usu' => $datos['apenom_usu'],
            'desc_usu' => $datos['desc_usu'],
            'estilo_usu' => $datos['estilo_usu']

        );

        $this->db->where('id_usu', $datos['id_usu']);
        return $this->db->update('usuarios', $data);

        // $this->db->replace('usuarios', $datos)
        //     ->where('id_usu', $datos['id_usu']);
    }

    /**
     * Elimna toso los instrumentos de un usuario
     *
     * @param [type] $instrumentos
     * @param [type] $usuario
     * @return void
     */
    public function limpiarUsuIns($usuario)
    {
        $this->db->where('usuario', $usuario);
        return $this->db->delete('usu_ins');
    }



    public function getPass($usu)
    {
        return $this->db->select('pass_usu')
            ->from('usuarios')
            ->where('id_usu', $usu)
            ->get()->row();
    }

    public function getLogin($datos)
    {

        $this->db->from("usuarios");
        $this->db->where('nombre_usu', $datos['nombre_usu']);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getPerfil($usuario)
    {
        $this->db->select();
        $this->db->from("usuarios_instrumentos");
        $this->db->where("nombre_usu", $usuario);
        $resultado = $this->db->get();
        return $resultado->result_array();
    }
    public function insertarUsuIns($datos)
    {
        return $this->db->insert("usu_ins", $datos);
    }
    public function getIdLastUsu()
    {
        $this->db->select_max('id_usu');
        $resultado = $this->db->get("usuarios");
        return $resultado->row()->id_usu;
    }
}