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
</style>

<div id="ContenidoSistema">
  
  <p>&nbsp;  </p>
  <h1 align="center">Acceso a la administración de Ciudad Fuerte!</h1>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usa un nombre de usuario y contraseña válido para poder tener acceso a la administración. </p>
  
  <div class="acceso" align="center">
      <form id="formulario" action="<?php echo base_url();?>administracion/panel_control" method="POST" name="formulario">
      <p>&nbsp;</p>
      <table width="295" height="138" border="0" align="center" class="box">
        <tr>
          <td width="127"><label for="modlgn_username5"><span class="Estilo14">Nombre de usuario</span></label></td>
          <td width="205"><input name="usuario" type="text" class="inputbox" id="usuario" value="" size="25" alt="usuario"></td>
        </tr>
        <tr>
          <td><label for="modlgn_passwd"><span class="Estilo14">Contraseña</span></label></td>
          <td><input id="contrasena" type="password" name="contrasena" class="inputbox" size="25" alt="contrasena" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;
              <input id="envia" name="envia" type="button" class="Estilo14" value=" Iniciar Sección"></inptu>
              <input id="cancelar" name="cancelar" type="reset" class="Estilo14" value="Restablecer"></td>
           <input name="operaciones" type="hidden" id="operaciones" ><td width="26"></input>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
    <table width="200" border="0" align="center">
      <tr>
        <td><p id="form-login-remember2">        
          <ul>
            <li><a href="../index.html">¿Olvidó su contraseña?</a></li>
            <li><a href="../index.html">¿Olvido su nombre de usuario?</a></li>
            <li><a href="<?php echo base_url();?>administracion/usuarios">Regístrese aqui</a></li>
        </ul></td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>