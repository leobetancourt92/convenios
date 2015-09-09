<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\session\sessionClass as session ?>
<div class="container container-fluid">

  <form class="form-signin" role="form" action="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'login') ?>" method="POST">
    <h2 class="form-signin-heading">Convenios Angel</h2>
    <div class="form-group">
	<label for="inputUser">Usuario:</label>
	<input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Usuario" required autofocus>
    </div>
    <div class="form-group">
	<label for="inputPassword">Contraseña: </label>
	<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
    </div>
    <button class="btn btn-lg btn-success" type="submit">Login</button>
    <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
    <?php view::includeHandlerMessage() ?>
    <?php endif ?>
  </form>

</div> <!-- /container -->
