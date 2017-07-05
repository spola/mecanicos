<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $isSecure = false;
    
    function __construct()
    {
        //Constructor del padre
        parent::__construct();
        
        //data que se cargará en cada vista
        $data = array(
            "isLogged" => $this->session->userdata('usuario')
        );
        
        //Si el controlador es seguro, entonces verificamos que lo sea
        if(isset($this->isSecure) && $this->isSecure) {
            $this->sacarSiNoLogueado();
        }

        //Cargamos la variable para todas las vistas de este controlador
        $this->load->vars($data);
    }
    
    /**
    * Chequea que si el usuario está logueado. Si no lo está, lo redirige a la página inicial
    */
    protected function sacarSiNoLogueado() {
        if ( ! $this->session->userdata('usuario'))
        { 
            redirect('');
            return false;
        }
        return true;
    }
}
