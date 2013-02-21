<?php
error_reporting(0);
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Miembros extends CI_Controller {

    public $modulo = "Miembros";

    function __construct() {
        parent::__construct();
        $this->load->model('Miembros_Model');
        $this->load->model('Red_Model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
        $this->load->library('lib');

        $this->_logueado();
    }

    function index() {
        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'miembros/miembros';
        $data['id_celula'] = $this->Miembros_Model->combo_celulas('celulas');
        $data['id_ministerio'] = $this->Miembros_Model->combo_ministerios('ministerios');
        $this->load->view('includes/template', $data);
    }

    function _logueado() {
        $_logueado = $this->session->userdata('logueado');
        if ($_logueado != TRUE) {

            redirect(acceso);
        }
    }

    function _miembro_existe($cedula_identidad) {
        return $this->Miembros_Model->miembro_existe($cedula_identidad);
    }

    function registrar_miembros() {

        $this->form_validation->set_rules('cedula_identidad', 'Cedula', 'required|trim|min_length[6]|callback__miembro_usuario|callback__miembro_existe');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|letras');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[2]|letras');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de Nacimiento', 'required|trim|min_length[5]|chk_date[<]');
        $this->form_validation->set_rules('direccion', 'direccion', 'required|trim|min_length[5]');

        $this->form_validation->set_message('_miembro_existe', 'Esta cedula ya se encuentra Registrada! Verifique e intente de nuevo.');
        $this->form_validation->set_message('required', 'Debe introducir el campo %s');
        $this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
        $this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
        $this->form_validation->set_message('chk_date', 'Fecha de Nacimiento puede ser superior a la fecha actual');
        $this->form_validation->set_message('letras', 'El campo %s  deben contener solo letras');
        $this->form_validation->set_message('phone', 'El campo %s  deben contener solo números.');
        $this->form_validation->set_message('_miembro_usuario', 'Disculpe esta cédula de identidad esta registrada con otro nombre usuario.');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $cedula_identidad = $this->input->post('cedula_identidad');
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $fecha_nacimiento = $this->lib->date_mysql($this->input->post('fecha_nacimiento'));

            $sexo = $this->input->post('sexo');
            $estado_civil = $this->input->post('estado_civil');
            $fecha_bautismo = $this->lib->date_mysql($this->input->post('fecha_bautismo'));
            $telefono = $this->input->post('telefono');
            $email = $this->input->post('email');
            $id_ministerio = $this->input->post('id_ministerio');
            $id_celula = $this->input->post('id_celula');
            $direccion = $this->input->post('direccion');
            $hijos = $this->input->post('hijos');

            $usuario = $this->session->userdata('nombre_usuario');

            $insertar = $this->Miembros_Model->registrar_miembros($cedula_identidad, $nombre, $apellido, $fecha_nacimiento, $sexo, $estado_civil, $hijos, $fecha_bautismo, $telefono, $email, $id_ministerio, $id_celula, $direccion, $usuario);

            $operaciones = 'Registrar';
            $this->Bitacora_Model->Bitacora($this->modulo, $operaciones);
            ?>
            <script>
                alert('Miembro Registrado(a) Exitosamente, para realizar una operación debe ser confirmado como miembro aactivo por un administrador el sistema, disculpe las molestia este proceso se realiza por motivos de seguridad.');
            </script>
            <?php

            $this->index();
        }
    }

    function editar_miembros($cedula_identidad) {
        $this->_logueado();
        
        $query = $this->Miembros_Model->ver_miembros($cedula_identidad);

        $data['model'] = $query->row();

        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['acciones'] = "miembros/editar_miembros/$cedula_identidad";
        $data['contenido_dinamico_base'] = 'miembros/editar_miembros';
        $data['id_celula'] = $this->Miembros_Model->combo_celulas('celulas');
        $data['id_ministerio'] = $this->Miembros_Model->combo_ministerios('ministerios');
        $data['id_red'] = $this->Miembros_Model->combo_red('red');


        $this->form_validation->set_rules('cedula_identidad', 'Cedula de identidad', 'required|callback__miembro_usuario');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|letras');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[2]|letras');
        $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de Nacimiento', 'required');

        $this->form_validation->set_message('required', 'Debe introducir el campo %s');
        $this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
        $this->form_validation->set_message('letras', 'El campo %s  deben contener solo letras');
        $this->form_validation->set_message('alpha_dash', 'El campo %s no debe contener caracteres especiales');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s no debe contener caracteres especiales');
        $this->form_validation->set_message('_miembro_usuario', 'Disculpe esta cédula de identidad esta registrada con otro nombre usuario.');

        if ($this->form_validation->run() == FALSE) {
            
        } else {

            $cedula_identidad = $this->input->post('cedula_identidad');
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $fecha_nacimiento = $this->lib->date_mysql($this->input->post('fecha_nacimiento'));

            $sexo = $this->input->post('sexo');
            $estado_civil = $this->input->post('estado_civil');
            $hijos = $this->input->post('hijos');
            $fecha_bautismo = $this->lib->date_mysql($this->input->post('fecha_bautismo'));
            $telefono = $this->input->post('telefono');
            $email = $this->input->post('email');
            $id_ministerio = $this->input->post('id_ministerio');
            $id_celula = $this->input->post('id_celula');
            $direccion = $this->input->post('direccion');


            $modificar = $this->Miembros_Model->modificar_miembros($cedula_identidad, $nombre, $apellido, $fecha_nacimiento, $sexo, $estado_civil, $hijos, $fecha_bautismo, $telefono, $email, $id_ministerio, $id_celula, $direccion);

            $operaciones = 'Modificar';
            $this->Bitacora_Model->Bitacora($this->modulo, $operaciones);
            
            
                        ?>
            <script>
                alert('Miembro Modificado(a) Exitosamente');
            </script>
            <?php
        }

        $this->load->view('includes/template',$data);
    }

    function miembros_bautizados() {
        $this->load->model('Bitacora_Model');
        $this->load->library('cezpdf');
        $this->load->helper('pdf');

        prep_pdf();


        $query = $this->Miembros_Model->miembros_bautizados();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

                $db_data[] = array(
                    'cedula_identidad' => $row->cedula_identidad,
                    'nombre' => $row->nombre,
                    'apellido' => $row->apellido,
                    'fecha_nacimiento' => $this->lib->date_php($row->fecha_nacimiento),
                    'sexo' => $row->sexo,
                    'estado_civil' => $row->estado_civil,
                    'fecha_de_bautismo' => $this->lib->date_php($row->fecha_de_bautismo),
                    'telefono' => $row->telefono, 'direccion' => $row->direccion,
                );
            }
        }

        $col_names = array(
            'cedula_identidad' => 'Cedula de identidad',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido', 'fecha_nacimiento' => 'Fecha de Nacimiento', 'sexo' => 'Sexo', 'estado_civil' => 'Estado Civil',
            'fecha_de_bautismo' => 'Fecha de Bautismo', 'telefono' => 'Telefono'
        );

        $this->cezpdf->ezTable($db_data, $col_names, 'Reporte de Miembros Bautizados', array('width' => 585));
        $this->cezpdf->ezStream();
    }

    private $limit = 20;

    function listado_miembros($offset = 0, $order_column = 'cedula_identidad', $order_type = 'asc') {

        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'id_ministerio';
        if (empty($order_type))
            $order_type = 'asc';

        $miembros = $this->Miembros_Model->ver_listado($this->limit, $offset, $order_column, $order_type)->result();

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'ministerios/listado_ministerios/';


        $config['total_rows'] = $this->Miembros_Model->count_all();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        
        $config['num_links'] = 2;


        $this->pagination->initialize($config);

        $this->load->library('table');
        $this->table->set_empty("&nbsp;&nbsp;&nbsp;");
        $new_order = ($order_type == 'asc' ? 'desc' : 'asc');

        $tmp = array('table_open' => '<table width="100%" bordercolor="#000" border="0" cellpadding="2" cellspacing="2">'); //modifica el espaciado
        $this->table->set_template($tmp);

        $this->table->set_heading(array("<tr bordercolor='#0000' bgcolor= '#CCCCCC' align='center' style='font-size:16px'>", 'Nombre', 'Apellido', 'Fecha nacimiento', 'sexo', 'Estado Civil', 'Hijos', 'Télefono', 'Dirección', 'Acciones')) . "<tr>";
        
        $i = 0 + $offset;

        if ($this->session->userdata('nivel') == '1') {
            foreach ($miembros as $miembro) {


                if ($miembro->estado == '1') {
                    $this->table->add_row("<tr bgcolor= '#CCCFFF' align='center' style='font-size:16px'>", $miembro->nombre, $miembro->apellido, $this->lib->date_php($miembro->fecha_nacimiento), $miembro->sexo, $miembro->estado_civil,$miembro->hijos ,$miembro->telefono, $miembro->direccion, anchor('eventos/ver/' . $miembro->cedula_identidad, 'Ver') . '&nbsp;&nbsp;' .
                                    anchor('miembros/editar_miembros/' . $miembro->cedula_identidad, 'Editar') . '&nbsp;&nbsp;' .
                                    anchor('miembros/desactivar/' . $miembro->cedula_identidad, 'Desactivar', array('onclick' => "return confirm('Esta seguro que desea Desactivar este miembro?')"))) . "<tr>";
                }


                if ($miembro->estado == '0') {
                    $this->table->add_row("<tr bgcolor= '#CCCFFF' align='center' style='font-size:16px'>", $miembro->nombre, $miembro->apellido, $this->lib->date_php($miembro->fecha_nacimiento), $miembro->sexo, $miembro->estado_civil, $miembro->hijos ,$miembro->telefono, $miembro->direccion, anchor('eventos/ver/' . $miembro->cedula_identidad, 'Ver') . '&nbsp;&nbsp;' .
                                    anchor('miembros/editar_miembros/' . $miembro->cedula_identidad, 'Editar') . '&nbsp;&nbsp;' .
                                    anchor('miembros/activar/' . $miembro->cedula_identidad, 'Activar')) . "<tr>";
                }
            }
        }



        $data['table'] = $this->table->generate();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('includes/cabecera');
        $this->load->view('includes/contenido_administracion');
        $this->load->view('miembros/listado_miembros', $data);
        $this->load->view('includes/piedepagina_administracion');

        $operaciones = 'Consultar';
        $this->Bitacora_Model->Bitacora($this->modulo, $operaciones);
    }
       

    function desactivar($cedula_identidad) {
        $activar = $this->Miembros_Model->desactivar_status($cedula_identidad);
        $operaciones = 'Desactivar Miembro';
        $this->Bitacora_Model->Bitacora($this->modulo, $operaciones);
            ?>
                <script>
                    alert('Miembro Desactivado exitosamente');    
                </script>
        <?php

        redirect('miembros/listado_miembros');
    }

    function activar($cedula_identidad) {
        $activar = $this->Miembros_Model->activar_status($cedula_identidad);
        $operaciones = 'Activar Miembro';
        $this->Bitacora_Model->Bitacora($this->modulo, $operaciones);
        ?>
                        <script>
                            alert('Miembro Activado exitosamente');    
                        </script>
        <?php

        redirect('miembros/listado_miembros');
    }

    function _miembro_usuario($cedula_identidad) {
        if ($this->session->userdata('nivel') == '2') {
            return $this->Validaciones_Model->miembro_usuario($cedula_identidad);
        }
    }

    function reportes() {
        $this->load->model('Bitacora_Model');
        $this->load->library('cezpdf');
        $this->load->helper('pdf');

        prep_pdf();


        $query = $this->Miembros_Model->miembros();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {

               if ($row->estado == '1'){
                   $estatus = 'Activado';
               }
               
               if ($row->estado == '0'){
                   $estatus = 'Desactivado';
               }
               
                $db_data[] = array(
                    'nombre' => $row->nombre,
                    'apellido' => $row->apellido,
                    'fecha_nacimiento' => $this->lib->date_php($row->fecha_nacimiento),
                    'sexo' => $row->sexo,
                    'estado_civil' => $row->estado_civil,
                    'telefono' => $row->telefono, 'direccion' => $row->direccion,
                    'esatus' => $estatus
                );
            }
        }

        $col_names = array(
            
            'nombre' => 'Nombre',
            'apellido' => 'Apellido', 'fecha_nacimiento' => 'Fecha de Nacimiento', 'sexo' => 'Sexo', 'estado_civil' => 'Estado Civil',
             'telefono' => 'Telefono', 'esatus' => 'Estado'
        );

        $this->cezpdf->ezTable($db_data, $col_names, 'Reporte de Miembros', array('width' => 585));
        $this->cezpdf->ezStream();
    }

}

?>
            
            