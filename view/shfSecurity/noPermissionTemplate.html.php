<?php
use mvc\routing\routingClass as routing;
?>   
<h1>403</h1>
<p>Error de permisos</p>
<a class="button" href="<?php echo routing::getInstance()->getUrlWeb('default','index')?>">
    <i class="glyphicon glyphicon-home"></i>  Volver a la pagina de inicio</a>