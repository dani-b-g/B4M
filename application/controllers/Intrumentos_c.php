<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instrumentos_c extends CI_Controller
{
    public function addIntrumentos()
    { }

    public function getInstrumentos()
    {
        $this->load->model("Instrumentos_m");
        $datos = $this->Instrumentos_m->getIns();
        return $datos;
    }
}

