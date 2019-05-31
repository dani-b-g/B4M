<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisos_c extends CI_Controller
{

    public function index()
    {
        //datos para pasar a las vistas
        $datos['titulo'] = "Feed";
        $datos['contenido'] = "avisos_v";

        $this->load->view('template_v', $datos);
    }
}