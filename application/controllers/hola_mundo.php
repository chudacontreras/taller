<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hola_mundo extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
 $data['title'] = 'Acceso a Track Star';
        $data['main_content'] = 'users/login';
        $this->load->view('includes/template',$data);        
//$this->load->view('includes/hola_mundo_view');
        //echo 'Hola Mundo desde el Controlador';
    }
    
 
}
