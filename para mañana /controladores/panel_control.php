<?php

    class Panel_Control extends CI_Controller{
         public  $modulo = "Panel Control";
         
       function __construct() {
           
           parent::__construct();
		   $this->load->helper(array('url', 'form'));
		   $this->load->library('form_validation');
                   $this->_logueado();
		   
		   
        }
        
        
          function index(){
        
        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'panel_control';       
        $this->load->view('includes/template',$data);
   
    }
        
    
    function _logueado(){
        $_logueado = $this->session->userdata('logueado');
        if ($_logueado != TRUE){
            redirect('acceso/acceso');
        }
        
    }
    

    function salir(){
        $this->session->sess_destroy();
        $operaciones = 'Salir del Sistema';
        $this->Bitacora_Model->Bitacora($this->modulo,$operaciones);
        redirect('acceso/acceso');
    }

    function miembros(){
        
        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'miembros';    
        $this->load->view('includes/template',$data);

    }
        
       function celulas(){
        
        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'celulas';       
        $this->load->view('includes/template',$data);
 
        
    }

          function usuarios(){
        
        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'usuarios'; 
        
        $this->load->view('includes/template',$data);  
   
    }
    
        function info_sistema(){
        
        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'info_sistema'; 
        
        $this->load->view('includes/template',$data);  
   
    }

       function creditos(){
        
        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'creditos'; 
        
        $this->load->view('includes/template',$data);  
   
    }
    
    function validar() {

        $this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('email', 'correo electrónico', 'required|valid_email|trim');
        $this->form_validation->set_rules('contraseña', 'contraseña', 'required|trim|md5');
        $this->form_validation->set_rules('recontrasena', 'reescribir contraseña', 'required|matches[password]|trim|md5');

        $this->form_validation->set_message('required', 'Debe introducir el campo %s');
        $this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
        $this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
        $this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('usuarios');
        } else {
            $this->load->view('');
        }
    }
    
    }
?>
