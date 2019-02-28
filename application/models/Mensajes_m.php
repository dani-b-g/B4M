<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mensajes_m extends CI_Model
{
    public function getMensajes($user){

        return $this->db->select("*")
        ->from("mensajeria")
        ->where("des_men",$user)
        ->get()->result();
    }
    public function getContenido($men){

        return $this->db->select("*")
        ->from("mensajeria")
        ->where("id_men",$men)
        ->get()->result();
    }

    public function enviarMensajes($datos){
        return $this->db->insert("mensajes",$datos);
    }
    public function noLeidos($user){
        
        return $this->db->from("mensajes")
            ->where('des-men', $user)
            ->where("estado_men",0)
            ->count_all_results();
    }
    public function setLeido($men){
        $this->db->set('estado_men',1)
            ->where("id_men",$men)
            ->update("mensajes");

    }
}
    