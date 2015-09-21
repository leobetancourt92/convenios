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
<?php $observaciones = clienteTableClass::OBSERVACIONES ?>
<?php $copago = clienteTableClass::COPAGO ?>
<?php $carnet = clienteTableClass::BOOL_CARNET ?>
<?php //$autorizacion = clienteTableClass::CONTROL_AUTORIZACION ?>


<?php view::includePartial('default/menuPrincipal') ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('default', ((isset($objConvenios)) ? 'update' : 'create')) ?>">
    <?php if (isset($objListar) == true): ?>
        <input name="<?php echo clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true) ?>" value="<?php echo $objListar[0]->$id ?>" type="hidden">
    <?php endif ?>

    <div class="container">

        <div style="margin-bottom: 10px;">
            <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>" class="btn btn-success btn-xs">INICIO</a>
        </div>

        <div id="container-main">

            <div class="accordion-container">
                <p href="#" class="accordion-titulo">Informacion Cliente<span class="toggle-icon"></span></p>
                <div class="accordion-content">

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
                            <input id="selectbasic"  class="form-control" name="" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$codigo_plan : '') ?>"  readonly/>

                        </div>

                    </div>

                    <div class="col-md-6" id="columna2">

                        <div class="form-group">
                            <label>Sedes de atencion</label>
                            <input type="text" class="form-control" name=""   value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$sedes : '') ?>" readonly/>
                        </div>

                        <div class="form-group">
                            <label>Orden médica y/o carnet</label>
                            <input type="text" class="form-control" name=""   value="<?php echo ((isset($objListar) == true) ? ($objListar[0]->$carnet == false ? "NO" : "SI") : '') ?>" readonly/>
                        </div>

                        <div class="form-group">
                            <label>Nombre del Plan</label>
                            <input type="text" class="form-control" name="" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$nombre_plan : '') ?>" readonly/>
                        </div>

                    </div>
                    
                    <div class="col-md-12" id="columna3">
                                                
                        <div class="form-group">
                            <label>Autorización</label>
                            <p><?php echo (isset($objListar) == true) ? "Telefono: ".$objListar[0]->telefono."\n" : ''?></p><p><?php echo (isset($objListar) == true) ? "E-MAIL/PAGINA WEB: ".$objListar[0]->email_web."\n" : ''?></p>
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
                            <input type="text" class="form-control" name="medico_cod"/>
                        </div>

                        <div class="form-group">
                            <label>Médico Adscrito</label>

                          
                        
<!--                                <input type="text" class="form-control" name="medico" value="<?php //echo ((isset($objMedico) == true) ? $objMedico[0]->nombre : '') ?>"/>-->
                            
                        <input type="text" class="form-control" name="medico" value="<?php echo ((empty($objMedico) == true) ? "NO" : "SI") ?>" readonly/>
                        
                        </div>
                        
                               
                        <div class="form-group">
                            <label>Copago</label>
                            <input type="text" class="form-control" placeholder="correo del paciente" name="" value="<?php echo ((isset($objListar) == true) ?( $objListar[0]->$copago == 0 ? "NO" : "SI" ) : '') ?>" readonly/>
                        </div>

                    </div>

                    <div class="col-md-6" id="columna2"> 

                        <div class=" hero-unit form-group">
                            <label>Firma del paciente</label>
                            <input type="text" class="form-control"  id="edad" name="edad" value="<?php //echo ((isset($objListar) == true) ? $objListar[0]->$firma : '')  ?>">
                        </div>

                        <div class="form-group">
                            <label>Copia de resultados</label>
                            <input type="text" class="form-control" name="telefono"/>
                        </div>

                        <div class="form-group">
                            <label>Formato No POS</label>
                             <input type="text" class="form-control" name="npos"/>
                        </div>

                    </div>

                </div>
            </div>

            <div class="accordion-container">
                <p href="#" class="accordion-titulo">Informacion Adicional<span class="toggle-icon"></span></p>
                <div class="accordion-content">

                    <div class="col-md-12" id="columna1">

                        <div class="form-group">
                            <label>Unidad de Negocio</label>
                            <input type="text" class="form-control" name="unidaddenegcio"/>
                        </div>

                        <div class="form-group">
                            <label for="observaciones">Observaciones:</label>
                            <textarea class="form-control" rows="5"  name="" readonly><?php echo ((isset($objListar) == true) ? $objListar[0]->$observaciones : '') ?>"</textarea>
                        </div>

                        <div class="form-group">
                            <center>
                                <button class="btn btn-lg btn-success btn-signin" style="width: 200px;" type="submit" id="registrar" onclick="mandarDatos();">
                                    Registrar</button></center>
                            <input type="hidden" name="hidden" value="1">
                        </div>

                    </div>
                </div>
            </div>

        </div>
</form>

</div>

<script>
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