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
<?php //$autorizacion = clienteTableClass::CONTROL_AUTORIZACION    ?>
<?php view::includePartial('default/menuPrincipal') ?>
<div class="container">
    <form action="<?php echo routing::getInstance()->getUrlWeb('admin', 'update') ?>"  enctype="multipart/form-data" method="POST">

        <?php if (isset($objListar) == true): ?>
            <input name="<?php echo clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true) ?>" value="<?php echo $objListar[0]->$id ?>" type="hidden">
            <input name="condicion" value="<?php echo $objListar[0]->c ?>" type="hidden">
        <?php endif ?>

        <div style="margin-bottom: 10px;">
            <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>" class="btn btn-success btn-xs">INICIO</a>
        </div>
        <div id="container-main">

            <div class="accordion-container">
                <p href="#" class="accordion-titulo">Informacion Cliente<span class="toggle-icon"></span></p>
                <div class="accordion-content" id="cliente">

                    <div class="col-md-6" id="columna1">

                        <div class="form-group">
                            <label>NIT</label>
                            <input type="text" class="form-control" name="hola" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$nit : '') ?>" readonly/>
                        </div>

                        <div class="form-group">
                            <label>Razón Social</label>
                            <input type="text" class="form-control" name="" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$razon : '') ?>" readonly/>
                        </div>

                        <div class="form-group">
                            <label>Código del plan</label>
                            <input id="selectbasic"  class="form-control" name="" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$codigo_plan : '') ?>"  readonly/>

                        </div>

                        <div class="form-group">
                            <label>Autorización</label>
                            <input type="text" class="form-control" name=""   value="<?php echo (isset($objListar) == true) ? "Telefono: " . $objListar[0]->telefono . "  " : '' ?><?php echo (isset($objListar) == true) ? "E-MAIL/PAGINA WEB: " . $objListar[0]->email_web . "\n" : '' ?>" readonly/>
                        </div>
                    </div>

                    <div class="col-md-6" id="columna2">

                        <div class="form-group">
                            <label>Sedes de atencion</label>
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
                            <input type="date" class="form-control" name="fecha_ven" />
                        </div>
                        

                    </div>

                    <div class="col-md-12" id="columna3">

                        <div class="form-group">

                            <label>Imagenes</label>
                            <!--                            <div class="file-input">
                                                        <div class="file-preview">
                                                        <div class=" file-drop-zone">
                                                            <div class="file-preview-thumbnails">    
                            <?php foreach ($objListar as $value): ?>
                                                                    <img src="<?php echo routing::getInstance()->getUrlUploads($value->imagenuno) ?>"  class="file-preview-image" style="width: 160px; height: 160px">
                                                                    <img src="<?php echo routing::getInstance()->getUrlUploads($value->imagendos) ?>" >
                                                                    <img src="<?php echo routing::getInstance()->getUrlUploads($value->imagentres) ?>" >
                                                                    <img src="<?php echo routing::getInstance()->getUrlUploads($value->imagencuatro) ?>">
                                                                    <img src="<?php echo routing::getInstance()->getUrlUploads($value->imagencinco) ?>" >
                            <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        </div>-->
                            <!--<input id="archivos" name="imagenes[]" multiple="true" type="file" class="file-loading">-->

                            <input type="file" name="<?php echo clienteTableClass::getNameField(clienteTableClass::IMAGENES, true) ?>" />
                            <br>
                            <input type="file" name="imagenClienteDos" />
                            <br>
                            <input type="file" name="imagenClienteTres" /> 
                            <br>
                            <input type="file" name="imagenClienteCuatro" />
                            <br> 
                            <input type="file" name="imagenClienteCinco" /> 
                        </div>

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
                            <label>Médico Adscrito</label>
                            <input type="text" class="form-control" name="" value="<?php echo ((empty($objMedico) == true) ? "NO" : "SI") ?>" readonly/>
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
                                <option value="TRUE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->copia_resultado == TRUE ? "selected" : '' ) : '') ?>>SI</option>
                                <option value="FALSE" <?php echo ((isset($objListar) == true) ? ($objListar[0]->copia_resultado == FALSE ? "selected" : '' ) : '') ?>  >NO</option>    
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="accordion-container">
                <p href="#" class="accordion-titulo">Informacion Adicional<span class="toggle-icon"></span></p>
                <div class="accordion-content">

                    <div class="col-md-12" id="columna1">

                        <div class="form-group">
                            <label for="observaciones">Observaciones:</label>
                            <textarea id="observ" name="observaciones" class="form-control" rows="5"><?php echo ((isset($objListar) == true) ? $objListar[0]->$observaciones : '') ?>"</textarea>
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
<?php
$directorio = "upload/" . $objListar[0]->$id . "/";
$imagenes = glob($directorio . "*.*");
?>
<script>
    $('#archivos').fileinput({
    uploadUrl: "<?php echo routing::getInstance()->getUrlWeb('admin', 'update') ?>",
            uploadAsync: false,
            minFileCount: 1,
            maxFileCount: 5,
            showUpload: false,
            showRemove: false,
            initialPreview: [<?php foreach ($imagenes as $imagen) { ?>
                "<img src='../../web/<?php echo $imagen; ?>' height='150px'  widht='150px' class='file-preview-image'>",
<?php } ?>],
            initialPreviewConfig: [<?php
foreach ($imagenes as $imagen) {
    $infoImagenes = explode("/", $imagen);
    ?>
                { caption: "<?php echo $infoImagenes[1]; ?>", height: "150px", widht:"150px", url: "borrar.php", key:"<?php echo $infoImagenes[1]; ?>"},
<?php } ?>]
    });
            $(document).ready(function(){

    $("#cliente").slideDown();
    });
            $("#observ").click(function(){
    $("#observ").cleditor();
    });
            $(".accordion-titulo").click(function () {

    var contenido = $(this).next(".accordion-content");
            if (contenido.css("display") == "none") { //open
    contenido.slideDown(250);
            $(this).addClass("open");
    }
    else { //close
    contenido.slideUp(250);
            $(this).removeClass("open");
    }
    });
</script>
