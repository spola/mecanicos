<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends MY_Controller {

    public function index() {
        $this->load->model("ServicioModel");

        $servicios = $this->ServicioModel->listar();

        $this->load->view("layouts/layout_arriba.php", array(
            "active" => "Servicios"
        ));
		$this->load->view("servicios/servicios_listar", array(
            "servicios" => $servicios
        ));
        $this->load->view("layouts/layout_abajo.php");

    }
}