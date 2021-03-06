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
<?php $sedes = clienteTableClass::SEDES_ATENCION ?>
<?php $observaciones = condicionesTableClass::OBSERVACIONES ?>
<?php $copago = clienteTableClass::COPAGO ?>
<?php $carnet = clienteTableClass::BOOL_CARNET ?>
<?php //$autorizacion = clienteTableClass::CONTROL_AUTORIZACION            ?>
<?php view::includePartial('default/menuPrincipal') ?>



<style>
    .prev_container{
        width: 150px;
        /*	height: 135px;*/
    }

    .prev_thumb{
        margin: 10px;
        height: 100px;
    }
    .col-md-2{
        border-style: dashed;  
    }
</style>

<?php //var_dump($objListar[0]->d) ?>

<div class="container">
    <form action="<?php echo routing::getInstance()->getUrlWeb('admin', 'update') ?>"  enctype="multipart/form-data" method="POST">


        <input name="cliente" value="<?php echo $objListar[0]->codigo ?>" type="hidden">
        <input name="condicion" value="<?php echo $objListar[0]->c ?>" type="hidden">


        <div style="margin-bottom: 10px;">
            <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>" class="btn btn-success btn-xs">INICIO</a>
        </div>
        <div id="container-main">

            <div class="accordion-container">
                <p href="#" class="accordion-titulo">Información Cliente<span class="toggle-icon"></span></p>
                <div class="accordion-content" id="cliente">

                    <div class="col-md-6" id="columna1">

                        <div class="form-group">
                            <label>NIT</label>
                            <input type="text" class="form-control" name="" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$nit : '') ?>" readonly/>
                        </div>

                        <div class="form-group">
                            <label>Razón Social</label>
                            <input type="text" class="form-control" name="" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$razon : '') ?>" readonly/>
                        </div>

                        <div class="form-group">
                            <label>Código del plan</label>
                            <input id="selectbasic"  class="form-control" name="" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$id : '') ?>"  readonly/>

                        </div>

                        <div class="form-group">
                            <label>Telefono autorización</label>
                            <input type="text" class="form-control" name="tel_auto"   value="<?php echo (isset($objListar) == true) ? $objListar[0]->tel_autorizacion . "  " : '' ?>" />
                        </div>

                        <div class="form-group">
                            <label>Autorización  Impresa</label>
                            <select class="form-control" id="" name="imp" required>
                                <option value=""><?php echo ((isset($objListar) == true) ? '' : 'Autorización  Impresa') ?></option>
                                <option value="TRUE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->autorizacion_impresa == TRUE ? "selected" : '' ) : '') ?>>SI</option>
                                <option value="FALSE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->autorizacion_impresa == FALSE ? "selected" : '' ) : '') ?>  >NO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Credenciales-servidor</label>
                            <div class="images">        

                                <?php foreach ($objListar as $value): ?>
                                    <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagenuno) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagenuno) ?>" alt="" width="50" height="50"></a>
                                    <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagendos) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagendos) ?>" alt="" width="50" height="50"></a>
                                    <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagentres) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagentres) ?>" alt="" width="50" height="50"></a>
                                    <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagencuatro) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagencuatro) ?>" alt="" width="50" height="50" /></a>
                                    <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagencinco) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagencinco) ?>" alt="" width="50" height="50"></a>
                                <?php endforeach; ?>
                            </div>

                       </div>
                       
                        <div class="form-group">
                            <label>Eliminación de Credenciales (Servidor)</label>
                            <div class="form-control">
                                Imagen 1 <input type="checkbox" name="eliminacion[]" id="" value="1"/>
                                Imagen 2 <input type="checkbox" name="eliminacion[]" id="" value="2" />
                                Imagen 3 <input type="checkbox" name="eliminacion[]" id="" value="3"/>
                                Imagen 4 <input type="checkbox" name="eliminacion[]" id="" value="4" />
                                Imagen 5 <input type="checkbox" name="eliminacion[]" id="" value="5"/>
                            </div>
                        </div>
                        
                        


                    </div>




                    <div class="col-md-6" id="columna2">

                        <div class="form-group">
                            <label>Sedes de atención</label>
                            <input type="text" class="form-control" name="sede"   value="<?php echo ((isset($objListar) == true) ? $objListar[0]->sedes_atencion : '') ?>" />
                        </div>

                        <div class="form-group">
                            <label>Orden médica y/o carnet</label>
                            <select class="form-control" id="" name="orden" required>
                                <option value=""><?php echo ((isset($objListar) == true) ? '' : 'Orden médica y/o carnet') ?></option>
                                <option value="TRUE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->orden_medica == TRUE ? "selected" : '' ) : '') ?>>SI</option>
                                <option value="FALSE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->orden_medica == FALSE ? "selected" : '' ) : '') ?>  >NO</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Nombre del Plan</label>
                            <input type="text" class="form-control" name="" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$nombre_plan : '') ?>" readonly/>
                        </div>


                        <div class="form-group">
                            <label>Autorización  Web</label>
                            <input type="text" class="form-control" name="web_auto"   value="<?php echo (isset($objListar) == true) ? $objListar[0]->web_autorizacion . "  " : '' ?>" />
                        </div>





                        <div class="form-group">
                            <label>Unidad de Negocio</label>                       
                            <select class="form-control" id="" name="id_negocio" required>
                                <option value="<?php echo $objListar[0]->id_unidad_negocio ?>" <?php echo ((isset($objListar) == true) ? 'selected' : '') ?>><?php echo $objListar[0]->nombre_unidad ?></option>
                                <?php foreach ($ObjUnidad as $dato): ?> 
                                    <option value="<?php echo $dato->id_unidad_negocio ?>"><?php echo ($dato->nombre_unidad == $objListar[0]->nombre_unidad ? '' : $dato->nombre_unidad) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>






                        <div class="form-group">
                            <label>Fecha de vencimiento</label>                       
                            <input type="date" class="form-control" name="fecha_ven" required/>
                        </div>

                    </div>

                    <div class="col-md-12" id="columna3">

                        <div class="col-md-2" style="width:190px;height: 150px;">
                            <label>Imagen 1</label>   
                            <input class="file" id="file1" type='file' name="clientes_foto" title="test #1"/>
                            <div id="prev_file1"></div><br/>
                        </div>

                        <div class="col-md-2" style="width:190px; margin-left: 11px;height: 150px;">
                            <label>Imagen 2</label>       
                            <input class="file" id="file2" type='file' name="imagenClienteDos" title="test #2"/>
                            <div id="prev_file2"></div>
                        </div>     

                        <div class="col-md-2" style="width:190px; margin-left: 11px;height: 150px;">
                            <label>Imagen 3</label>   
                            <input class="file" id="file3" type='file' name="imagenClienteTres" title="test #3"/>
                            <div id="prev_file3"></div>
                        </div> 

                        <div class="col-md-2" style="width:190px; margin-left: 11px;height: 150px;" >
                            <label>Imagen 4</label>   
                            <input class="file" id="file4" type='file' name="imagenClienteCuatro" title="test #4"/>
                            <div id="prev_file4"></div>
                        </div> 

                        <div class="col-md-2" style="width:190px; margin-left: 11px;height: 150px;">
                            <label>Imagen 5</label>   
                            <input class="file" id="file5" type='file'  name="imagenClienteCinco"  title="test #5"/>
                            <div id="prev_file5"></div>
                        </div> 

                    </div>

                    
                </div>

                <div class="accordion-container">
                    <p href="#" class="accordion-titulo">Informacion Plan<span class="toggle-icon"></span></p>
                    <div class="accordion-content">

                        <div class="col-md-6" id="columna1">

                            <div class="form-group">
                                <label>Historia clinica</label>
                                <select class="form-control" id="" name="hist_clinica" required>
                                    <option value=""><?php echo ((isset($objListar) == true) ? '' : 'Historia clinica') ?></option>
                                    <option value="TRUE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->historia_clinica == TRUE ? "selected" : '' ) : '') ?>>SI</option>
                                    <option value="FALSE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->historia_clinica == FALSE ? "selected" : '' ) : '') ?>  >NO</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Medico Adscrito</label>                       
                                <select class="form-control" id="" name="medicoads" required>
                                    <option value=""><?php echo ((isset($objListar) == true) ? '' : 'Medico Adscrito') ?></option>
                                    <option value="TRUE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->medico_adscrito == TRUE ? "selected" : '' ) : '') ?>>SI</option>
                                    <option value="FALSE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->medico_adscrito == FALSE ? "selected" : '' ) : '') ?> >NO</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Copago</label>
                                <textarea class="form-control" name="copago"><?php echo ((isset($objListar) == true) ? $objListar[0]->$copago : '') ?></textarea>
                            </div>

                        </div>

                        <div class="col-md-6" id="columna2"> 
                            <div class=" hero-unit form-group">
                                <label>Firma del paciente</label>
                                <select class="form-control" id="" name="firma" required>
                                    <option value=""><?php echo ((isset($objListar) == true) ? '' : 'Firma del paciente') ?></option>
                                    <option value="TRUE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->firma_paciente == TRUE ? "selected" : '' ) : '') ?>>SI</option>
                                    <option value="FALSE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->firma_paciente == FALSE ? "selected" : '' ) : '') ?>  >NO</option> 
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Copia de resultados</label>
                                <select class="form-control" id="" name="copia_res" required>
                                    <option value=""><?php echo ((isset($objListar) == true) ? '' : 'Copia de resultados') ?></option>
                                    <option value="TRUE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->copia_resultado == TRUE ? "selected" : '' ) : '') ?>>SI</option>
                                    <option value="FALSE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->copia_resultado == FALSE ? "selected" : '' ) : '') ?>  >NO</option>    
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Formato No POS</label>
                                <select class="form-control" id="" name="no_pos" required>
                                    <option value=""><?php echo ((isset($objListar) == true) ? '' : 'Formato no POS') ?></option>
                                    <option value="TRUE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->formato_nopos == TRUE ? "selected" : '' ) : '') ?>>SI</option>
                                    <option value="FALSE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->formato_nopos == FALSE ? "selected" : '' ) : '') ?>  >NO</option>    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-container">
                    <p href="#" class="accordion-titulo">Información Adicional<span class="toggle-icon"></span></p>
                    <div class="accordion-content">

                        <div class="col-md-12" id="columna1">

                            <div class="form-group">
                                <label for="observaciones">Observaciones:</label>
                                <textarea id="observ" name="observaciones" class="form-control" rows="5"><?php echo ((isset($objListar) == true) ? $objListar[0]->$observaciones : '') ?></textarea>
                            </div>

                            <div class="form-group">
                                <center>
                                    <button class="btn btn-lg btn-success btn-signin" style="width: 200px;" type="submit" id="registrar">Registrar</button></center>
                                <input type="hidden" name="hidden" value="1">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>

<script>

    $(document).ready(function () {

        $('.file').preimage();
        $("#cliente").slideDown();

    });

    $("#observ").click(function () {

        $("#observ").cleditor();

    });

    $(".accordion-titulo").click(function () {

        var contenido = $(this).next(".accordion-content");

        if (contenido.css("display") == "none") { //open
            contenido.slideDown(250);
            $(this).addClass("open");
        } else { //close
            contenido.slideUp(250);
            $(this).removeClass("open");
        }
    });

    $(window).load(function () {
        $('img').smoothZoom({
            // Options go here
            zoominSpeed: 10,
            zoomoutSpeed: 10,
            zoominEasing: 'easeOutExpo',
            zoomoutEasing: 'easeOutExpo',
            navigationButtons: 'true',
            closeButton: 'true',
            showCaption: 'true'
        });
    });

    $('img').hover(function () {
        $('img').not(this).css('opacity', '.6');
    }, function () {
        $('img').not(this).css('opacity', '1');
    });
</script>