<?php
class Administracion_model extends Model {

   function __construct(){
      parent::Model();
   }
   
  function insertar_usuario($datos = array()){
      if(!$this->_required(array("nombre_usuario","nombre","email","contrasena"), $datos)){
         return FALSE;
      }
      //clave, encripto
      $datos['contrasena']=md5($datos['contrasena']);
   
      $this->db->insert('usuarios', $datos);
      return $this->db->insert_id();
   }
}
?>