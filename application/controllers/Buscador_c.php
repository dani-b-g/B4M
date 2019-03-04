<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buscador_c extends CI_Controller
{
    public function index()
    {
        $busqueda = $_POST['busqueda'];
        $datos['titulo'] = "Busqueda: " . $busqueda;
        $datos['contenido'] = "busqueda_v";
        $this->load->model('Usuarios_m');
        $datos['busc'] = $busqueda;
        $datos['busqueda'] = $this->Usuarios_m->getBuscador($busqueda);
        $this->load->view('template_v', $datos);
    }
}