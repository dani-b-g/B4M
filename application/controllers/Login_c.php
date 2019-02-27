<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_c extends CI_Controller
{

    public function index()
    {
        //datos para pasar a las vistas
        $datos['titulo'] = "Login";
        $datos['contenido'] = "login_v";

        $this->load->model("Instrumentos_m");
        $datos['instrumentos'] = $this->Instrumentos_m->getIns();

        $this->load->view('template_v', $datos);
    }
}

