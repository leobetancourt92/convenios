<?php

use mvc\routing\routingClass as routing;
?>   
<h1>Error 403</h1>
<p>
Usted no tiene permisos para estar aquí, por favor comuníquese con el administrador de la plataforma
</p>
<a class="button" href="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>">
  <i class="glyphicon glyphicon-home"></i>  Volver a la página de inicio</a>