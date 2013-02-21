<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>form_view</title>
	<style type="text/css" media="screen">
		label,input{
			display:inline-block;
			padding:5px;
		
		}
		div.error{
			background-color:#FF8F8F;
			border: 1px solid #000000;
			padding:5px;
                        width: 100%;
                        border: 1px;
                        margin-left: -10%;
		}
                
                 #caja{
                    background: #DCE3EA;
                    width: 45%;
                    border: 1px;
                    margin-left: 25%;            
                    
                }
                
                
                #formulario_dentro{
                    margin-bottom: 50px;
                    margin-top: 30px;
                    margin-left: 15%;
                    
                }
                
                
                 .Estilo1 {
                    font-size: 20px;
                    font-weight: bold;
                }
	</style>
</head>

    <body>
        <div id="caja">

            <div id="formulario_dentro">

                <span class="Estilo1">Registro de Usuarios</span> 
                <?php echo validation_errors('<div class="error">', '</div>') ?>            
                <?php echo form_open('usuarios/agregar_usuarios') ?> <br/>
                <?php echo form_label('Nombre de Usuario: ', 'nombre_usuario') ?>
                <br/>  <?php echo form_input(array('name' => 'nombre_usuario', 'id' => 'nombre_usuario', 'size' => '30', 'value' => set_value('nombre_usuario'))) ?>
                <br/>  <?php echo form_label('Nombre: ', 'nombre') ?>
                <br/>  <?php echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'size' => '30', 'value' => set_value('nombre'))) ?>
                <br/>  <?php echo form_label('Email:', 'email'); ?>
                <br/>  <?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30', 'value' => set_value('email'))); ?>
                <br/>  <?php echo form_label('Contraseña:', 'contrasena'); ?>
                <br/>  <?php echo form_password(array('name' => 'contrasena', 'id' => 'contrasena', 'size' => '30', 'value' => set_value('contrasena'))); ?>
                <br/>  <?php echo form_label('Reescribe la contraseña:', 'recontrasena'); ?>
                <br/>  <?php echo form_password(array('name' => 'recontrasena', 'id' => 'recontrasena', 'size' => '30')); ?>

                <p></p>
                <br/>
                &nbsp;&nbsp;&nbsp;<button type="submit"><img src="<?php echo base_url();?>images/registrar.png" /></button>&nbsp;&nbsp;&nbsp;
              <button type="reset"><img src="<?php echo base_url();?>images/cancelar.png" /></button>&nbsp;&nbsp;&nbsp;
              <a href="<?php echo base_url();?>usuarios/listado_usuarios"><img src="<?php echo base_url();?>images/volver.png"></a>   
                <p></p>
                <br/>
                <?php echo form_close() ?>



            </div>



        </div>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </body>
</html>