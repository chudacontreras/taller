<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Centinela {

    var $_nombre_usuario = "";
    var $_email = "";
    var $_contrasena = "";
    var $_id_nivel_acceso = "";
    var $_auth = FALSE;

}

function Centinela($auto = TRUE) {
    if ($auto) {
        $CI = & get_instance();

        if ($this->login($CI->session->userdata('nombre_usuario'), $CI->session->userdata('contrasena'))) {
            $this->_nombre_usuario = $CI->session->userdata('nombre_usuario');
            $this->_contrasena = $CI->session->userdata('contrasena');
            $this->_email = $CI->session->userdata('email');
            $this->_id_nivel_acceso = $CI->session->userdata('id_nivel_acceso');
        }
    }
}

function getId() {
    return $this->_id;
}

function getNombre_usuario() {
    return $this->_nombre_usuario;
}

function getContrasena() {
    return $this->_contrasena;
}

function getId_nivel_acceso() {
    return $this->_id_nivel_acceso;
}


function getEmail() {
    return $this->_email;
}


function login($nombre_usuario = "", $contrasena = "") {
    if (empty($nombre_usuario) || empty($contrasena))
        return FALSE;

    $CI = & get_instance();

    $sql = "SELECT * FROM `usuarios` WHERE `nombre_usuario`=? AND `contrasena`=?";
    $query = $CI->db->query($sql, array($nombre_usuario, $contrasena));

    //login ok
    if ($query->num_rows() == 1) {
        $row = $query->row();

        $CI->session->set_userdata('nombre_usuario', $nombre_usuario);
        $this->_nombre_usuario = $nombre_usuario;
        $CI->session->set_userdata('ccontrasena', $contrasena);
        $this->_contrasena = $row->contrasena;
        $CI->session->set_userdata('id_nivel_acceso', $row->id_nivel_acceso);
        $this->_id_nivel_acceso = $row->id_nivel_acceso;
        $CI->session->set_userdata('email', $email);
        $this->_email = $row->email;

        $this->_auth = TRUE;

        return TRUE;
    } else {
        $this->_auth = FALSE;
        $this->logout();

        return FALSE;
    }
}

function logout() {
    $CI = & get_instance();
    $CI->session->sess_destroy();
    $this->_auth = FALSE;
}


function comprobar($id_nivel_acceso = 0, $estricto = TRUE) {
    if (!$this->_auth)
        return FALSE;

    if ($estricto) {
        if ($id_nivel_acceso == $this->_id_nivel_acceso)
            return TRUE;
        else
            return FALSE;
    }
    else 
        {
        if($nivel <= $this->_id_nivel_acceso)
        {
        return TRUE;
        }
        
        else
        return FALSE;
    }
}