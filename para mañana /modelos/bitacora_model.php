<?php

class Bitacora_Model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('date');
    }

    function Bitacora($modulo, $operaciones) {

        $usuario = $this->session->userdata('nombre_usuario');
        if (isset($usuario)) {

            $sql = "insert into bitacora values (null,now(),now(),'$modulo','$operaciones','$usuario')";
            return $this->db->query($sql);
        }
    }

    function ver_bitacora($num, $offset) {
        return $query = $this->db->get('bitacora', $num, $offset);
    }

    function count_all() {
        return $this->db->count_all('bitacora');
    }

    function ver_por_fecha($fecha_1, $fecha_2, $num, $offset) {
        $sql = "SELECT * FROM bitacora  where fecha  BETWEEN  '$fecha_1' and '$fecha_2'";
        return $this->db->query($sql);
    }
    
     function ver_pdf() {
        return $query = $this->db->get('bitacora');
    }

}

?>
