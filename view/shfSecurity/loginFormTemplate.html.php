<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\session\sessionClass as session ?>
<div class="container container-fluid">
    
    <form class="form-horizontal" role="form" action="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'login') ?>" method="POST">
        <h2 class="form-signin-heading">Convenios Angel</h2>
        
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-3"><i class="fa fa-user-md fa-2x"></i>    Usuario:</label>
            <div class="col-xs-8">
                <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Usuario" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-3"><i class="fa fa-key fa-lg"></i>Password</label>
            <div class="col-xs-8">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
            </div>
        </div>
       
        <div class="form-group">
            <div class="col-lg-12">
                <button class="btn btn-lg btn-primary" type="submit">Login</button>
            </div>
        </div>
        
        <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                <?php view::includeHandlerMessage() ?>
            <?php endif ?>
        
    </form>
</div> <!-- /container -->
