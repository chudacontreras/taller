<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen" />  
    <!--[if IE 6]><link rel="<?php echo base_url(); ?>css/stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="<?php echo base_url(); ?>css/stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 23px;
	top: 711px;
}
#Layer2 {
	position:absolute;
	width:920px;
	height:115px;
	z-index:1;
	left: 24px;
	top: 1001px;
}
.Estilo15 {font-size: 16px}
.Estilo17 {
	font-size: 24px;
	font-weight: bold;
	color: #2582A4;
}
#Layer3 {
	position:absolute;
	width:928px;
	height:115px;
	z-index:1;
	left: 35px;
}
#Layer4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
	left: 38px;
	top: 460px;
}
.Estilo18 {font-size: 18; }
.Estilo20 {font-size: 16px; font-weight: bold; }
.Estilo14 {font-size: 14px; font-weight: bold; }
.Estilo16 {font-size: 14px}
-->


label,input{
			display:inline-block;
			padding:5px;
		
		}
		div.error{
			background-color:#FF8F8F;
			border: 1px solid #000000;
			padding:5px;
                        width: 95%;
                        border: 1px;
                        margin-left: 0%;
		}
                
                 #caja{
                    background: #DCE3EA;
                    width: 60%;
                    border: 1px;
                    margin-left: 3%;            
                    
                }
                
                
                #formulario_dentro{
                    margin-bottom: 50px;
                    margin-top: 30px;
                    margin-left: 3%;
                    
                }





</style>

 <p>&nbsp;</p>
    <p>&nbsp;</p>
   

<div id="ContenidoSistema">
  
  <p>&nbsp;  </p>
  <h1 align="center">Acceso a la administración de Ciudad Fuerte!</h1>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usa un nombre de usuario y contraseña válido para poder tener acceso a la administración. </p>
  
  <div class="acceso" align="center">
      
      
    <div id="caja">

        <div id="formulario_dentro">


            <?php echo validation_errors('<div class="error">', '</div>') ?>            
            <?php echo form_open('acceso/verificar_login') ?>
            <br/><?php echo form_label('Nombre de Usuario: ', 'nombre_usuario') ?>
            <br/><?php echo form_input(array('name' => 'nombre_usuario', 'id' => 'nombre_usuario', 'size' => '30', 'value' => set_value('nombre_usuario'))) ?>
            <br/><?php echo form_label('Contraseña:', 'contrasena'); ?>
            <br/><?php echo form_password(array('name' => 'contrasena', 'id' => 'contrasena', 'size' => '30', 'value' => set_value('contrasena'))); ?>
            <p></p>
            <br/>
            &nbsp;&nbsp;&nbsp;<button type="submit"><img src="<?php echo base_url();?>images/login.png" /></button>&nbsp;&nbsp;&nbsp;
              <button type="reset"><img src="<?php echo base_url();?>images/cancelar.png" /></button>&nbsp;&nbsp;&nbsp;
            <?php echo form_close() ?>
        </div>
    </div>
         
    <table width="200" border="0" align="center">
      <tr>
        <td><p id="form-login-remember2">        
          <ul>
            <li><a href="../index.html">¿Olvidó su contraseña?</a></li>
            <li><a href="../index.html">¿Olvido su nombre de usuario?</a></li>
            <li><a href="<?php echo base_url();?>usuarios">Regístrese aqui</a></li>
        </ul></td>
      </tr>
    </table>
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

   
</div>