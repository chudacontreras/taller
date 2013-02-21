<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <!--
        Created by Artisteer v3.0.0.32906
        Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ciudad Fuerte</title>
            
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen" />  
        <!--[if IE 6]><link rel="<?php echo base_url(); ?>css/stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 7]><link rel="<?php echo base_url(); ?>css/stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
        <!--[if IE 8]><link rel="<?php echo base_url(); ?>css/stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->    
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/validaciones.js"></script>
    </head>
    <body>
        <div id="art-page-background-glare">
            <div id="art-page-background-glare-image">
                <div id="art-main">
                    <div class="art-sheet">
                        <div class="art-sheet-tl"></div>
                        <div class="art-sheet-tr"></div>
                        <div class="art-sheet-bl"></div>
                        <div class="art-sheet-br"></div>
                        <div class="art-sheet-tc"></div>
                        <div class="art-sheet-bc"></div>
                        <div class="art-sheet-cl"></div>
                        <div class="art-sheet-cr"></div>
                        <div class="art-sheet-cc"></div>
                        <div class="art-sheet-body">
                            <div class="art-header">
                                <div class="art-header-center">
                                    <div class="art-header-png"></div>
                                </div>
                                <script type="text/javascript" src="<?php echo base_url(); ?>js/swfobject.js"></script>
                                <div id="art-flash-area">
                                    <div id="art-flash-container">
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="art-nav">
                                <div class="l"></div>
                                <div class="r"></div>
                                <ul class="art-menu">
                                    <li>
                                        <a href="<?php echo base_url(); ?>panel_control" class="active"><span class="l"></span><span class="r"></span><span class="t">Panel</span></a>
                                    </li>
                                    <li>
                                        <a href=""><span class="l"></span><span class="r"></span><span class="t">Usuarios</span></a>
                                        <ul>
                                             <?php if ($this->session->userdata('nivel') == '2') { ?>
                                            <li><a href="<?php echo base_url(); ?>usuarios/editar_usuarios"> Editar Usuarios</a></li>
                                            <?php } ?>
                                            <?php if ($this->session->userdata('nivel') == '1') { ?>
                                                <li><a href="<?php echo base_url(); ?>usuarios/listado_usuarios">Listas de Usuarios</a></li>
                                                <li><a target="_blank" href="<?php echo base_url(); ?>usuarios/reportes">Reportes Gráficos</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>	
                                        
                                        
                                    <li>
                                        <a href=""><span class="l"></span><span class="r"></span><span class="t">Miembros</span></a>
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>miembros"> Registro de Miembros</a></li>
                                            <li><a href="<?php echo base_url(); ?>miembros/editar_miembros">Editar Miembros</a></li>
                                            <?php if ($this->session->userdata('nivel') == '1') { ?>
                                                    
                                                <li><a href="<?php echo base_url(); ?>miembros/listado_miembros">Listas de Miembros</a></li>
                                                <li><a target="_blank" href="<?php echo base_url(); ?>miembros/reportes">Reportes Miembros</a></li>
                                                <li><a target="_blank" href="<?php echo base_url(); ?>miembros/miembros_bautizados">Reporte Miembros Bautizados</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                        
                                        
                                    <li>
                                        <a href=""><span class="l"></span><span class="r"></span><span class="t">Células</span></a>
                                        <ul>
                                            <?php if ($this->session->userdata('nivel') == '1') { ?>
                                                <li><a href="<?php echo base_url(); ?>celulas"> Registro de Células</a></li>
                                            <?php } ?>
                                            <li><a href="<?php echo base_url(); ?>celulas/listado_celulas">Listas de Células</a></li>
                                                
                                            <?php if ($this->session->userdata('nivel') == '1') { ?>
                                            <li><a target="_blank" href="<?php echo base_url(); ?>celulas/reportes">Reportes Células</a></li>
                                            <?php } ?>
                                                
                                        </ul>
                                    </li>

                                    
                                        <li>
                                            <a href=""><span class="l"></span><span class="r"></span><span class="t">Encuentro</span></a>
                                            <ul>
                                                                               
                                              <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                                ?>
                                                        
                                                <li><a href="<?php echo base_url(); ?>encuentros/registrar"> Registro de Encuentros</a></li>
                                                <?php
                                            }
                                            ?>
                                                
                                            <li><a href="<?php echo base_url(); ?>encuentros/listado_encuentro">Listas de Encuentros</a></li>
                                            <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                               
                                            }
                                            ?>       
                                                
                                            </ul>
                                        </li>
                                    
                                    <li>
                                        <a href=""><span class="l"></span><span class="r"></span><span class="t">Ministerios</span></a>
                                        <ul>
                                            <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                                ?>
                                                        
                                                <li><a href="<?php echo base_url(); ?>ministerios/registrar_ministerios"> Registro de Ministerios</a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="<?php echo base_url(); ?>ministerios/listado_ministerios">Listas de Ministerios</a></li>
                                            <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                                ?>
                                                        
                                            <li><a target="_blank" href="<?php echo base_url(); ?>ministerios/reportes">Reportes Gráficos Ministerios</a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                        
                                     <li>
                                        <a href=""><span class="l"></span><span class="r"></span><span class="t">Red</span></a>
                                        <ul>
                                            <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                                ?>
                                                        
                                                <li><a href="<?php echo base_url(); ?>redes"> Registro de Redes</a></li>
                                                <?php
                                            }
                                            ?>
                                            <li><a href="<?php echo base_url(); ?>redes/listado_redes">Listas de Redes</a></li>
                                            <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                               
                                            }
                                            ?>
                 
                          
                                                
                                        </ul>
                                    </li>
                                    
                           
                                    
                                        <li>
                                        <a href=""><span class="l"></span><span class="r"></span><span class="t">Eventos</span></a>
                                        <ul>
                                            <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                                ?>
                                                        
                                                <li><a href="<?php echo base_url(); ?>eventos"> Registro de Eventos</a></li>
                                                <li><a href="<?php echo base_url(); ?>eventos/listado_eventos"> Listado de Eventos</a></li>
                                                <?php
                                            }
                                            ?>
                                              <?php
                                            if ($this->session->userdata('nivel') == '2') {
                                                ?> 
                                            <li><a href="<?php echo base_url(); ?>eventos/listado_eventos">Suscribir Eventos</a></li>
                                            <li><a href="<?php echo base_url(); ?>eventos/listado_eventos_suscrito">Cancelar Eventos</a></li>
                                           <?php } ?>

                                                 <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                                ?>
                                                        
                                            <li><a target="_blank" href="<?php echo base_url(); ?>eventos/reportes">Reportes Gráficos Eventos</a></li>
                                                <?php } ?>
                                        </ul>
                                    </li>
                                        
                                        
                                      <? 
                                 if ($this->session->userdata('nivel') == '1') {
                                                ?>     
                                    <li>
                                        <a href="#"><span class="l"></span><span class="r"></span><span class="t">Mantenimiento</span></a>
                                            
                                        <ul><?php
                                            if ($this->session->userdata('nivel') == '1') {
                                                ?>
                                            <li><a href="<?php echo base_url(); ?>bitacora/index">Bitacora</a></li>
                                            <?php } ?>
                                            <li><a href="<?php echo base_url(); ?>panel_control/creditos">Acerca de</a></li>
                                            <?php
                                            if ($this->session->userdata('nivel') == '1') {
                                                ?>
                                            <li><a href="<?php echo base_url(); ?>mantenimiento/respaldar">Respaldar Base de Datos</a></li>
                                            <li><a href="<?php echo base_url(); ?>mantenimiento/restaurar">Restaurar Base de Datos</a></li>
                                            <?php } ?>
                                            
                                            <li><a href="<?php echo base_url(); ?>panel_control/info_sistema">Información del Sistema</a></li>
                                        </ul>
                                    </li>
                                      <?php } ?>  
                                    
                                   <? 
                                 if ($this->session->userdata('nivel') == '2') {
                                                ?>   
                                                                        <li>
                                        <a href="#"><span class="l"></span><span class="r"></span><span class="t">Ayuda</span></a>
                                            
                                        <ul><li><a href="<?php echo base_url(); ?>panel_control/creditos">Acerca de</a></li>
                                            <li><a href="<?php echo base_url(); ?>panel_control/info_sistema">Información del Sistema</a></li>
                                           </ul>
                                    </li>
                                    <?php } ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <li> <a href="<?php echo base_url(); ?>panel_control/salir"><span class="1"></span><span class="r"></span><span class="t">Salir</span></a>
                                        
                                    </li>
                                        
                                        
                                </ul>
                            </div>
                            </body>
                            </html>