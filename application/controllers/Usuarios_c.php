<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_c extends CI_Controller
{
    /**
     * Sera lo que cargue la viste de los perfiles de cada usuario
	 * carga todos los datos de la vista asi como sus instrumentos
     *
     * @param [String] $user
     * @return void
     */
    public function perfil($user)
    {
        $this->load->library('image_lib');
        $datos['titulo'] = "Perfil de: " . $user;
        $datos['contenido'] = "perfiles_v";
        $this->load->model("Instrumentos_m");
        $datos['instrumentos'] = $this->Instrumentos_m->getIns();
        $this->load->model("Usuarios_m");
        $datos['perfil'] = $this->Usuarios_m->getPerfil($user);
        $this->load->view('template_v', $datos);
    }

	/**
	 * Cuando se realiza una peticinonb entrar en el perfil del usuario
	 *
	 * @return void
	 */
    public function encontrado()
    {
        $usuario = $_POST['busqueda'];
        redirect(base_url("usuarios_c/perfil/{$usuario}"));
    }
	/**
	 * Guarda la imagen en el path de la aplicacion
	 *  como llama al modelo para guardar el path en la bbdd
	 *
	 * @return void
	 */
    public function setImagen()
    {
        $this->load->model('Usuarios_m');
        $mi_archivo = 'img_usu';
        $config['upload_path'] = "assets/img/avatares/";
        $config['file_name'] = $_POST['id_usu2'];
        $config['allowed_types'] = "jpg";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            $_SESSION['flashdata'] = 'Foto cambiada correctamente';
            redirect(base_url("usuarios_c/perfil/{$_SESSION['usuario']}"));
        } else {
            $id = $config['file_name'];
            $path = $config['upload_path'] . $config['file_name'] . ".jpg";
            $this->Usuarios_m->setImagen($id, $path);
            $_SESSION['flashdata'] = 'Foto cambiada correctamente';
            redirect(base_url("usuarios_c/perfil/{$_SESSION['usuario']}"));
        }
    }

    /**
     * Comprobamos pass en el caso 
     *
     * @return void
     */
    public function comprobarPass()
    {

        $this->load->model("Usuarios_m");
        $pass = $this->Usuarios_m->getPass($_POST['usuario']);

        if (password_verify($_POST['pass'], $pass->pass_usu)) {
            echo "true";
        } else {
            echo "false";
        }
	}
	/**
	 * Enviamos todos los cambios del formulario de modificacion
	 * de los datos del usuario
	 *
	 * @return void
	 */
    public function enviarCambios()
    {
        $this->load->model("Usuarios_m");
        //Para recuperar los intrumentos y eliminarlos del post
        $instrumentos = $_POST['instrumentos'];
        $_POST['pass_usu'] = password_hash($this->input->post("pass_usu"), PASSWORD_DEFAULT);
		unset($_POST['instrumentos']);
		//Eliminamso todos los intrumentos
		// del usuario para volver a insertar la modificacion
        $this->Usuarios_m->limpiarUsuIns($_POST['id_usu']);
        foreach ($instrumentos as $value) {
            $datos = array(
                'instrumento' => $value,
                'usuario' => $_POST['id_usu']
            );
            $this->Usuarios_m->insertarUsuIns($datos);
        }
        $this->Usuarios_m->insertarCambiosUsu($_POST);
        $_SESSION['flashdata'] = "Cambios del perfil realizados con exito";
        redirect(base_url("usuarios_c/perfil/{$_SESSION['usuario']}"));
	}
	/**
	 * Obtiene los datos del usuario
	 *
	 * @return void
	 */
    public function getUsuario()
    {
        $user = $_GET['usuario'];
        $this->load->model("Instrumentos_m");
        $datos['instrumentos'] = $this->Instrumentos_m->getIns();
        $this->load->model("Usuarios_m");
        $datos['perfil'] = $this->Usuarios_m->getPerfil($user);
    }


	/**
	 * REgistro de usuarios
	 *
	 * @return void
	 */
    public function registrarUsuario()
    {

        $_POST['pass_usu'] = password_hash($this->input->post("pass_usu"), PASSWORD_DEFAULT);
        $_POST['nombre_usu'] = strtolower($this->input->post('nombre_usu'));
        $this->load->model("Usuarios_m");
        //para obtener los datos de los intrumentos y eliminarlo del post
        $instrumentos = $_POST['instrumentos'];

        unset($_POST['instrumentos']);
        if ($this->Usuarios_m->insertar($this->input->post())) {
            $last = $this->Usuarios_m->getIdLastUsu();
			//genera un array con toda la informacion que le pasaremos al modelo
            foreach ($instrumentos as $value) {
                $datos = array(
                    'instrumento' => $value,
                    'usuario' => $last
                );
                $this->Usuarios_m->insertarUsuIns($datos);
                $salida = "true";
            }
            echo $salida;
        } else {
            echo "false";
        }
    }
    /**
     * Copprueba si existe ese usuario ya en la BBDD
     *
     * @param String $user
     * @return void
     */
    public function comprobarExiste()
    {
        $user = $_GET['usuario'];
        $user = strtolower($user);
        $this->load->model("Usuarios_m");

        echo $this->Usuarios_m->existeEnDB($user);
    }
    /**
     * Elimina todos los datos de sesion
     *
     * @return void
     */
    public function logout()
    {
        $dataSesion = array('usuario', 'login', 'tipo', 'flashdata');
        $this->session->unset_userdata($dataSesion);
        redirect(base_url("login_c/"));
    }

    /**
     * Comprueba los datos y hace login
     *
     * @return void
     */
    public function login()
    {
        $this->load->model("Usuarios_m");
        $respuesta = $this->Usuarios_m->getLogin($this->input->post());
        print_r($respuesta);
        $id = $this->Usuarios_m->getId($_POST['nombre_usu']);
        $img = $this->Usuarios_m->getImagen($id);

        if ($respuesta) {
            $pass = $this->input->post("pass_usu");
            if (password_verify($pass, $respuesta->pass_usu)) {

                $dataSesion = array(
                    'usuario' => $this->input->post('nombre_usu'),
                    'id_login' => $id,
                    'login' => true,
                    'tipo' => $this->input->post('tipo_usu'),
                    'img_usu' => $img,
                    'flashdata' => "Login correcto con usuario " . $this->input->post('nombre_usu')
                );

                $this->session->set_userdata($dataSesion);
                redirect(base_url('login_c/'));
            } else {
                $_SESSION['flashdata'] = "La contraseña no es correcta";
            }
        } else {
            $_SESSION['flashdata'] = "El usuario " . $this->input->post('nombre_usu') . " no existe.";
        }
        redirect(base_url('login_c/'));
    }
}
