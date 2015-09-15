<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php //$usu = usuarioTableClass::USER             ?>
<?php //$id = usuarioTableClass::ID             ?>
<?php view::includePartial('default/menuPrincipal') ?>
<?php view::includePartial('default/notificaciones') ?>

<div class="container container-fluid">
    
    <div style="width: 100%;  height: 150px;">
        <div id="customContainer" style="width: 100%; border: 1px solid #ccc; padding: 5px">
            <center><p><strong>Notifiaciones</strong></p></center>
        </div>
    </div>    

     <div style="margin-bottom: 2px; margin-top: 10px">
        <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteFilters') ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-filter"></i>Borrar Filtros</a>
     </div>

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
   
        <div class="busqueda">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <center><h4>Busqueda</h4></center>
                    <form class="form-horizontal" id="filterFormUser" name="filterFormUser" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>">
                        <div class="form-group has-feedback">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" name="filter[cliente]" id="search" placeholder="Busqueda..." required autofocus>
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            
                        </div>

                        <div class='frame'style="margin-left: 33%; margin-bottom: 3%;">
                            <input checked='checked' id='radio1' name='radio' type='radio' value="1" >
                            <label  class='radio' for='radio1'><i class="fa fa-times"></i></label>


                            <input id='radio2' name='radio' type='radio' value="2" >
                            <label class='radio' for='radio2'><i class="fa fa-times"></i></label>


                            <input id='radio3' name='radio' type='radio' value="3" >
                            <label class='radio' for='radio3'><i class="fa fa-times"></i></label>


                            <input id='radio4' name='radio' type='radio' value="4" >
                            <label class='radio' for='radio4'><i class="fa fa-times"></i></label>

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
                
                <?php if (isset($objConvenios)): ?>
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
                    <?php endif;?>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('default', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php //echo usuarioTableClass::getNameField(usuarioTableClass::ID, true)             ?>">
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