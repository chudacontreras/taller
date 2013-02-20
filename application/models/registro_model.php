<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registro_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    //realizamos la inserción de los datos y devolvemos el 
	//resultado al controlador para envíar el correo si todo ha ido bien
	function new_user($nombre,$correo,$nick,$password)
	{
       $data = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'nick' => $nick,
            'password' => $password
        );
        return $this->db->insert('usuarios', $data);	
    }
}