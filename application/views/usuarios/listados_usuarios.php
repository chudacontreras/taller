<style type="text/css">
<!--
.style1 {color: #0000FF}
-->
</style>

<p class="style1">Usuarios:</p>

<?php 

echo anchor('usuarios/agregar_usuarios','Agregar Nuevos Usuarios');
echo '<br />';
echo $table;

echo $pagination;

?>
