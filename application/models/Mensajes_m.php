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

    public function enviarMensajes($datos){
        
    }
}
    