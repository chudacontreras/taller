<?php

class Usuarios extends CI_Controller {
    
    public $modulo = 'Usuarios';

    function __construct() {
        parent::__construct();
        $this->load->model('Usuarios_Model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    function index() {
        $data['contenido_dinamico_base'] = 'usuarios/usuarios';
        $data ['titulo'] = 'Ministerio Cristiano Ciudad Fuerte - Paz y Jubilo';
        $this->load->view('includes/template_principal', $data);
    }

    function modificar($nombre_usuario) {

        $this->_logueado();
        $query = $this->Usuarios_Model->ver_nombre_usuario($nombre_usuario);
        $data['model'] = $query->row();
        $data['contenido_dinamico_base'] = 'usuarios/usuarios_modificar';
        $data ['titulo'] = 'Ministerio Cristiano Ciudad Fuerte - Paz y Jubilo';
        $data['action_modificar']= "usuarios/modificar_usuarios/$nombre_usuario";
        $this->load->view('includes/template', $data);
    }

    function _logueado() {
        $_logueado = $this->session->userdata('logueado');
        if ($_logueado != TRUE) {

            redirect(acceso);
        }
    }

    function acceso() {

        $data['title'] = 'Ministerio Cristiano Ciudad Fuerte';
        $data['contenido_dinamico_base'] = 'acceso/acceso';
        $this->load->view('includes/template_principal', $data);
    }

    function registrar_usuarios() {
        

        $this->form_validation->set_rules('nombre_usuario', 'Nombre de Usuario', 'required|trim|min_length[5]|callback__nombre_usuario_existe');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim|min_length[5]|letras');
        $this->form_validation->set_rules('email', 'correo electrónico', 'required|valid_email|trim|callback__email_existe');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|trim');
        $this->form_validation->set_rules('recontrasena', 'reescribir Contraseña', 'required|matches[contrasena]|trim|md5');

        $this->form_validation->set_message('required', 'Debe introducir el campo %s');
        $this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
        $this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
        $this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
        $this->form_validation->set_message('letras', 'El campo %s  deben contener solo letras');
        $this->form_validation->set_message('alpha_dash', 'El campo %s no debe contener caracteres especiales');
        $this->form_validation->set_message('_nombre_usuario_existe', 'Nombre de Usuario ya Existe, elija otro por favor');
        $this->form_validation->set_message('_email_existe', 'Este Email ya Existe, elija otro por favor');


        
        
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else 
            
            
            {

            $nombre_usuario = $this->input->post('nombre_usuario');
            $nombre = $this->input->post('nombre');
            $email = $this->input->post('email');
            $contrasena = $this->input->post('contrasena');

            $insertar = $this->Usuarios_Model->registrar_usuario($nombre_usuario, $nombre, $email, $contrasena);
            
            ?>
            
            <script type="text/javascript">
                alert("Usuario Registado Exitosamente");
            </script>
            <?php
            $this->acceso();
        }
    }

    function modificar_usuarios($nombre_usuario) {
        $this->_logueado();
        
        
        $data['action_modificar']= "usuarios/modificar_usuarios/$nombre_usuario";
        $query = $this->Usuarios_Model->ver_nombre_usuario($nombre_usuario);
        $data['model'] = $query->row();
        
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[5]|letras');
        $this->form_validation->set_rules('email', 'correo electrónico', 'required|valid_email|trim|callback__email_check');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|trim');
        $this->form_validation->set_rules('recontrasena', 'reescribir Contraseña', 'required|matches[contrasena]|trim|md5');

         $this->form_validation->set_message('_nombre_no_usuario_existe', 'Usuario es incorrecto o no existe verifique e intente de nuevo.');
        $this->form_validation->set_message('required', 'Debe introducir el campo %s');
        $this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
        $this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
        $this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
        $this->form_validation->set_message('letras', 'El campo %s  deben contener solo letras');
        $this->form_validation->set_message('alpha_dash', 'El campo %s no debe contener caracteres especiales');
        $this->form_validation->set_message('_nombre_usuario_existe', 'Nombre de usuario Existe Elija otro por Favor');


        if ($this->form_validation->run() == FALSE) {
            $this->modificar();
        } else {

            $nombre_usuario = $this->input->post('nombre_usuario');
            $nombre = $this->input->post('nombre');
            $email = $this->input->post('email');
            $contrasena = $this->input->post('contrasena');

            echo $nombre_usuario;
            $modificar = $this->Usuarios_Model->modificar_usuario($nombre_usuario, $nombre, $email, $contrasena);
            $operaciones = 'Modificar';
            $this->Bitacora_Model->Bitacora($this->modulo,$operaciones);    
            ?>
            
            <script type="text/javascript">
                alert("Usuario Modificado Exitosamente");
            </script>
            <?php
            if ($this->session->userdata('nivel') == '1') {
            $this->listado_usuarios();
        }
        
        }
    }
    
    
    function editar_usuarios() {
        $this->_logueado();
        
        
        $data['action_modificar']= "usuarios/editar_usuarios/";
           
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[5]|letras');
        $this->form_validation->set_rules('email', 'correo electrónico', 'required|valid_email|trim|callback__email_check');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|trim');
        $this->form_validation->set_rules('recontrasena', 'reescribir Contraseña', 'required|matches[contrasena]|trim|md5');

         $this->form_validation->set_message('_nombre_no_usuario_existe', 'Usuario es incorrecto o no existe verifique e intente de nuevo.');
        $this->form_validation->set_message('required', 'Debe introducir el campo %s');
        $this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
        $this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
        $this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
        $this->form_validation->set_message('letras', 'El campo %s  deben contener solo letras');
        $this->form_validation->set_message('alpha_dash', 'El campo %s no debe contener caracteres especiales');
        $this->form_validation->set_message('_nombre_usuario_existe', 'Nombre de usuario Existe Elija otro por Favor');


        if ($this->form_validation->run() == FALSE) {
           
        } else {

            $nombre_usuario = $this->input->post('nombre_usuario');
            $nombre = $this->input->post('nombre');
            $email = $this->input->post('email');
            $contrasena = $this->input->post('contrasena');

            echo $nombre_usuario;
            $modificar = $this->Usuarios_Model->modificar_usuario($nombre_usuario, $nombre, $email, $contrasena);
            $operaciones = 'Modificar';
            $this->Bitacora_Model->Bitacora($this->modulo,$operaciones);    
            ?>
            
            <script type="text/javascript">
                alert("Usuario Modificado Exitosamente");
            </script>
            <?php
            if ($this->session->userdata('nivel') == '1') {
            $this->listado_usuarios();
        }
        
        }
        
        $data['contenido_dinamico_base'] = 'usuarios/modificar_usuarios';
        $data ['titulo'] = 'Ministerio Cristiano Ciudad Fuerte - Paz y Jubilo';
        $this->load->view('includes/template', $data);
        
    }
    
    
    function _nombre_usuario_existe($nombre_usuario) {
        return $this->Usuarios_Model->nombre_usuario_existe($nombre_usuario);
                
    }
    
    function _email_existe($email) {
        return $this->Usuarios_Model->email_existe($email);
    }

    private $limit = 5;

    function listado_usuarios($offset = 0, $order_column = 'nombre_usuario', $order_type = 'asc') {


        if (empty($offset))
            $offset = 0;
        if (empty($order_column))
            $order_column = 'nombre_usuario';
        if (empty($order_type))
            $order_type = 'asc';

        $personas = $this->Usuarios_Model->get_usuarios($this->limit, $offset, $order_column, $order_type)->result();

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'usuarios/listado_usuarios/';

        $config['total_rows'] = $this->Usuarios_Model->count_all();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Ultimo';
        $config['num_links'] = 2;


        $this->pagination->initialize($config);

        $this->load->library('table');
        $this->table->set_empty("&nbsp;&nbsp;&nbsp;");
        $new_order = ($order_type == 'asc' ? 'desc' : 'asc');

        $this->table->set_heading('Id', anchor('usuarios' . $offset . 'nombre', 'Nombre Usuario'), anchor('usuarios' . $offset . 'nombre', 'Nombre'), anchor('usuarios' . $offset . 'email', 'Email'), anchor('usuarios' . $offset . 'nivel', 'Nivel')
                , 'Acciones');

        $i = 0 + $offset;

        
   
   if ($this->session->userdata('nivel') == '1') { 
        foreach ($personas as $persona) {
            if($persona->estatus == '0'){
            $this->table->add_row(++$i, $persona->nombre_usuario, $persona->nombre, $persona->email, $persona->id_nivel_acceso, anchor('usuarios/ver/' . $persona->nombre_usuario, 'Ver') . '&nbsp;&nbsp;' .
                    anchor('usuarios/modificar/' . $persona->nombre_usuario, 'Editar') . '&nbsp;&nbsp;' .
                    anchor('usuarios/activar/' . $persona->nombre_usuario, 'Activar'));
        }}

     }
         
     
        if ($this->session->userdata('nivel') == '1') { 
        foreach ($personas as $persona) {
            if($persona->estatus == '1'){
               
            $this->table->add_row(++$i, $persona->nombre_usuario, $persona->nombre, $persona->email, $persona->id_nivel_acceso, anchor('usuarios/ver/' . $persona->nombre_usuario, 'Ver') . '&nbsp;&nbsp;' .
                    anchor('usuarios/modificar/' . $persona->nombre_usuario, 'Editar') . '&nbsp;&nbsp;' .
                    anchor('usuarios/desactivar/' . $persona->nombre_usuario, 'Desactivar', array('onclick' => "return confirm('Esta seguro que desea Desactiviarlo?')")));
        }
        
        }

     }

     
if ($this->session->userdata('nivel') == '2') { 
        foreach ($personas as $persona) {
            $usario = $this->session->userdata('nombre_usuario');
            $this->table->add_row(++$i, $persona->nombre_usuario, $persona->nombre, $persona->email, $persona->id_nivel_acceso, anchor('usuarios/ver/' . $persona->nombre_usuario, 'Ver'));
        }

     }
        
        $data['table'] = $this->table->generate();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('includes/cabecera');
        $this->load->view('includes/contenido');
        $this->load->view('usuarios/listados_usuarios', $data);
        $this->load->view('includes/piedepagina_administracion');
    }

    function activar($nombre_usuario) {
        $activar = $this->Usuarios_Model->activar($nombre_usuario);
        $operaciones = 'Activar';
        $this->Bitacora_Model->Bitacora($this->modulo,$operaciones);
        $this->listado_usuarios();
    }

    function desactivar($nombre_usuario) {
        $desactivar = $this->Usuarios_Model->desactivar($nombre_usuario);
        $operaciones = 'Desactivar';
        $this->Bitacora_Model->Bitacora($this->modulo,$operaciones);
        $this->listado_usuarios();
        
        
    }

    function index_agregar() {
        $data['contenido_dinamico_base'] = 'usuarios/agregar_nuevo';
        $data ['titulo'] = 'Ministerio Cristiano Ciudad Fuerte - Paz y Jubilo';
        $this->load->view('includes/template', $data);
    }

    function agregar_usuarios() {

        $this->form_validation->set_rules('nombre_usuario', 'Nombre de Usuario', 'required|trim|min_length[5]|callback__username_check');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'correo electrónico', 'required|valid_email|trim|callback__email_check');
        $this->form_validation->set_rules('contrasena', 'Contraseña', 'required|trim');
        $this->form_validation->set_rules('recontrasena', 'reescribir Contraseña', 'required|matches[contrasena]|trim|md5');

        $this->form_validation->set_message('required', 'Debe introducir el campo %s');
        $this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s carácteres');
        $this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
        $this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
        $this->form_validation->set_message('alpha', 'El campo %s  deben contener solo letras');
        $this->form_validation->set_message('alpha_dash', 'El campo %s no debe contener caracteres especiales');


        if ($this->form_validation->run() == FALSE) {
            $this->index_agregar();
        } else {

            $nombre_usuario = $this->input->post('nombre_usuario');
            $nombre = $this->input->post('nombre');
            $email = $this->input->post('email');
            $contrasena = $this->input->post('contrasena');

            $insertar = $this->Usuarios_Model->registrar_usuario($nombre_usuario, $nombre, $email, $contrasena);
            $operaciones = 'Registrar';
            $this->Bitacora_Model->Bitacora($this->modulo,$operaciones);
            $this->listado_usuarios();
        }
    }
        
    function _nombre_no_usuario_existe($nombre_usuario) {
    return $this->Usuarios_Model->nombre_no_usuario_existe($nombre_usuario);
                
    }
    
    
        function reportes() {
        $this->load->model('Usuarios_Model');
        $this->load->library('cezpdf');
        $this->load->helper('pdf');

        prep_pdf();


        $query = $this->Usuarios_Model->pdf_usuarios();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                
                 if ($row->estatus == '1'){
                   $estatus = 'Activado';
               }
               
               if ($row->estatus == '0'){
                   $estatus = 'Desactivado';
               }
                
                $db_data[] = array(
                    'nombre_usuario' => $row->nombre_usuario,
                    'nombre' => $row->nombre,
                    'email' => $row->email,
                    'descripcion' => $row->descripcion,
                    'estatus' => $estatus);
            }
        }

        $col_names = array(
            'nombre_usuario' => 'Nombre de Usuario',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'descripcion' => 'Nivel',
            'estatus' => 'Estado'
        );

        $this->cezpdf->ezTable($db_data, $col_names, 'Listado de Usuarios', array('width' => 550));
        $this->cezpdf->ezStream();
    }
    


}