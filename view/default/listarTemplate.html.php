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

	<div class="container" style="background-color: #aaa;">

		<div style="margin-bottom: 10px;">
			<a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'index') ?>" class="btn btn-success btn-xs">INICIO</a>
		</div>

            <div id="container-main">

                <div class="accordion-container">
                    <p href="#" class="accordion-titulo">Informacion Cliente<span class="toggle-icon"></span></p>
                    <div class="accordion-content">
                        
                        <div class="col-md-6" id="columna1">Columna 1

                            <div class="form-group">
                                <label>NIT</label>
                                <input type="text" class="form-control" name="ape1" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$nit : '') ?>"/>
                            </div>

                            <div class="form-group">
                                <label>Razón Social</label>
                                <input type="text" class="form-control" name="nit" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$razon : '') ?>" />
                            </div>

                            <div class="form-group">
                                <label>Código del plan</label>
                                <input id="selectbasic"  class="form-control" name="tipodcto_cod" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$codigo_plan : '') ?>"  />

                            </div>

                            <div class="form-group">
                                <label>Nombre del Plan</label>
                                <input type="text" class="form-control" name="nom1" value="<?php echo ((isset($objListar) == true) ? $objListar[0]->$nombre_plan : '') ?>" />
                            </div>

                        </div>
                        
                        <div class="col-md-6" id="columna2">Columna 2

                            <div class="form-group">
                                <label>Sedes de atencion</label>
                                <input type="text" class="form-control" name="ape1"/>
                            </div>

                            <div class="form-group">
                                <label>Orden médica</label>
                                <input type="text" class="form-control" name="direccion"/>
                            </div>

                            <div class="form-group">
                                <label>Autorización</label>
                                <select id="cod_enla1" name="cod_enla1" class="form-control">
                                    <option></option>
                                    <option value="ALTO RIESGO">ALTO RIESGO</option>
                                    <option value="URGENCIAS">URGENCIAS</option>
                                    <option value="CIRUGIA">CIRUGIA</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div>

                        </div>
                        
                    </div>
                </div>

                <div class="accordion-container">
                    <p href="#" class="accordion-titulo">Informacion Plan<span class="toggle-icon"></span></p>
                    <div class="accordion-content">
                        
                        <div class="col-md-6" id="columna1"> columna 1
                            
                            <div class="form-group">
                                <label>Historia clinica</label>
                                <input type="text" class="form-control" name="medico_cod"/>
                            </div>

                            <div class="form-group">
                                <label>Médico Adscrito</label>
                                <input type="text" class="form-control" name="medico"/>
                            </div>

                            <div class="form-group">
                                <label>Copago</label>
                                <input type="email" class="form-control" placeholder="correo del paciente" name="email"/>
                            </div>

                        </div>
                        
                        <div class="col-md-6" id="columna2"> columna 2

                            <div class=" hero-unit form-group">
                                <label>Firma del paciente</label>
                                <input type="text" class="form-control"  id="edad" name="edad">
                            </div>

                            <div class="form-group">
                                <label>Copia de resultados</label>
                                <input type="text" class="form-control" name="telefono"/>
                            </div>

                            <div class="form-group">
                                <label>Formato No POS</label>
                                <select id="selectbasic" name="sexo" class="form-control">
                                    <option></option>
                                    <option value="F">F</option>
                                    <option value="M">M</option>
                                </select>
                            </div>

                        </div>

                    </div>
                </div>
                
                <div class="accordion-container">
                    <p href="#" class="accordion-titulo">Informacion Adicional<span class="toggle-icon"></span></p>
                    <div class="accordion-content">

                        <div class="col-md-12" id="columna1">Columna1

                            <div class="form-group">
                                <label>Unidad de Negocio</label>
                                <input type="text" class="form-control" name="unidaddenegcio"/>
                            </div>

                            <div class="form-group">
                                <label for="observaciones">Observaciones:</label>
                                <textarea class="form-control" rows="5"  name="observaciones"></textarea>
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
    $(".accordion-titulo").click(function(){
        
        var contenido=$(this).next(".accordion-content");

        if(contenido.css("display")=="none"){ //open
                contenido.slideDown(250);
                $(this).addClass("open");
        }
        else{ //close
                contenido.slideUp(250);
                $(this).removeClass("open");
        }
    });
</script>