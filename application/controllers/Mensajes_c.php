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
        if ($this->Mensajes_m->enviarMensajes($_POST)) {
            $_SESSION['flashdata'] = "Mensaje enviado con exito";
        } else {
            $_SESSION['flashdata'] = "Hubo un error al enviar el mensaje";
        }
        redirect("usuarios_c/perfil/{$_SESSION['usuario']}");
    }
    public function contMens()
    {
        $mensaje = $_POST['id_men'];
        $this->load->model("Mensajes_m");
        return $this->Mensajes_m->getMensajes($mensaje);
    }
    public function contNoLeidos($user)

    { }
}