<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php $id = clienteTableClass::CLIENTE_CODIGO ?>
<?php $nit = clienteTableClass::NIT ?>
<?php $razon = clienteTableClass::RAZON_SOCIAL ?>
<?php $codigo_plan = clienteTableClass::CODIGO_PLAN ?>
<?php $nombre_plan = clienteTableClass::NOMBRE_PLAN ?>
<?php view::includePartial('default/menuPrincipal') ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('default', ((isset($objConvenios)) ? 'update' : 'create')) ?>">
    <?php if (isset($objListar) == true): ?>
        <input name="<?php echo clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true) ?>" value="<?php echo $objListar[0]->$id ?>" type="hidden">
    <?php endif ?>

        <div class="container">

            <div style="margin-bottom: 10px; margin-top: 30px">
                <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>" class="btn btn-success btn-xs">INICIO</a>
            </div>

            <div data-role="page">
                <div data-role="header" data-theme="b">
                    <h1>Informacion de convenios Angel</h1>
                </div>
                <div data-role="content">
                    <div data-role="collapsible" data-theme="a" data-content-theme="b">
                        <h3>Elemento Collapsible simple</h3>
                        <p>Este es el contenido del collapsible el cual podemos ocultar</p>
                    </div>

                    <div data-role="collapsible" data-collapsed="false">
                        <h3>Elemento Collapsible abierto</h3>
                        <p>Este es el contenido del collapsible el cual podemos ocultar</p>
                        <a href="#" data-role="button" data-inline="true">hola</a>
                    </div>

                    <div data-role="collapsible" data-theme="a" data-content-theme="e">
                        <h3>Encabezado con tema A</h3>
                        <p>El contenido tiene el tema e</p>
                        <div data-role="collapsible" data-content-theme="a">
                            <h3>Collapsible dentro de otro</h3>
                            <p>En este caso vemos que este esta dentro de otro</p>
                        </div>
                    </div>

                    <div data-role="collapsible-set" data-theme="e" data-content-theme="a">
                        <div data-role="collapsible">
                            <h3>Primer elemento del acordeon</h3>
                            <p>Ahora estamos viendo el lemento tres del acordeon</p>
                        </div>

                        <div data-role="collapsible" >
                            <h3>Segundo elemento del acordeon</h3>
                            <p>Ahora estamos viendo el lemento tres del acordeon</p>

                        </div>

                        <div data-role="collapsible" data-theme="a" data-content-theme="b">
                            <h3>Tercer elemento del acordeon con tema diferente</h3>
                            <p>Ahora estamos viendo el lemento tres del acordeon tambien tiene contenido con otro tema</p>

                        </div>
                    </div>
                </div>
                <div data-role="footer">
                    <h3> Elementos Collaspsible</h3>
                </div>
            </div>

</form>

</div>
