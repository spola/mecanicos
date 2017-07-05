<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    /**
    * Acción por defecto del controlador de login.
    * Mostrar la página de login
    */
    public function index() {
        $this->load->view("layouts/layout_arriba.php", array(
            "active" => "welcome"
        ));
		$this->load->view("login/login_index");
        $this->load->view("layouts/layout_abajo.php");
    }
}
