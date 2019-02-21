<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_c extends CI_Controller
{

    public function index($user)
    {
        // TODO: Crear vista de perfil
        // $user datos para pasar a las vistas
        $datos['titulo'] = "Perfil de: ";
        $datos['contenido'] = "inicio_v";

        $this->load->view('template_v', $datos);
    }

    public function registrarUsuario()
    {

        $_POST['pass_usu'] = password_hash($this->input->post("pass_usu"), PASSWORD_DEFAULT);
        $this->load->model("Usuarios_m");
        //para obtener los datos de los intrumentos y eliminarlo del post
        $instrumentos = $this->input->post('instrumentos');
        print_r($instrumentos);
        unset($_POST['instrumentos']);
        if ($this->Usuarios_m->insertar($this->input->post())) {
            $last = $this->Usuarios_m->getIdLastUsu();
            echo ('XDDD' . $last);
            foreach ($instrumentos as $value) {

                $datos = array(
                    'instrumento' => $value,
                    'usuario' => $last
                );

                $this->Usuarios_m->insertarUsuIns($datos);
                unset($datos);
            }
            echo "true";
        } else {
            echo "false";
        }
    }

    public function comprobarExiste($user)
    {

        // $user = $this->input->$_POST('nombre_usu');

        $this->load->model("Usuarios_m");

        echo $this->Usuarios_m->existeEnDB($user);
    }

    public function logout()
    {
        $dataSesion = array('usuario', 'login', 'tipo');
        $this->session->unset_userdata();
    }

    public function login()
    {
        $this->load->model("Usuarios_m");
        $respuesta = $this->Usuarios_m->getLogin($this->input->post());

        if ($respuesta) {
            $pass = $this->input->post("pass_usu");
            if (password_verify($pass, $respuesta->pass_usu)) {

                $dataSesion = array(
                    'usuario' => $this->input->post('nombre_usu'),
                    'login' => true,
                    'tipo' => $this->input->post('tipo_usu'),
                    'flashdata' => "Login correcto con usuario " . $this->input->post('nombre_usu')
                );

                $this->session->set_userdata($dataSesion);
                redirect('/inicio_c');
            } else {
                $_SESSION['flashdata'] = "La contraseña no existe";
            }
        } else {
            $_SESSION['flashdata'] = "El usuario " . $this->input->post('nombre_usu') . " no existe.";

            redirect('/inicio_c');
        }
    }
}