<html>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen" />  
    <!--[if IE 6]><link rel="<?php echo base_url(); ?>css/stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="<?php echo base_url(); ?>css/stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
<!--[if IE 8]><link rel="<?php echo base_url(); ?>css/stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
<body>
                  <div class="art-content-layout">
                    
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1">
  
                         <div class="art-layout-bg"></div>   
                         <div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>
                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>
                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <h3 class="t"><script languaje="JavaScript"> 

var mydate=new Date() 
var year=mydate.getYear() 
if (year < 1000) 
year+=1900 
var day=mydate.getDay() 
var month=mydate.getMonth() 
var daym=mydate.getDate() 
if (daym<10) 
daym="0"+daym 
var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado") 
var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre") 
document.write("<small><font color='000000' face='Arial'>Bienvenid@ Hoy Es: &nbsp;"+dayarray[day]+",<br/> "+daym+" de "+montharray[month]+" de "+year+"</font></small>") 

                                 </script></h3>
                                             
                                          </div>
                                          <div class="art-blockcontent"></div>
                          		<div class="cleared"></div>
                              </div>
                              
                               <br  />
                          </div>
                         
                         
           
                          <div class="art-vmenublock">
                              <div class="art-vmenublock-tl"></div>
                              <div class="art-vmenublock-tr"></div>
                              <div class="art-vmenublock-bl"></div>
                              <div class="art-vmenublock-br"></div>
                              <div class="art-vmenublock-tc"></div>
                              <div class="art-vmenublock-bc"></div>
                              <div class="art-vmenublock-cl"></div>
                              <div class="art-vmenublock-cr"></div>
                              <div class="art-vmenublock-cc"></div>
                              <div class="art-vmenublock-body">
                                          <div class="art-vmenublockcontent">
                                              <div class="art-vmenublockcontent-body">
                                                          <ul class="art-vmenu">
                                                          	<li>
                                                          		<a href="<?php echo base_url(); ?>panel_control"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
                                                          	</li>
                                                                
                                                                <li>
                                                          		<a href="<?php echo base_url(); ?>celulas/listado_celulas"><span class="l"></span><span class="r"></span><span class="t">Celulas</span></a>
                                                          	</li>
                                                          	<li>
                                                          		<a href="<?php echo base_url(); ?>encuentros/listado_encuentro"><span class="l"></span><span class="r"></span><span class="t">Encuentros</span></a>
                                                          			
                                                          	</li>
                                                                <li>
                                                          		<a href="<?php echo base_url(); ?>eventos/listado_eventos"><span class="l"></span><span class="r"></span><span class="t">Eventos</span></a>
                                                          			
                                                          	</li>
                                                          	<li class="active">
                                                          		<a class="active" href="<?php echo base_url(); ?>ministerios/listado_ministerios"><span class="l"></span><span class="r"></span><span class="t">Ministerios</span></a>
                                                          		
                                                          	</li>
                                                          	<?php if ($this->session->userdata('nivel') == '1') { ?>
                                                          	<li>
                                                          		<a href="<?php echo base_url(); ?>usuarios/listado_usuarios"><span class="l"></span><span class="r"></span><span class="t">Usuarios</span></a>
                                                          		
                                                          	</li>
                                                                <?php }?>
                                                                
                                                                <?php if ($this->session->userdata('nivel') == '2') { ?>
                                                                <li>
                                                          		<a href="<?php echo base_url(); ?>usuarios/modificar_usuarios"><span class="l"></span><span class="r"></span><span class="t">Usuarios</span></a>
                                                          		
                                                          	</li>
                                                          	<?php } ?>
                                         
                                                          </ul>
                                          
                                          		<div class="cleared"></div>
                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
             
                         
                          <div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>
                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>
                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <h3 class="t">Contacto</h3>
                                          </div>
                                          <div class="art-blockcontent">
                                              <div class="art-blockcontent-body">
                                                          <div>
                                                              <br />
                                                              <img src="<?php echo base_url(); ?>/images/contact.jpg" alt="an image" style="margin: 0 auto;display:block;width:75%" />
                                                          <br />
                                                          <b>Ministerio Cristiano Ciudad Fuerte - Paz y Júbilo.</b><br />
                                                          Sector El Manzano, vía principal El Roble a 200mts del Bosque Macuto. Barquisimeto, Venezuela.<br />
                                                          Escríbenos para mayor información: <a href="mailto:info@ciudadfuerte.org">info@ciudadfuerte.org</a><br />
                                                          <br />
                                                          Telefono:<br>  
                                                          </br>+58-251-232.4901 <br />
                                                          Fax:+58-251-232.4901
                                                          </div>
                                          
                                          		<div class="cleared"></div>
                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                          <div class="cleared"></div>
                        </div>
                        <div class="art-layout-cell art-content">
                            
                               <div class="art-post">
                              <div class="art-post-tl"></div>
                              <div class="art-post-tr"></div>
                              <div class="art-post-bl"></div>
                              <div class="art-post-br"></div>
                              <div class="art-post-tc"></div>
                              <div class="art-post-bc"></div>
                              <div class="art-post-cl"></div>
                              <div class="art-post-cr"></div>
                              <div class="art-post-cc"></div>
                              <div class="art-post-body">
                          <div class="art-post-inner art-article">
                              <h2 class="art-postheader">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ministerio Cristiano Ciudad Fuerte - Administrador</h2>
                                          <div class="art-postcontent">
        
                                          </div>
                          </div>
                          
                          		<div class="cleared"></div>
                              </div>
                          </div>
                       
                          
                           
                           <div class="art-block-body">
                              <div class="art-blockcontent">
                                  <div class="art-blockcontent-body">
                                      
                                      
                                      
                                      
                
</body>
</html>