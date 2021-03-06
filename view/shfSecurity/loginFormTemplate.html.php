<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<div id="particles-js"></div>
<div class="container container-fluid">

  <form class="form-horizontal" role="form" action="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'login') ?>" method="POST">
      <div class="form-signin-heading"><h2 class="form-signin-heading"><img class="img-circle" src="<?php echo routing::getInstance()->getUrlImg('logo2.png')?>" style="width: 150px;">Convenios Angel</h2></div>
      

    <div class="form-group">
      <label for="inputEmail" class="control-label col-xs-3"><i class="fa fa-user-md fa-2x"></i> Usuario:</label>
      <div class="col-xs-8">
        <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Usuario" required autofocus>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="control-label col-xs-3"><i class="fa fa-key fa-lg"></i> Password: </label>
      <div class="col-xs-8">
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-12">
        <button style="margin-left: 42%;"class="btn btn-lg btn-primary" type="submit">Login</button>
      </div>
    </div>

    <div class="form-group">
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p style="text-align: center"><strong>Recuerde! </strong>Ingresar con sus credenciales de DBWINSISLAB</p>
      </div>
    </div>

<?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
  <?php view::includeHandlerMessage() ?>
<?php endif ?>

  </form>
</div> <!-- /container -->
