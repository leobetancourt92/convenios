<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\i18n\i18nClass as i18n ?>

<?php

use mvc\session\sessionClass as session ?>
<?php //$usu = usuarioTableClass::USER       ?>
<?php //$id = usuarioTableClass::ID       ?>
<?php view::includePartial('default/menuPrincipal') ?>
<?php //view::includePartial('admin/notificaciones') ?>

<?php $cliente_codigo = clienteTableClass::CLIENTE_CODIGO ?>
<?php $plan_codigo = clienteTableClass::CODIGO_PLAN ?>
<?php $nit = clienteTableClass::NIT ?>
<?php $razon_social = clienteTableClass::RAZON_SOCIAL ?>
<?php $ver_editar = "convenios.condiciones.clte_codigo" ?>


<script type="text/javascript">
<?php $conteo = count($objBitacora) ?>

    var i = 1;
    for (i = 1; i <= 100; i++) {

        function generate(container, type) {

            var n = $(container).noty({
                text: type,
                type: 'information',
                dismissQueue: true,
                layout: 'topCenter',
                theme: 'defaultTheme',
                maxVisible: <?php echo ($conteo <= 3 ? $conteo : 3) ?>,
                timeout: 5000,
            });

            console.log('html: ' + n.options.id);
        }

        function generateAll() {



<?php foreach ($objBitacora as $value) : ?>


                generate('div#customContainer', '<?php echo "se modifico el convenio: " . $value->clte_codigo . '  ' ?><?php echo "Fecha: " . $value->fecha ?>');

<?php endforeach ?>

        }
        $(document).ready(function () {

            generateAll();

        });
    }


</script>



<script>

    $(document).ready(function ()
    {
        $('#search').keyup(function ()
        {
            $(this).val($(this).val().toUpperCase());
        });
    });



    function myFunction() {
        var busqueda = $('#search').val();
        var filtro = $('input[type="radio"]:checked').val();
        //var filtro = $('#radioInline').val();

        var parametros = {
            filtro: filtro,
            busqueda: busqueda
        };

        $.ajax({
            data: parametros,
            url: '<?php echo routing::getInstance()->getUrlWeb('@filtroAjax') ?>',
            type: 'post',
            error: function (request, status, error) {
                // alert(request.responseText+'  hola  '+pdf);
            },
            beforeSend: function () {
                //alert("Procesando sus examenes, espere un momento por favor...");
            },
            afterSend: function () {
                //alert("holas.. Holas");
            },
            success: function (data) {
                var autocompletar = new Array();
                $(data).each(function (index, element) {
                    autocompletar.push(data[index]);
                });
                $("#search").autocomplete({//Usamos el ID de la caja de texto donde lo queremos
                    source: autocompletar //Le decimos que nuestra fuente es el arregl
                });
            }
        });
    }
</script>

<div class="container container-fluid">

    <div style="width: 100%;  height: 150px;">
        <div id="customContainer" style="width: 100%; border: 1px solid #ccc; padding: 5px">
            <center><p><strong>Notificaciones</strong></p></center>
        </div>
    </div> 

    <h2 style="text-align: center;">Administración de convenios</h2>

    <div style="margin-bottom: 10px; margin-top: 30px">

        <?php if (session::getInstance()->hasAttribute('clienteIndexFilter')): ?>
            <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'deleteFilters') ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-filter"></i>Borrar Filtros</a>
        <?php endif; ?>

    </div>

    <?php view::includeHandlerMessage() ?>

    <div class="busqueda">
        <div class="row">
            <div class="col-md-8" style="margin: 0 auto; float:none;">
                <form class="form-horizontal" id="filterFormUser" name="filterFormUser" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>">
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input autocomplete="Off" type="text" class="form-control" name="filter" id="search" placeholder="Busqueda..." onkeyup="myFunction()" required autofocus>
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                    <div class="col-md-12" style="text-align: center; margin-bottom: 3%;">
                        <div class="checkbox checkbox-info checkbox-circle checkbox-inline">
                            <input type="radio" id="inlineRadio1" value="nit" name="radioInline" checked>
                            <label for="inlineRadio1"><strong>Nit</strong></label>
                        </div>
                        <div class="checkbox checkbox-info checkbox-circle checkbox-inline">
                            <input type="radio" id="inlineRadio2" value="razon" name="radioInline">
                            <label for="inlineRadio2"><strong>Razon Social</strong></label>
                        </div>
                        <div class="checkbox checkbox-info checkbox-circle checkbox-inline">
                            <input type="radio" id="inlineRadio3" value="clte_cod_ppal" name="radioInline">
                            <label for="inlineRadio3"><strong>Codigo del plan</strong></label>
                        </div>
                        <div class="checkbox checkbox-info checkbox-circle checkbox-inline">
                            <input type="radio" id="inlineRadio4" value="nombre" name="radioInline">
                            <label for="inlineRadio4"><strong>Nombre del plan</strong></label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr class="info">
                <th style="color: white;">Codigo Cliente</th>
                <th style="color: white;">Convenio</th>
                <th style="color: white;">NIT</th>
                <th style="color: white;">Razon social</th>
                <th style="color: white;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($objConveniosAdministrator)): ?>
                <?php foreach ($objConveniosAdministrator as $convenio): ?>
                    <tr>
                        <td><?php echo $convenio->$cliente_codigo ?></td>
                        <td><?php echo $convenio->$plan_codigo ?></td>
                        <td><?php echo $convenio->$nit ?></td>
                        <td><?php echo $convenio->$razon_social ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'listar', array(clienteTableClass::CLIENTE_CODIGO => $convenio->clte_codigo)) ?>" class="<?php echo (is_null($convenio->c) ? "btn btn-success btn-xs" : "btn btn-warning btn-xs") ?>"><?php echo (is_null($convenio->c) ? "crear" : "editar") ?></a>
                            <?php if (!is_null($convenio->c)) : ?>

                                <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'historico', array(clienteTableClass::CLIENTE_CODIGO => $convenio->clte_codigo)) ?>" class="btn btn-default btn-xs">Historico</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="text-right">
        <?php echo i18n::__('page') ?> <select id="sqlPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>')">
            <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                <option <?php echo (isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
            <?php endfor ?>
        </select> 
        <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
    </div>

</div>








