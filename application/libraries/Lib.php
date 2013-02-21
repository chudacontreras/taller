<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Lib del sistema
 * 
 * @author Citrion
 */
class Lib {

	function Lib() {
		 
		$this->CI =& get_instance();
	}

        

	// 'fecha_nac' =>date('Y/d/m', strtotime($this->input->post('fecha_nac'))
	// http://www.desarrolloweb.com/articulos/1280.php
	// http://www.mysqlformatdate.com/
	// http://shinytype.com/php/codeigniter-php-time-to-mysql-datetime-helper/
	// http://codeigniter.com/wiki/MySQL_DATETIME_Helper/

	/*
	 | Convierte fecha de mysql a php (dd-mm-yyyy)
	 | date('d/m/Y',strtotime($model->fecha_nac))
	 */
	function date_php($fecha, $separador = '-'){
		 
		$lafecha = date('d-m-Y', strtotime($fecha));
		return ($lafecha == '00-00-0000' )? '': $lafecha;
	}

	/*
	 | Convierte fecha de mysql a php (dd-mm-yyyy- hh:mm:ss)
	 */
	function date_php2($fecha, $separador = '-'){

		$lafecha = date('d-m-Y H:i:s',strtotime($fecha));
		return ($lafecha == '00-00-0000' )? '': $lafecha;
	}
	/*
	 | Convierte fecha de php a mysql (yyyy-mm-dd)
	 | date('Y/d/m', strtotime($this->input->post('fecha_nac')) )
	 */
	function date_mysql($fecha, $separador = '-'){

		if ($fecha<>""){
			$trozos = explode($separador, $fecha, 3);
			if (empty($trozos)) return null;
			return $trozos[2]."-".$trozos[1]."-".$trozos[0];
		}else{
			return null;
		}
	}
	/**
	 * date_mysql2
	 * Convierte un string a una fecha mysql formato largo 
	 * 
	 * @in:  dd/mm/yyyy hh:mm:ss (string)
	 * @out: yyyy-mm-dd hh:mm:ss (string)
	 * 
	 * @param $fecha
	 * @param $separador
	 * @return string
	 */
	function date_mysql2($fecha, $separador = '-'){
      
		if ($fecha<>""){
			
			$trozos=explode($separador, $fecha,3);
			//echo var_dump($trozos);
			
			$year = substr($trozos[2], 0, 4);
			$mes = $trozos[1];
			$dia = $trozos[0];
			$hora = substr($trozos[2], 4);

			//echo $year."-".$mes."-".$dia.' '.$hora.'<br>';
			
			return $year."-".$mes."-".$dia.' '.$hora;
			
		}else{
			return null;
		}
	}
	 
	// Alias
	function date_yyyymmdd($fecha){
		$this->date_mysql($fecha);
	}

	function date_us($fecha){
		$this->date_mysql($fecha);
	}
	 
	function date_ddmmyyyy($fecha){
		$this->date_php($fecha);
	}
	 
	function date_en($fecha){
		$this->date_php($fecha);
	}

	/**
	 * Devuelve la hora actual en formato date  
	 * 
	 * @return dd/mm/yyy (date)
	 */
	function get_date(){

		//strtotime(date("d-m-Y H:i:00",time()));
		return date('d-m-Y');
	}
	
	/**
	 * Formatea una fecha a un string descriptivo
	 * ej: Lunes 30 de Julio
	 * 
	 * @param $FechaStamp(Y-m-d)(date)
	 * @return unknown_type
	 */
	function FechaFormateada($FechaStamp){

		$ano = date('Y',$FechaStamp);
		$mes = date('n',$FechaStamp);
		$dia = date('d',$FechaStamp);
		$diasemana = date('w',$FechaStamp);

		$diassemanaN = array("Domingo","Lunes","Martes","Miércoles",
	                         "Jueves","Viernes","Sábado");

		$mesesN = array(1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
	                    "Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		 
		return $diassemanaN[$diasemana].", $dia ". $mesesN[$mes] ." $ano";
	}
	
   /** 
    * sumarMinutosFecha
    * 
    * @param fecha (Y-m-d H:i:s)
    * @return $fecha
    */
    function sumarMinutosFecha($FechaStr, $MinASumar) {
     
        $FechaStr = str_replace("-", " ", $FechaStr);
        $FechaStr = str_replace(":", " ", $FechaStr);
       
        $FechaOrigen = explode(" ", $FechaStr);
       
        $Dia = $FechaOrigen[2];
        $Mes = $FechaOrigen[1];
        $Ano = $FechaOrigen[0];
       
        $Horas = $FechaOrigen[3];
        $Minutos = $FechaOrigen[4];
        $Segundos = $FechaOrigen[5];
       
        // Sumo los minutos
        $Minutos = ((int)$Minutos) + ((int)$MinASumar);
       
        // Asigno la fecha modificada a una nueva variable
        $FechaNueva = date("Y-m-d H:i:s",mktime($Horas,$Minutos,$Segundos,$Mes,$Dia,$Ano));
       
        return $FechaNueva;
      }

     /**
      * Imprime por pantalla un array formateado
      * 
      * @param $array
      * @return unknown_type
      */ 
	  function echo_array($array){ 
		 
    	echo "<pre>";print_r($array);echo"</pre>"; 
	}

	/**
	 * mail
	 * 
	 * Realiza los envios de email
	 * del sistema
	 */
	function mail($email){
			
		// Config Mail
		$config['protocol'] = 'smtp';
		$config['smtp_port'] = 9025;
		$config['smtp_host'] = 'mail.citrion.com';
		$config['smtp_user'] = 'info+citrion.com';
		$config['smtp_pass'] = 'malvinas82';
		$config['charset'] = 'UTF-8';
		$config['wordwrap'] = TRUE;
		
		// Send Mail
		$this->CI->email->initialize($config);
		$this->CI->email->from('info@citrion.com', 'Citrion');
		$this->CI->email->to($email['to']);
		$this->CI->email->subject($email['subject']);
		$this->CI->email->message($email['message']);
			
		$this->CI->email->send();		
	}
	
	/**
	 * Cast Null
	 * 
	 * evalua '' , 0 y retorna null
	 * @param $valor
	 * @return unknown_type
	 */
	function cnull(&$valor){
	
		return !$valor ? null: $valor;	
	}

}