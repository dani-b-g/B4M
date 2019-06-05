<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_m extends CI_Model
{
    public function insertar($datos)
    {

        return $this->db->insert("usuarios", $datos);
    }
    /**
     * Obtiene la id de un usuario a partir de su nombre
     *
     * @param String $usuario
     * @return void
     */
    public function getId($usuario)
    {
        return $this->db->select('id_usu')
            ->from('usuarios')
            ->where('nombre_usu', $usuario)
            ->get()->row()->id_usu;
    }
    /**
     * Comprueba si exite en la bbdd
     *
     * @param String $usu
     * @return void
     */
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
     * Realiza una busqueda recursiva de la entrada del formulario
     *
     * @param [type] $key
     * @return void
     */
    public function getBuscador($key)
    {
        return $this->db->select('*')
            ->from("usuarios_instrumentos")
            ->or_like("nombre_usu", $key)
            ->or_like("apenom_usu", $key)
            ->or_like("ciudad_usu", $key)
            ->or_like("estilo_usu", $key)
            ->or_like("nombre_ins", $key)
            ->get()->result();
	}
	public function getName($id){
		return $this->db->select('nombre_usu')
		->from('usuarios')
		->where('id_usu',$id)
		->get()->row()->nombre_usu;
	}

    /**
     * Elminamos los instrumentos de un usuario
     *
     * @param [type] $usuario
     * @return void
     */
    public function limpiarUsuIns($usuario)
    {
        $this->db->where('usuario', $usuario);
        return $this->db->delete('usu_ins');
    }


    /**
     * Obtiene solo la contraseña del usuario
     *
     * @param int $usu
     * @return void
     */
    public function getPass($usu)
    {
        return $this->db->select('pass_usu')
            ->from('usuarios')
            ->where('id_usu', $usu)
            ->get()->row();
    }
    /**
     * Obtiene el login a partir de los datos que se le pasa
     *
     * @param Array $datos
     * @return void
     */
    public function getLogin($datos)
    {

        $this->db->from("usuarios");
        $this->db->where('nombre_usu', $datos['nombre_usu']);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    /**
     * Obtiene todos los datos de un perfil
     *
     * @param String $usuario
     * @return void
     */
    public function getPerfil($usuario)
    {
        $this->db->select();
        $this->db->from("usuarios_instrumentos");
        $this->db->where("nombre_usu", $usuario);
        $resultado = $this->db->get();
        return $resultado->result_array();
    }
    /**
     * inserta el instrumento de un usuario
     *
     * @param Array $datos
     * @return void
     */
    public function insertarUsuIns($datos)
    {
        return $this->db->insert("usu_ins", $datos);
    }
    /**
     * obtiene la ide del ultimo usuario
     *
     * @return void
     */
    public function getIdLastUsu()
    {
        $this->db->select_max('id_usu');
        $resultado = $this->db->get("usuarios");
        return $resultado->row()->id_usu;
    }
    /**
     * guarda el path de la imagen en la bbdd
     *
     * @param int $id
     * @param string $path
     * @return void
     */
    public function setImagen($id, $path)
    {
        return $this->db->set('img_usu', $path)
            ->where('id_usu', $id)
            ->update('usuarios');
    }
    /**
     * Obtiene el path de la imagen
     *
     * @param int $id
     * @return void
     */
    public function getImagen($id)
    {
        return $this->db->from('usuarios')
            ->select('img_usu')
            ->where('id_usu', $id)
            ->get()->row()->img_usu;
    }
}
