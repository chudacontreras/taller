<?php

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }

    function index() {
        $data['contenido_dinamico_base'] = 'index';
        $data ['titulo'] = 'Ministerio Cristiano Ciudad Fuerte - Paz y Jubilo';
        $this->load->view('includes/template_principal', $data);
    }

    function info_sistema() {

        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'info_sistema';
        $this->load->view('includes/template', $data);
    }

    function construccion() {

        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'construccion';
        $this->load->view('includes/template_principal', $data);
    }
       
   

}