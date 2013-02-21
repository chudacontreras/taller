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
                        margin-bottom: 5px;
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
	</style>
</head>

<body>
    <div id="caja">

        <div id="formulario_dentro">
           

            <?php echo validation_errors('<div class="error">', '</div>') ?>            
            <?php echo form_open($action_modificar) ?>
             <br/><?php echo form_label('Nombre de Usuario: ', 'nombre_usuario') ?>

             <br/><input type="hidden" size="30" name="nombre_usuario" value="<?php echo $this->session->userdata('nombre_usuario'); ?>" />
             
             
             <br/><?php echo form_label('Nombre: ', 'nombre') ?>
             <br/><input type="text" size="30"  name="nombre" value="<?php echo $this->session->userdata('nombre'); ?>" />
             <br/><?php echo form_label('Email:', 'email'); ?>
             <br/><input type="text" size="30"  name="email" value="<?php echo $this->session->userdata('email'); ?>" />
             <br/><?php echo form_label('Contraseña:', 'contrasena'); ?>
             <br/><input type="password" size="30" name="contrasena" value="" />
             <br/><?php echo form_label('Reescribe la contraseña:', 'recontrasena'); ?>
             <br/><?php echo form_password(array('name' => 'recontrasena', 'id' => 'recontrasena', 'size' => '30')); ?>
             
           <p></p>
            <br/>
              <button type="submit"><img src="<?php echo base_url();?>images/modificar.png" /></button>&nbsp;&nbsp;&nbsp;
              <button type="reset"><img src="<?php echo base_url();?>images/cancelar.png" /></button>&nbsp;&nbsp;&nbsp;
             <a href="<?php echo base_url();?>panel_control"><img src="<?php echo base_url();?>images/volver.png"></a> 
          
            <p></p>
            <br/>
            <?php echo form_close() ?>
            
            
            
           <p></p>
            <br/>

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