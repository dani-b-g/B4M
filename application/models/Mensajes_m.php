<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mensajes_m extends CI_Model
{
	/**
	 * Obtiene todos los mensajes de un usuario ordenado por fecha de recepcion
	 *
	 * @param [type] $user
	 * @return void
	 */
    public function getMensajes($user)
    {

        return $this->db->select("*")
            ->from("mensajeria")
            ->where("des_men", $user)
            ->order_by("fecha_men", 'DESC')
            ->get()->result();
	}
	/**
	 * Obtiene el mensaje completo
	 *
	 * @param [type] $men
	 * @return void
	 */
    public function getContenido($men)
    {

        return $this->db->select("*")
            ->from("mensajeria")
            ->where("id_men", $men)
            ->get()->result();
	}
	/**
	 * Obtiene la respuesta de un mensaje
	 *
	 * @param [type] $usu_rem
	 * @param [type] $usu_des
	 * @return void
	 */
    public function getRespuesta($usu_rem, $usu_des)
    {
        return $this->db->select("*")
            ->from("mensajes")
            ->where("rem_men", $usu_rem)
            ->where("des_men", $usu_des)
            ->order_by("id_men", 'DESC')
            ->limit(2)
            ->get()->result();
    }
	/**
	 * Guarda el mensaje en la bbdd
	 *
	 * @param [type] $datos
	 * @return void
	 */
    public function enviarMensajes($datos)
    {
        return $this->db->insert("mensajes", $datos);
	}
	/**
	 * Retorna el conteo de los mensajes que no estan leidos
	 *
	 * @param [type] $user
	 * @return void
	 */
    public function noLeidos($user)
    {

        return $this->db->from("mensajes")
            ->where('des_men', $user)
            ->where("estado_men", 0)
            ->count_all_results();
	}
	/**
	 * Actualiza el estado del mensaje a leido
	 *
	 * @param [type] $men
	 * @return void
	 */
    public function setLeido($men)
    {
        $this->db->set('estado_men', 1)
            ->where("id_men", $men)
            ->update("mensajes");
    }
}
