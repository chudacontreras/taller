<?php

class Bitacora extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Bitacora_Model');
        $this->load->helper('form');
        $this->load->library(array('pagination','form_validation'));
        
    }

    private $limit = 20;
    function index($offset = 0, $order_column = 'id_bitacora', $order_type = 'asc') {
    $data['acciones'] = "bitacora/index_fecha"; 
    $data['acciones_pdf'] = "bitacora/ver_pfd_fecha/";
  
        
        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'id_celula';
        if (empty($order_type))
            $order_type = 'asc';
        $bitacoras = $this->Bitacora_Model->ver_bitacora($this->limit,$offset, $order_column, $order_type)->result();

        $this->load->library('pagination');

        $config['base_url'] = base_url() . "bitacora/index";


        $config['total_rows'] = $this->Bitacora_Model->count_all();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;

        
        $this->pagination->initialize($config);

        $this->load->library('table');
        $this->table->set_empty("");
        
        
        
    
        $tmp = array ( 'table_open'  => '<table width="100%" bordercolor="#000" border="0" cellpadding="2" cellspacing="2">' ); //modifica el espaciado
        $this->table->set_template($tmp); 

        $this->table->set_heading(array("<tr bordercolor='#0000' bgcolor= '#CCCCCC' align='center' style='font-size:16px'>",'ID','Nombre Usuario', 'Fecha', 'Hora', 'Modulos', 'Operaciones'))."<tr>";

        $i = 0 + $offset;

        if ($this->session->userdata('nivel') == '1') {
            foreach ($bitacoras as $bitacora) {
              $this->table->add_row("<tr bgcolor= '#CCCFFF' align='center' style='font-size:16px'>",$bitacora->id_bitacora,$bitacora->nombre_usuario, $this->lib->date_php($bitacora->fecha), $bitacora->hora, $bitacora->modulo, $bitacora->operacion)."<tr>";
            }
        }

        $data['table'] = $this->table->generate();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('includes/cabecera');
        $this->load->view('includes/contenido_administracion');
        $this->load->view('bitacora',$data);
        $this->load->view('includes/piedepagina_administracion');
}



    function index_fecha($offset = 0, $order_column = 'id_bitacora', $order_type = 'asc') {
   
        $data['acciones'] = "bitacora/index_fecha";
        
        $data['acciones_pdf'] = "bitacora/ver_pfd_fecha/";
        $fecha_1 = $this->lib->date_mysql($this->input->post('f_date1'));
        $fecha_2 = $this->lib->date_mysql($this->input->post('fecha_2'));
       
        $this->form_validation->set_rules('f_date1', 'Fecha 1', 'required|chk_date[<]');
        $this->form_validation->set_rules('fecha_2', 'Fecha 2', 'required|chk_date[<]');
        $this->form_validation->set_message('required', 'Debe introducir el campo %s');
       $this->form_validation->set_message('chk_date', 'La %s no puede ser mayor a la fecha actual');
        if ($this->form_validation->run() == FALSE){
            
        }
         else
         
            $fecha_1 = $this->lib->date_mysql($this->input->post('f_date1'));
            $fecha_2 = $this->lib->date_mysql($this->input->post('fecha_2'));
        
        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'id_bitacora';
        if (empty($order_type))
            $order_type = 'asc';

        $bitacoras = $this->Bitacora_Model->ver_por_fecha($fecha_1, $fecha_2, $this->limit,$offset, $order_column, $order_type)->result();
        
        
        $this->load->library('pagination');

        $config['base_url'] = base_url() . "bitacora/index";


        $config['total_rows'] = $this->Bitacora_Model->count_all();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;

        
        
        
        $this->pagination->initialize($config);

        $this->load->library('table');
        $this->table->set_empty("");
        
        
        
    
        $tmp = array ( 'table_open'  => '<table width="100%" bordercolor="#000" border="0" cellpadding="2" cellspacing="2">' ); //modifica el espaciado
        $this->table->set_template($tmp); 

        $this->table->set_heading(array("<tr bordercolor='#0000' bgcolor= '#CCCCCC' align='center' style='font-size:16px'>",'ID','Nombre Usuario', 'Fecha', 'Hora', 'Modulos', 'Operaciones'))."<tr>";

        $i = 0 + $offset;
        
        if ($config['total_rows'] == '') {
            
           $data['no_registros'] = "NO HAY REGISTROS PARA ESTA FECHA";
           
           $data['table'] = $this->table->generate();

        $data['pagination'] = $this->pagination->create_links();
        
    

        $this->load->view('includes/cabecera');
        $this->load->view('includes/contenido_administracion');
        $this->load->view('bitacora',$data);
        $this->load->view('includes/piedepagina_administracion');
        
            
        } else {
            if ($this->session->userdata('nivel') == '1') {
                foreach ($bitacoras as $bitacora) {
                    $this->table->add_row("<tr bgcolor= '#CCCFFF' align='center' style='font-size:16px'>", $bitacora->id_bitacora, $bitacora->nombre_usuario, $this->lib->date_php($bitacora->fecha), $bitacora->hora, $bitacora->modulo, $bitacora->operacion) . "<tr>";
                }
            }
        }
        

        $data['table'] = $this->table->generate();

        $data['pagination'] = $this->pagination->create_links();
        
    

        $this->load->view('includes/cabecera');
        $this->load->view('includes/contenido_administracion');
        $this->load->view('bitacora',$data);
        $this->load->view('includes/piedepagina_administracion');
       
        

}

    function _logueado() {
        $_logueado = $this->session->userdata('logueado');
        if ($_logueado != TRUE) {

            redirect(acceso);
        }
    }
    
    
        function ver_pfd_fecha($fecha_1, $fecha_2) {
            $fecha_1 = $this->lib->date_mysql($this->input->post('fecha_1'));
            $fecha_2 = $this->lib->date_mysql($this->input->post('fecha_2'));
            
        $data['acciones_pdf'] = "bitacora/ver_pfd_fecha/$fecha_1,$fecha_2";
        $this->load->view('bitacora',$data);
        
        prep_pdf();
        
        
        $query = $this->Bitacora_Model->ver_por_fecha($fecha_1, $fecha_2);
        if ($query->num_rows($id_red) > 0) {
            foreach ($query->result() as $row) {
                
                $db_data[] = array(
                    'id_bitacora' => $row->id_bitacora,
                    'fecha' => $this->lib->date_php($row->fecha),
                    'hora' => $row->hora);
            }
        }

        $col_names = array(
            'id_bitacora' => 'Nombre de Red',
            'fecha' => 'Ministerio',
            'hora' => 'Descripcion de Red'
        );

        $this->cezpdf->ezTable($db_data, $col_names, 'Listado de Redes', array('width' => 550));
        $this->cezpdf->ezStream();
        
        
    }
    
    
            function ver_pfd() {
                
        $this->load->model('Bitacora_Model');
        $this->load->library('cezpdf');
        $this->load->helper('pdf');

        prep_pdf();
        
        
        $query = $this->Bitacora_Model->ver_pdf();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                
                $db_data[] = array(
                    'id_bitacora' => $row->id_bitacora,
                    'nombre_usuario' => $row->nombre_usuario,
                    'fecha' => $this->lib->date_php($row->fecha),
                    'hora' => $row->hora,
                    'modulo'=> $row->modulo,
                    'operacion' =>$row->operacion
                    );
                    
            }
        }

        $col_names = array(
            'id_bitacora' => 'ID',
            'nombre_usuario' => 'Usuario',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
            'modulo' => 'Modulo',
            'operacion' => 'Operaciones'
        );
        
       
        $this->cezpdf->ezTable($db_data, $col_names, 'Reporte de Bitacora', array('width' => 550));
        $this->cezpdf->ezStream();
        
        
    }
    
}

?>