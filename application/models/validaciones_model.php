<?php

class Validaciones_Model extends CI_Model {

    function __construct() {
        parent::__construct();

    }
    
    function no_activado($cedula_identidad){

        $estatus  = '0';
        $this->db->where('cedula_identidad', $cedula_identidad);
        $this->db->where('estado', $estatus);
        $query = $this->db->get('miembros');

        if ($query->num_rows() > 0) {

            return FALSE;
        } else {
            return TRUE;
        }
        
    }

    function miembro_usuario($cedula_identidad){
        
        $usuario = $this->session->userdata('nombre_usuario');             
        $this->db->where('cedula_identidad', $cedula_identidad);
        $this->db->where('nombre_usuario',$usuario);
        $query = $this->db->get('miembros');

        if ($query->num_rows() > 0) {

            return FALSE;
        } else {
            return TRUE;
        }        
        
    }

    function limite_x_red($cedula_identidad,$id_red){
        
        $this->db->select('cedula_identidad, nombre_usuario, id_red');
        $this->db->from('miembros');
        $this->db->join('celulas', 'miembros.id_celula = miembros.id_celula');
        $this->db->where('cedula_identidad', $cedula_identidad);
        $this->db->where('id_red', $id_red);
        $query = $this->db->get();  
    
        if ($query->num_rows() > 0) {

            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    
 
}

?>