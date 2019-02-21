<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio_c extends CI_Controller
{

    public function index()
    {
        //datos para pasar a las vistas
        $datos['titulo'] = "B4M";
        $datos['contenido'] = "inicio_v";

        $this->load->view('templateinicio_v', $datos);
    }
}