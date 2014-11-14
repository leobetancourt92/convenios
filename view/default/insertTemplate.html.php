<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('default', 'create') ?>">
  <?php echo i18n::__('user') ?>: <input type="text" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true) ?>">
  <br>
  <?php echo i18n::__('pass') ?>: <input type="password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__('register') ?>">
</form>