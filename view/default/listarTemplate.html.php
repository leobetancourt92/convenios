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


	<?php if (isset($objListar) == true): ?>
	<input name="<?php echo clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true) ?>" value="<?php echo $objListar[0]->$id ?>" type="hidden">
	<?php endif ?>

	<div class="container">

		<div style="margin-bottom: 10px;">
			<a href="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>" class="btn btn-success btn-xs">INICIO</a>
		</div>

            <div id="container-main">

                <div class="accordion-container">
                    <p href="#" class="accordion-titulo">Informacion Cliente<span class="toggle-icon"></span></p>
                    <div class="accordion-content" id="cliente">
                        
                        <div class="col-md-6" id="columna1">

                            <div class="form-group">
                                <label>NIT</label>
                                <p><?php echo ((isset($objListar) == true) ? $objListar[0]->$nit : '') ?>"<p/>
                            </div>

                            <div class="form-group">
                                <label>Razón Social</label>
                                <p><?php echo ((isset($objListar) == true) ? $objListar[0]->$razon : '') ?>"<p/>
                            </div>

                            <div class="form-group">
                                <label>Código del plan</label>
                                <p><?php echo ((isset($objListar) == true) ? $objListar[0]->$codigo_plan : '') ?>"<p/>
                            </div>

                        </div>
                        
                        <div class="col-md-6" id="columna2">

                            <div class="form-group">
                                <label>Sedes de atencion</label>
                                <p>vacio</p>
                            </div>

                            <div class="form-group">
                                <label>Orden médica</label>
                                <p>vacio</p>
                            </div>
                            
                            <div class="form-group">
                                <label>Nombre del Plan</label>
                                <p><?php echo ((isset($objListar) == true) ? $objListar[0]->$nombre_plan : '') ?>"<p/>
                            </div>

                        </div>
                        
                        <div class="col-md-12" id="columna3">
                            
                            <div class="form-group">
                                <label>Autorización</label>
                                <div class="images">
                                    <a href="../../web/img/carnet4.jpg" data-smoothzoom="group1"><img src="../../web/img/carnet4.jpg" alt="" width="50" height="50"></a>
                                    <a href="../../web/img/carnet5.jpg" data-smoothzoom="group1"><img src="../../web/img/carnet5.jpg" alt="" width="50" height="50"></a>
                                    <a href="../../web/img/carnet6.jpg" data-smoothzoom="group1"><img src="../../web/img/carnet6.jpg" alt="" width="50" height="50"></a>
                                    <a href="../../web/img/auto.jpg" data-smoothzoom="group1"><img src="../../web/img/auto.jpg" alt="" width="50" height="50" /></a>
                                    <a href="../../web/img/auto2.jpg" data-smoothzoom="group1"><img src="../../web/img/auto2.jpg" alt="" width="50" height="50"></a>
                                </div>
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
                                <p>vacio</p>
                            </div>

                            <div class="form-group">
                                <label>Médico Adscrito</label>
                                <p>vacio</p>
                            </div>

                            <div class="form-group">
                                <label>Copago</label>
                                <p>vacio</p>
                            </div>

                        </div>
                        
                        <div class="col-md-6" id="columna2">

                            <div class=" hero-unit form-group">
                                <label>Firma del paciente</label>
                                <p>vacio</p>
                            </div>

                            <div class="form-group">
                                <label>Copia de resultados</label>
                                <p>vacio</p>
                            </div>

                            <div class="form-group">
                                <label>Formato No POS</label>
                                <p>vacio</p>
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
                                <p>vacio</p>
                            </div>

                            <div class="form-group">
                                <label for="observaciones">Observaciones:</label>
                                <p>vacio</p>
                            </div>
                       
                        </div>
                    </div>
                </div>
                
            </div>
</form>

</div>

<script>     
    
    $(document).ready(function(){
           
           $("#cliente").slideDown();
           
        });
        
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
    
    $(window).load( function() {
            $('img').smoothZoom({
            	// Options go here
                zoominSpeed: 10,
                zoomoutSpeed: 10,
                zoominEasing: 'easeOutExpo',
                zoomoutEasing: 'easeOutExpo',
                navigationButtons: 'true',
                closeButton: 'true',
                showCaption:'true'
            });
        });
        
        $('img').hover(function() {
                $('img').not(this).css('opacity','.6');
            }, function() {
		    $('img').not(this).css('opacity','1');
		});
</script> 