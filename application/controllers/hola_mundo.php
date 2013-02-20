<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hola_mundo extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('include/hola_mundo_view');
        //echo 'Hola Mundo desde el Controlador';
    }
    
 
}
