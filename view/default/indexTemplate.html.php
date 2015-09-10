<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php //$usu = usuarioTableClass::USER     ?>
<?php //$id = usuarioTableClass::ID     ?>
<?php view::includePartial('default/menuPrincipal') ?>
<div class="container container-fluid">

    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
        </div>
        <div class="busqueda">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="" class="search-form">
                        <div class="form-group has-feedback">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" name="search" id="search" placeholder="Busqueda...." required autofocus>
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <th>Convenio</th>
                    <th>NIT</th>
                    <th>Razon social</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objConvenios as $convenio): ?>
                    <tr>
                        <td><?php echo $convenio->clte_cod_ppal ?></td>
                        <td><?php echo $convenio->nit ?></td>
                        <td><?php echo $convenio->razon ?></td>


                        <td>
                            <a href="#" class="btn btn-success btn-xs">Ver</a>


                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('default', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php //echo usuarioTableClass::getNameField(usuarioTableClass::ID, true)     ?>">
    </form>

    <div class="text-right">
        <?php echo i18n::__('page') ?> <select id="sqlPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>')">
            <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                <option <?php echo (isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
            <?php endfor ?>
        </select> 
        <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
    </div>

</div>
