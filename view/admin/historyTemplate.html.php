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

<?php $cliente_codigo = condicionesOldTableClass::CODIGO_CLIENTE ?>
<?php $fecha = condicionesOldTableClass::FECHA ?>
<?php $usuario_id = condicionesOldTableClass::USUARIO_ID ?>

<div class="container container-fluid">



    <h2 style="text-align: center;">Administración de convenios (Historico de el convenio <?php echo $objHistory[0]->clte_codigo.')' ?></h2>
    <div class="page-header">
        <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>"  class="btn btn-info" data-toggle="popover" title="Inicio" data-content="Index" ><i class="glyphicon glyphicon-home"></i></a> 
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalFilters" title="filtro" data-content="Ver filtro"><i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-filter"></i></button>
        <?php if (session::getInstance()->hasAttribute('historyFilter')): ?>
        <button><a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'deleteFiltersHistory') ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-filter"></i>Borrar Filtros</a></button>
        <?php endif; ?>


    </div>

    <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Filtro</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" id="filterFormHistory" name="filterFormBit" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('admin', 'historico') ?>">
                        <div class="form-group">




                            <div class="col-sm-10">
                                <label class="col-sm-2 control-label">Fecha inicial</label>
                                <input type="date" class="form-control" id="filterFecha1" name="filter[Fecha1]">
                            </div>
                            <div class="col-sm-10">
                                <label class="col-sm-2 control-label">Fecha final</label>
                                <input type="date" class="form-control" id="filterFecha2" name="filter[Fecha2]">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                    <button type="button" onclick="$('#filterFormHistory').submit()" class="btn btn-primary">filtrar</button>
                </div>
            </div>
        </div>
    </div>

    <?php view::includeHandlerMessage() ?>


    <div class="busqueda">
        <div class="row">
            <div class="col-md-8" style="margin: 0 auto; float:none;">
                <form class="form-horizontal" id="filterFormUser" name="filterFormUser" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>">


                    <div class="col-md-12" style="text-align: center; margin-bottom: 3%;">

                        <!--                        <div class="checkbox checkbox-info checkbox-circle checkbox-inline">
                                                    <input type="radio" id="inlineRadio5" value="option5" name="radioInline">
                                                    <label for="inlineRadio5"><strong>Historico</strong></label>
                                                </div>-->


                        <script>



//    $(document).ready(function () {
//    $("#submit").click(function () {                
//        if ($('input[type="radio"]:checked').length == "0") {
//            alert("Select any value");
//        } else {
//            $.ajax({
//                type: "POST",
//                url: "./controller/admin/indexActionClass.php",
//                data: $("#myform").serialize(),
//                success: function () {
//                    $("#msg").addClass('bg');
//                    $("#msg").html("value Entered");
//                }
//            });
//        }
//        return false;
//    });
//});                            



//                            $(document).ready(function () {
//                                $("input[id^=radio]").change(function () {
//                                    var data = $("#filterFormUser").serialize();
//                                    $.post("./controller/admin/indexActionClass.php", data, function (response) {
//                                        $("#search").html(response);
//                                    });
//                                });
//                            });
                        </script>

                        <script type="text/javascript">

                            $(function () {
                                var autocompletar = new Array();



<?php foreach ($objNit as $valor) : ?>
                                    autocompletar.push('<?php echo $valor->nit ?>');
<?php endforeach; ?>







                                $("#search").autocomplete({//Usamos el ID de la caja de texto donde lo queremos
                                    source: autocompletar //Le decimos que nuestra fuente es el arregl
                                });
                            });

                        </script>




                        <?php // var_dump($objConveniosAdministrator)?>       


                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr class="info">
                <th style="color: white;">Usuario ID</th>
                <th style="color: white;">Cliente codigo</th>
                <th style="color: white;">Fecha</th>

                <th style="color: white;">Acciones</th>
<!--                <th>c</th>-->
            </tr>
        </thead>
        <tbody>

            <?php if (isset($objHistory)): ?>

                <?php foreach ($objHistory as $convenio): ?>
                    <tr>
                        <td><?php echo $convenio->$usuario_id ?></td>
                        <td><?php echo $convenio->$cliente_codigo ?></td>
                        <td><?php echo $convenio->$fecha ?></td>

                <!--                        <td><?php //echo $convenio->c   ?></td>-->

                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('admin','listarHistorico',array(condicionesOldTableClass::CODIGO_CLIENTE => $convenio->clte_codigo,condicionesOldTableClass::FECHA => $convenio->fecha))?>" class="btn btn-success btn-xs" >Ver cambios</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif; ?>


        </tbody>
    </table>

    <div class="text-right">
        pagina <select id="sqlPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('admin', 'historico') ?>')">
            <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                <option <?php echo (isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
            <?php endfor ?>
        </select> 
        <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
    </div>

</div>









