<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisos_c extends CI_Controller
{

    public function index()
    {
        //datos para pasar a las vistas
        $datos['titulo'] = "Feed";
        $datos['contenido'] = "avisos_v";
		$this->load->model('Avisos_m');
		// Obtiene los Avisos del la BBDD
        $datos['avisos'] = $this->Avisos_m->getAvisos();
        $this->load->view('template_v', $datos);
    }

	/**
	 * Manipula la creacion de los avisos asi como les añade
	 * las fechas actuales para guardarlo en la base de datos
	 */
    public function crear()
    {
        $this->load->model('Avisos_m');
        $_POST['fecha_an'] = date('Y-m-d H:i:s');
        if ($this->Avisos_m->insertar($this->input->post())) {
            $_SESSION['flashdata'] = "Post creado con exito";
            $_SESSION['error'] = false;
        } else {
            $_SESSION['flashdata'] = "Post no creado, ha ocurrido un error";
            $_SESSION['error'] = true;
        }
        redirect(base_url('Avisos_c/'));
    }
}
