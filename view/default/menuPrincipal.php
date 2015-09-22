<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\session\sessionClass as session ?>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <img  style="margin-top: 3px;float: left;"alt="Brand" src="<?php echo routing::getInstance()->getUrlImg('angel1.png') ?>" width="150px" height="50px">
      <a class="navbar-brand" href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile() ?>">Consulta de convenios</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="navbar-header" style="float: right;">
            <p class="navbar-text" style="color: white"><i class="fa fa-user-md fa-2x"></i> Usuario: <?php echo session::getInstance()->getUserName(); ?></p>
            <p class="navbar-text">
                <a style="color: white" href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>"><i class="fa fa-power-off fa-2x"></i> Cerrar Sesion</a></li>
            </p>
        </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div id="particles-js"></div>