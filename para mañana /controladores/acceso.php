<?php

class Acceso extends CI_Controller {
    
    public  $modulo = "Acceso";

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->load->library('validation');
        $this->load->model('Usuarios_Model');
        $this->load->model('Bitacora_Model');
        
    }

    function index() {
        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'acceso/acceso';
        $this->load->view('includes/template_principal', $data);
    }

    function verificar_login() {


        $this->form_validation->set_rules('nombre_usuario', 'Nombre de Usuario', 'required|callback__nombre_no_usuario_existe');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|callback__contrasena_no_existe');

        $this->form_validation->set_message('_nombre_no_usuario_existe', 'Usuario es incorrecto o no existe verifique e intente de nuevo.');
        $this->form_validation->set_message('_contrasena_no_existe', '%s es incorrecta verifique e intente de nuevo.');
        $this->form_validation->set_message('required', 'Debe introducir el campo %s');


        if ($this->form_validation->run() == FALSE) {

            $this->index();
        } else {

            $this->entrar();
        }
    }

    function _nombre_no_usuario_existe($nombre_usuario) {
        return $this->Usuarios_Model->nombre_no_usuario_existe($nombre_usuario);
    }

    function _contrasena_no_existe($nombre_usuario, $contrasena) {
        return $this->Usuarios_Model->contrasena_no_existe($nombre_usuario, $contrasena);
    }

    function entrar() {
        $nombre_usuario = $this->input->post('nombre_usuario');
        $contrasena = $this->input->post('contrasena');

        $login = $this->Usuarios_Model->verificar_login($nombre_usuario, $contrasena);



        if ($login) {
            $data = array(
                'logueado' => TRUE,
                'nombre_usuario' => $login[0]->nombre_usuario,
                'nombre' => $login[0]->nombre,
                'email'  => $login[0]->email,
                'nivel' => $login[0]->id_nivel_acceso);

            $this->session->set_userdata($data);
             
            $operaciones = 'Ingresar Sistema';
            $this->Bitacora_Model->Bitacora($this->modulo,$operaciones);
            
            redirect('panel_control');
        }
    }

}

