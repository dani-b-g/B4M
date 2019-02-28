<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instrumentos_c extends CI_Controller
{
    /**
     * Esta funcion la usara el usuario administrador para que añada mas instrumentos a la BBDD
     *
     * @return void
     */
    public function addIntrumentos()
    { }
    /**
 * Recuperar la informacion de los instrumentos
 *
 * @return void
 */
    public function getInstrumentos()
    {
        $this->load->model("Instrumentos_m");
        $datos = $this->Instrumentos_m->getIns();
        return $datos;
    }
}

