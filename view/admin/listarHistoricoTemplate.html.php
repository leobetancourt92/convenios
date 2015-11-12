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
<?php $observaciones = condicionesTableClass::OBSERVACIONES ?>
<?php $sedes = clienteTableClass::SEDES_ATENCION ?>
<?php //$carnet = clienteTableClass::BOOL_CARNET        ?>
<?php $historia = condicionesTableClass::HISTORIA_CLINICA ?>
<?php $firma = condicionesTableClass::FIRMA_PACIENTE ?>
<?php $copia_res = condicionesTableClass::COPIA_RESULTADO ?>
<?php $format_nopos = condicionesTableClass::FORMATO_NO_POS ?>
<?php $unidad_negocio = negocioTableClass::NOMBRE_UNIDAD ?>
<?php $copago = condicionesTableClass::COPAGO ?>
<?php view::includePartial('default/menuPrincipal') ?>

<div class="container">

  <div style="margin-bottom: 10px;">
    <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>" class="btn btn-success btn-xs">INICIO</a>
  </div>

  <h2 style="text-align: center;">Convenio número <?php echo $objListarHistorico[0]->clte_codigo . " Versión de " . $objListarHistorico[0]->fecha ?> </h2>

  <div id="container-main">
    <div class="accordion-container">
      <p href="#" class="accordion-titulo">Información Cliente<span class="toggle-icon"></span></p>
      <div class="accordion-content" id="cliente">
        <div class="col-md-6" id="columna1">

          <div class="form-group">
            <label>NIT</label>
            <p><?php echo ((isset($objListarHistorico) == true) ? $objListarHistorico[0]->$nit : '') ?><p/>
          </div>

          <div class="form-group">
            <label>Razón Social</label>
            <p><?php echo ((isset($objListarHistorico) == true) ? $objListarHistorico[0]->$razon : '') ?><p/>
          </div>

          <div class="form-group">
            <label>Código del plan</label>
            <p><?php echo ((isset($objListarHistorico) == true) ? $objListarHistorico[0]->$codigo_plan : '') ?><p/>
          </div>

        </div>

        <div class="col-md-6" id="columna2">

          <div class="form-group">
            <label>Sedes de atencion</label>
            <p><?php echo ((isset($objListarHistorico) == true) ? $objListarHistorico[0]->sedes_atencion : '') ?></p>
          </div>

          <div class="form-group">
            <label>Orden medica y/o Carnet</label>
            <p><?php echo ((isset($objListarHistorico) == true) ? ($objListarHistorico[0]->orden_medica == TRUE ? "SI" : "NO") : '') ?></p>
          </div>

          <div class="form-group">
            <label>Nombre del Plan</label>
            <p><?php echo ((isset($objListarHistorico) == true) ? $objListarHistorico[0]->$nombre_plan : '') ?>"<p/>
          </div>


          <div class="form-group">
            <label> Telefono Autorización</label>
            <p><?php echo $objListarHistorico[0]->tel_autorizacion . '  ' ?><p/>
          </div>

          <div class="form-group">
            <label> Web Autorización</label>
            <p><?php echo $objListarHistorico[0]->web_autorizacion . '  ' ?><p/>
          </div>

          <div class="form-group">
            <label> Autorización impresa</label>
            <p><?php echo ((isset($objListarHsitorico) == true) ? ($objListar[0]->autorizacion_impresa == TRUE ? "SI" : "NO") : '') ?></p>
          </div>

        </div>


        <div class="col-md-12" id="columna3">
          <div class="form-group">
            <label>Credenciales</label>
            <div class="images">
              <?php foreach ($objListarHistorico as $value): ?>
                <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagenuno) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagenuno) ?>" alt="" width="50" height="50"></a>
                <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagendos) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagendos) ?>" alt="" width="50" height="50"></a>
                <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagentres) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagentres) ?>" alt="" width="50" height="50"></a>
                <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagencuatro) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagencuatro) ?>" alt="" width="50" height="50" /></a>
                <a href="<?php echo routing::getInstance()->getUrlUploads($value->imagencinco) ?>" data-smoothzoom="group1"><img src="<?php echo routing::getInstance()->getUrlUploads($value->imagencinco) ?>" alt="" width="50" height="50"></a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>

  <div class="accordion-container">
    <p href="#" class="accordion-titulo">Información Plan<span class="toggle-icon"></span></p>
    <div class="accordion-content">

      <div class="col-md-6" id="columna1">

        <div class="form-group">
          <label>Historia clinica</label>
          <p><?php echo ((isset($objListarHistorico) == true) ? ($objListarHistorico[0]->orden_medica == TRUE ? "SI" : "NO") : '') ?></p>
        </div>

        <div class="form-group">
          <label>Médico Adscrito</label>
          <p><?php echo ((empty($objMedico) == true) ? "NO" : "SI") ?></p>
        </div>

        <div class="form-group">
          <label>Copago</label>
          </p><?php echo ((isset($objListarHistorico) == true) ? $objListarHistorico[0]->$copago : '') ?></p>
        </div>

      </div>

      <div class="col-md-6" id="columna2">

        <div class=" hero-unit form-group">
          <label>Firma del paciente</label>
          <p><?php echo ((isset($objListarHistorico) == true) ? ($objListarHistorico[0]->$firma == TRUE ? "SI" : "NO") : '') ?></p>
        </div>

        <div class="form-group">
          <label>Copia de resultados</label>
          <p><?php echo ((isset($objListarHistorico) == true) ? ($objListarHistorico[0]->$copia_res == TRUE ? "SI" : "NO") : '') ?></p>
        </div>

        <div class="form-group">
          <label>Formato No POS</label>
          <p><?php echo ((isset($objListarHistorico) == true) ? ($objListarHistorico[0]->$format_nopos == TRUE ? "SI" : "NO") : '') ?></p>
        </div>

      </div>

    </div>
  </div>

  <div class="accordion-container">
    <p href="#" class="accordion-titulo">Información Adicional<span class="toggle-icon"></span></p>
    <div class="accordion-content">

      <div class="col-md-12" id="columna1">

        <div class="form-group">
          <label>Unidad de Negocio</label>
          <p><?php echo ((isset($objListarHistorico) == true) ? $objListarHistorico[0]->$unidad_negocio : '') ?></p>
        </div>

        <div class="form-group">
          <label for="observaciones">Observaciones:</label>
          <p><?php echo ((isset($objListarHistorico) == true) ? $objListarHistorico[0]->$observaciones : '') ?></p>
        </div>

        <div class="form-group">
          <center>
            <button  class="btn btn-lg btn-danger btn-signin" style="width: 200px;" data-toggle="modal" data-target="#myModalVersion" title="revertir" data-content="revertir cambios">Ir a esta versión</button>    
            <input type="hidden" name="hidden" value="1">
            </div>
            <div class="modal fade" id="myModalVersion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">¿Esta seguro de revertir los cambios a la versión de <?php echo $objListarHistorico[0]->fecha ?>?</h4>
                  </div>
                  <div class="modal-body">

                    <form class="form-horizontal" id="filterFormVersion" name="filterFormVersion" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('admin', 'updateVersion') ?>">

                      <?php if (isset($objListarHistorico) == true): ?>
                        <input name="codigo_cliente" value="<?php echo $objListarHistorico[0]->clte_codigo ?>" type="hidden"> 
                        <input name="imagen1" value="<?php echo $objListarHistorico[0]->imagenuno ?>" type="hidden">
                        <input name="imagen2" value="<?php echo $objListarHistorico[0]->imagendos ?>" type="hidden">
                        <input name="imagen3" value="<?php echo $objListarHistorico[0]->imagentres ?>" type="hidden">
                        <input name="imagen4" value="<?php echo $objListarHistorico[0]->imagencuatro ?>" type="hidden">
                        <input name="imagen5" value="<?php echo $objListarHistorico[0]->imagencinco ?>" type="hidden">
                        <input name="sede" value="<?php echo $objListarHistorico[0]->sedes_atencion ?>" type="hidden">
                        <input name="orden" value="<?php echo ($objListarHistorico[0]->orden_medica == 1 ? "TRUE" : "FALSE") ?>" type="hidden">
                        <input name="copago" value="<?php echo $objListarHistorico[0]->copago ?>" type="hidden">
                        <input name="hist_clinica" value="<?php echo ($objListarHistorico[0]->historia_clinica ? "TRUE" : "FALSE") ?>" type="hidden">

                        <?php $_SESSION['observacion'] = $objListarHistorico[0]->observacion ?>

                        <input name="firma" value="<?php echo ($objListarHistorico[0]->firma_paciente == 1 ? "TRUE" : "FALSE") ?>" type="hidden">
                        <input name="no_pos" value="<?php echo ($objListarHistorico[0]->formato_nopos == 1 ? "TRUE" : "FALSE" ) ?>" type="hidden">
                        <input name="copia_res" value="<?php echo ($objListarHistorico[0]->copia_resultado == 1 ? "TRUE" : "FALSE") ?>" type="hidden">
                        <input name="id_negocio" value="<?php echo $objListarHistorico[0]->id_unidad_negocio ?>" type="hidden">
                        <input name="fecha" value="<?php echo $objListarHistorico[0]->fecha ?>" type="hidden">  

                        <input name="tel_auto" value="<?php echo $objListarHistorico[0]->tel_autorizacion ?>" type="hidden">
                        <input name="web_auto" value="<?php echo $objListarHistorico[0]->web_autorizacion ?>" type="hidden">
                        <input name="imp" value="<?php echo ($objListarHistorico[0]->autorizacion_impresa == 1 ? "TRUE" : "FALSE") ?>" type="hidden">
                      <?php endif ?>  

                    </form>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="$('#filterFormVersion').submit()" class="btn btn-warning">Revertir</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>

<script>

  $(document).ready(function () {

    $("#cliente").slideDown();

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