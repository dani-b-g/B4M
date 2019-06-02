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
    public function enviarMen()
    {
        $this->load->model("Mensajes_m");
        $_POST['fecha_men'] = date('Y-m-d');
        if ($this->Mensajes_m->enviarMensajes($_POST)) {
            $_SESSION['flashdata'] = "Mensaje enviado con exito";
        } else {
            $_SESSION['flashdata'] = "Hubo un error al enviar el mensaje";
        }
        redirect(base_url("usuarios_c/perfil/{$_SESSION['usuario']}/"));
    }
    public function getRespuesta()
    {
        $des = $_POST['des_men'];
        $rem = $_POST['rem_men'];
        $this->load->model("Mensajes_m");
        echo json_encode($this->Mensajes_m->getRespuesta($rem, $des));
    }
    public function contMens()
    {
        $mensaje = $_POST['id_men'];
        $this->load->model("Mensajes_m");
        echo json_encode($this->Mensajes_m->getContenido($mensaje));
    }
    public function contNoLeidos()

    {
        $this->load->model("Mensajes_m");
        $user = $_SESSION['id_login'];
        echo $this->Mensajes_m->noLeidos($user);
    }
    public function setLeido()
    {
        $mensaje = $_POST['id_men'];
        $this->load->model("Mensajes_m");
        $mensaje = $this->Mensajes_m->getContenido($mensaje);
        if ($mensaje[0]->estado_men == 0) {
            $this->Mensajes_m->setLeido($mensaje[0]->id_men);
            echo "1";
        } else {
            echo "0";
        }
    }
}
