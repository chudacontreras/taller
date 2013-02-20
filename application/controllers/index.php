<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        //$this->load->model('Users_Model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
    }
    
    function index() {
        $data['title'] = '.::.Taller PHP.::.';
        $data['main_content'] = 'index';
        $this->load->view('include/template_principal', $data);
    }

}