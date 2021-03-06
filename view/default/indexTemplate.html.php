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
<?php //$usu = usuarioTableClass::USER                   ?>
<?php //$id = usuarioTableClass::ID                   ?>
<?php view::includePartial('default/menuPrincipal') ?>
<?php //view::includePartial('default/notificaciones')       ?>
<script type="text/javascript">
<?php $conteo = count($objBitacora) ?>

   // var i = 1;
    //for (i = 1; i <= 100; i++) {

        function generate(container, type) {

            var n = $(container).noty({
                text: type,
                type: 'information',
                dismissQueue: true,
                layout: 'topCenter',
                theme: 'defaultTheme',
                maxVisible: <?php echo ($conteo <= 3 ? $conteo : 3) ?>,
                timeout: 4000,
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
   // }


</script>

<script>

    
$(function() {
    $('input[type="radio"]').click(function() {
        if($(this).attr('id') == 'inlineRadio1' || $(this).attr('id') == 'inlineRadio2'  || $(this).attr('id') == 'inlineRadio3' ||  $(this).attr('id') == 'inlineRadio4' ) {
           
            $('#search').val('');
            $('#search').focus();
        }
    });
});
  
  
  
  
  
  
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

    <?php if (session::getInstance()->hasAttribute('clienteIndexFilterDefault')): ?>
        <div style="margin-bottom: 2px; margin-top: 10px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteFilters') ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-filter"></i>Borrar Filtros</a>
        </div>
    <?php endif; ?>

    <div class="busqueda">
        <div class="row">
            <div class="col-md-8" style="margin: 0 auto; float:none;">
                <center><h3>Búsqueda</h3></center>
                <form class="form-horizontal" id="filterFormUser" name="filterFormUser" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>">
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input autocomplete="Off" type="text" class="form-control" name="filter[cliente]" id="search" placeholder="Busqueda..." onkeyup="myFunction()" required autofocus >
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                    <div class="col-md-12" style="text-align: center; margin-bottom: 3%;">
                        <div class="checkbox checkbox-info checkbox-circle checkbox-inline">
                            <input type="radio" id="inlineRadio1" value="nit" name="radioInline" checked>
                            <label for="inlineRadio1"><strong>Nit</strong></label>
                        </div>
                        <div class="checkbox checkbox-info checkbox-circle checkbox-inline">
                            <input type="radio" id="inlineRadio2" value="razon" name="radioInline">
                            <label for="inlineRadio2"><strong>Razón Social</strong></label>
                        </div>
                        <div class="checkbox checkbox-info checkbox-circle checkbox-inline">
                            <input type="radio" id="inlineRadio3" value="clte_codigo" name="radioInline">
                            <label for="inlineRadio3"><strong>Código del plan</strong></label>
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

    <table class="table table-bordered table-responsive">
        <thead>
            <tr class="info">
                <th style="color: white; font-weight: bold;">Codigo Cliente</th>
                <th style="color: white;">Nombre</th>
                <th style="color: white;">Convenio</th>
                <th style="color: white;">NIT</th>
                <th style="color: white;">Razón social</th>
                <th style="color: white;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($objConvenios)): ?>
                <?php foreach ($objConvenios as $convenio): ?>
                    <tr>
                        <td><?php echo $convenio->clte_codigo ?></td>
                        <td><?php echo $convenio->nombre ?></td>
                        <td><?php echo $convenio->clte_cod_ppal ?></td>
                        <td><?php echo $convenio->nit ?></td>
                        <td><?php echo $convenio->razon ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'listar', array(clienteTableClass::CLIENTE_CODIGO => $convenio->clte_codigo)) ?>" class="btn btn-success btn-xs">Ver</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php if (empty($objConvenios)  && session::getInstance()->hasAttribute('clienteIndexFilterDefault')): ?>
  
  <?php echo "No hay resultados en esta busqueda";?> 
  
 <?php endif;?> 
  
    <div class="text-right">
        <?php echo i18n::__('page') ?> <select id="sqlPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>')">
            <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                <option <?php echo (isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
            <?php endfor ?>
        </select> 
        <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
    </div>

</div>