<<?php

class Prueba_Model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    /*
         
     function get_combo($table, $order = null){
		
		$data = array();
        $data['']='Seleccione una opcion'; 
 
        if ($this->db->field_exists('gente', $table)) {
      		$this->db->where('habilitado', 'SI'); 
        }
          
		$id = "id_".$table;
		$this->db->select("$id as id_gente, nombre");
		
		// order 
		if (is_null($order)) {
			$this->db->order_by($id);
		}else{
		 	$this->db->order_by($order);
		}
		
   		$query = $this->db->get($table);
   						 		
	    foreach($query->result() as $row){
           $data[$row->id_gente]= ucwords(strtolower($row->nombre));
        }
   
		return $data;
	}
     
     */
	
    
    function obtiene_combo($table, $order = null) {

        $data = array();
        $data[''] = 'Seleccione una opcion';

        if ($this->db->field_exists('ministerios', $table)) {
            $this->db->where('habilitado', 'SI');
        }

        $id = "id_ministerio";
        $this->db->select("$id as id_ministerio, nombre");

        // order 
        if (is_null($order)) {
            $this->db->order_by('nombre');
        } else {
            $this->db->order_by('nombre');
        }

        $query = $this->db->get($table);

        foreach ($query->result() as $row) {
            $data[$row->id_ministerio] = ucwords(strtolower($row->nombre));
            
            $data['model']->Red_Model->get()->result(); 
        }

        return $data;
    }
    
    
    

    /*      funnciona 100% 
     * 
     * {

        $resultado = array();

        $query = $this->db->select("id_gente, nombre")->get("gente");

        foreach ($query->result() as $fila)
            $resultado[$fila->id_gente] = $fila->nombre;

        return $resultado;
        
        var_dump($resultado);
     * 
     * 
     * */
     
    
    
    
    
    
    
    
    
}