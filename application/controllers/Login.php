<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    /**
    * Acción por defecto del controlador de login.
    * Mostrar la página de login
    *
    * @return void
    */
    public function index() {
            
        $msg = $this->session->flashdata("msg");

        $this->load->view("layouts/layout_arriba.php", array(
            "active" => "welcome"
        ));
		$this->load->view("login/login_index", array(
            "msg" => $msg
        ));
        $this->load->view("layouts/layout_abajo.php");
    }

    /**
     * Acción para verificar que el nombre de usuario y contraseña sean correctos.
     *
     * @return void
     */
    public function validate() {
        $email = $this->input->post("email");
        $pass = $this->input->post("password");
        $this->load->model("UsuarioModel");

        if($this->UsuarioModel->isValid($email, $pass))
        {
            //Paraiso
            $usuario = $this->UsuarioModel->getByEmail($email);

            $usuarioArray = array(
                "id" => $usuario->id, 
                "usuario" => $usuario->usuario, 
                "nombre" => $usuario->nombre
            );
            
            $this->session->set_userdata($usuarioArray);
            redirect("", "refresh");
        } else {
            //A fuera
            $this->session->set_flashdata("msg", "Nombre de usuario o contraseña inválido");
            redirect("login", "refresh");
        }
    }

    /**
     * Acción para terminar con la sesión del usuario
     *
     * @return void
     */
    public function logout() {
        $this->session->unset_userdata(array(
            "id", "nombre", "usuario"
        ));
        redirect("", "refresh");
    }
}
