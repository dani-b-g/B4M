<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mensajes_c extends CI_Controller
{
    public function mensajes()
    {
        $id = $_SESSION['id_login'];
        $usuario = $_SESSION['usuario'];
        $datos['usuario'] = $usuario;
        $datos['titulo'] = "Mensajes de: " . $usuario;
        $datos['contenido'] = "mensajes_v";
        $this->load->model("Mensajes_m");
        $this->load->model("Usuarios_m");
        $datos['mensajes'] = $this->Mensajes_m->getMensajes($id);

        $this->load->view('template_v', $datos);
    }
    public function contMens()
    { }
    public function conyNoLeidos()
    { }
}