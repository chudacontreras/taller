<?php

class Usuarios_Model extends CI_Model {

    function nombre_usuario_existe($nombre_usuario) {

        $this->db->where('nombre_usuario', $nombre_usuario);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() > 0) {

            return FALSE;
        } else {
            return TRUE;
        }
    }

    function email_existe($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() > 0) {

            return FALSE;
        } else {
            return TRUE;
        }
    }

    function registrar_usuario($nombre_usuario, $nombre, $email, $contrasena) {

        $data = array(
            'nombre_usuario' => $nombre_usuario,
            'nombre' => $nombre,
            'email' => $email,
            'contrasena' => $contrasena,
            'id_nivel_acceso' => '2'
        );
        return $this->db->insert('usuarios', $data);
    }

    function modificar_usuario($nombre_usuario, $nombre, $email, $contrasena) {

        $data = array(
            'nombre' => $nombre,
            'email' => $email,
            'contrasena' => $contrasena);

        $this->db->where('nombre_usuario', $nombre_usuario);
        return $this->db->update('usuarios', $data);
    }

    function verificar_login($nombre_usuario, $contrasena) {

        $this->db->where('nombre_usuario', $nombre_usuario);
        $this->db->where('contrasena', $contrasena);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
            return false;
        }
    }

    function get_usuarios($num, $offset) {
        $query = $this->db->get('usuarios', $num, $offset);
        return $query;
    }

    function get_usuarios_desc($campo) {
        //$this->db->orderby($campo.'desc');
        $query = $this->db->get('usuarios');
        return $query;
    }

    function count_all() {
        return $this->db->count_all('usuarios');
    }

    function activar($nombre_usuario) {

        $data = array('estatus' => 1);
        $this->db->where('nombre_usuario', $nombre_usuario);
        return $this->db->update('usuarios', $data);
    }

    function desactivar($nombre_usuario) {

        $data = array('estatus' => 0);
        $this->db->where('nombre_usuario', $nombre_usuario);
        return $this->db->update('usuarios', $data);
    }

    function nombre_no_usuario_existe($nombre_usuario) {

        $this->db->where('nombre_usuario', $nombre_usuario);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() > 0) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function contrasena_no_existe($contrasena) {

        $this->db->select('nombre_usuario,contrasena');
        $this->db->where('contrasena', $contrasena);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() > 0) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function ver_nombre_usuario($nombre_usuario){
        $this->db->where('nombre_usuario', $nombre_usuario);
        $query = $this->db->get('usuarios');
        return $query;
    }
    
    
        function pdf_usuarios() {

        $this->db->select('nombre_usuario, nombre, email ,descripcion ,estatus');
        $this->db->from('usuarios');
        $this->db->join('nivel', 'usuarios.id_nivel_acceso');
        $query = $this->db->get();

        return $query;
    }
    
}

