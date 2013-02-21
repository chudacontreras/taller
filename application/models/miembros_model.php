<?php

class Miembros_Model extends CI_Model {

    function registrar_miembros($cedula_identidad, $nombre, $apellido, $fecha_nacimiento, $sexo, $estado_civil,$hijos, $fecha_bautismo, $telefono, $email, $id_ministerio, $id_celula, $direccion, $usuario) {

        $data = array(
            'cedula_identidad' => $cedula_identidad,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'fecha_nacimiento' => $fecha_nacimiento,
            'sexo' => $sexo,
            'estado_civil' => $estado_civil,
            'hijos' => $hijos,
            'fecha_de_bautismo' => $fecha_bautismo,
            'telefono' => $telefono,
            'email' => $email,
            'id_ministerio' => $id_ministerio,
            'id_celula' => $id_celula,
            'direccion' => $direccion,
            'nombre_usuario' => $usuario
        );
        return $this->db->insert('miembros', $data);
    }

    function modificar_miembros($cedula_identidad, $nombre, $apellido, $fecha_nacimiento, $sexo, $estado_civil,$hijos, $fecha_bautismo, $telefono, $email, $id_ministerio, $id_celula, $direccion) {

        $data = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'fecha_nacimiento' => $fecha_nacimiento,
            'sexo' => $sexo,
            'estado_civil' => $estado_civil,
            'hijos' => $hijos,
            'fecha_de_bautismo' => $fecha_bautismo,
            'telefono' => $telefono,
            'email' => $email,
            'id_ministerio' => $id_ministerio,
            'id_celula' => $id_celula,
            'direccion' => $direccion,
        );

        $this->db->where('cedula_identidad', $cedula_identidad);
        return $this->db->update('miembros', $data, array('cedula_identidad' => $cedula_identidad));
    }

    function combo_celulas($table, $order = null) {

        $data = array();
        $data[''] = 'Seleccione una opcion';


        $this->db->select("id_celula,cedula_lider, nombre,apellido, direccion_celulas");
        $this->db->from('celulas');
        $this->db->join('miembros', 'miembros.id_celula = celulas.id_celulas');
        $this->db->where('lider_celula', '1');

        $this->db->order_by('nombre');


        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $data[$row->id_celula] = (strtoupper($row->nombre . '  ' . $row->apellido));
        }

        return $data;
    }

    function combo_red($table, $order = null) {

        $data = array();
        $data['0'] = 'Seleccione una opcion';

        if ($this->db->field_exists('red', $table)) {
            $this->db->where('habilitado', 'SI');
        }

        $id = "id_red";
        $this->db->select("$id as id_red, nombre_red");

        // order 
        if (is_null($order)) {
            $this->db->order_by('nombre_red');
        } else {
            $this->db->order_by('nombre_red');
        }

        $query = $this->db->get($table);

        foreach ($query->result() as $row) {
            $data[$row->id_red] = ucwords(strtolower($row->nombre_red));
        }

        return $data;
    }

    function combo_ministerios($table, $order = null) {

        $data = array();
        $data['0'] = 'Seleccione una opcion';

        if ($this->db->field_exists('ministerios', $table)) {
            $this->db->where('habilitado', 'SI');
        }

        $id = "id_ministerio";
        $this->db->select("$id as id_ministerio, nombre_ministerios");

        // order 
        if (is_null($order)) {
            $this->db->order_by('nombre_ministerios');
        } else {
            $this->db->order_by('nombre_ministerios');
        }

        $query = $this->db->get($table);

        foreach ($query->result() as $row) {
            $data[$row->id_ministerio] = ucwords(strtolower($row->nombre_ministerios));
        }

        return $data;
    }

    function miembro_existe($cedula_identidad) {
        $this->db->where('cedula_identidad', $cedula_identidad);
        $query = $this->db->get('miembros');

        if ($query->num_rows() > 0) {

            return FALSE;
        } else {
            return TRUE;
        }
    }

    function no_miembro_existe($cedula_identidad) {
        $this->db->where('cedula_identidad', $cedula_identidad);
        $query = $this->db->get('miembros');

        if ($query->num_rows() > 0) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    function miembros_bautizados() {
        $sql = "SELECT cedula_identidad, nombre, apellido,fecha_nacimiento, sexo, estado_civil, fecha_de_bautismo, telefono, direccion FROM iglesia.miembros
where  fecha_de_bautismo > 0";
        return $this->db->query($sql);
    }
    
    function miembros(){
        return $this->db->get('miembros');
    }

    function ver_listado($num, $offset) {
        $this->db->select('cedula_identidad, nombre, apellido,fecha_nacimiento, sexo, estado_civil,hijos, fecha_de_bautismo, nombre_ministerios, telefono, direccion, estado');
        $this->db->from('miembros');
        $this->db->join('ministerios', 'miembros.id_ministerio = ministerios.id_ministerio');
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query;
    }

    function count_all() {
        return $this->db->count_all('miembros');
    }

    function miembro_usuario($cedula_identidad) {
        
    }

    function activar_status($cedula_identidad) {

        $data = array('estado' => 1);
        $this->db->where('cedula_identidad', $cedula_identidad);
        return $this->db->update('miembros', $data);
    }

    function desactivar_status($cedula_identidad) {

        $data = array('estado' => 0);
        $this->db->where('cedula_identidad', $cedula_identidad);
        return $this->db->update('miembros', $data);
    }

        function ver_miembros($cedula_identidad) {
        $this->db->select('cedula_identidad, nombre, apellido,fecha_nacimiento, sexo, estado_civil,hijos,email, fecha_de_bautismo, nombre_ministerios, telefono, direccion, estado');
        $this->db->from('miembros');
        $this->db->join('ministerios', 'miembros.id_ministerio = ministerios.id_ministerio');
        $this->db->where('cedula_identidad', $cedula_identidad);
        $query = $this->db->get();
        return $query;
    }
}