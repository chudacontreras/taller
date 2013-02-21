<?php

class Mantenimiento extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    
    function index(){
       
        $this->_logueado(); 
    }


    function _logueado() {
        $_logueado = $this->session->userdata('logueado');
        if ($_logueado != TRUE) {

            redirect(acceso);
        }
    }
    
    
    function respaldar(){
        
        $this->_logueado();

         $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'mantenimiento/respaldar.php';
        $this->load->view('includes/template', $data);
    }

    
        function restaurar(){
         
        $this->_logueado();

         $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'mantenimiento/restaurar.php';
        $this->load->view('includes/template', $data);
    }

    
    
    
    
    
}
?>