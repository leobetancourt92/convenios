<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * 
 * clase que gestiona el update de un convenio 
 * 
 * 
 * 
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class updateVersionActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        /*
         * 
         * atributos tipo texto que van a la tabla condiciones en el esquema convenios
         * 
         * 
         */
        $id = request::getInstance()->getPost('codigo_cliente');
        //$file = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::IMAGENES, true));
        //$observacion = request::getInstance()->getPost('observaciones');
        $id_negocio = request::getInstance()->getPost('id_negocio');
        $firma = request::getInstance()->getPost('firma');
        $copia_resultado = request::getInstance()->getPost('copia_res');
        $formato_no_pos = request::getInstance()->getPost('no_pos');
        $historia_clinica = request::getInstance()->getPost('hist_clinica');
        $copago = request::getInstance()->getPost('copago');
        $orden = request::getInstance()->getPost('orden');
        $sedes = request::getInstance()->getPost('sede');
        $imagen1 = request::getInstance()->getPost('imagen1');
        $imagen2 = request::getInstance()->getPost('imagen2');
        $imagen3 = request::getInstance()->getPost('imagen3');
        $imagen4 = request::getInstance()->getPost('imagen4');
        $imagen5 = request::getInstance()->getPost('imagen5');
        $fecha = request::getInstance()->getPost('fecha');
        $web_auto=request::getInstance()->getPost('web_auto');
        $auto_imp=request::getInstance()->getPost('imp'); 
        $auto_tel=request::getInstance()->getPost('tel_auto'); 
        
        $data = array(
            condicionesTableClass::IMAGEN_UNO => $imagen1,
            condicionesTableClass::IMAGEN_DOS => $imagen2,
            condicionesTableClass::IMAGEN_TRES => $imagen3,
            condicionesTableClass::IMAGEN_CUATRO => $imagen4,
            condicionesTableClass::IMAGEN_CINCO => $imagen5,
            condicionesTableClass::ID_UNIDAD_NEGOCIO => $id_negocio,
            condicionesTableClass::FIRMA_PACIENTE => $firma,
            condicionesTableClass::COPIA_RESULTADO => $copia_resultado,
            condicionesTableClass::FORMATO_NO_POS => $formato_no_pos,
            condicionesTableClass::HISTORIA_CLINICA => $historia_clinica,
            condicionesTableClass::OBSERVACIONES => $_SESSION['observacion'],
            condicionesTableClass::COPAGO => $copago,
            condicionesTableClass::ORDEN_MEDICA => $orden,
            condicionesTableClass::USUARIO_ID => session::getInstance()->getUserName(),
            condicionesTableClass::FECHA => date('Y-m-d H:i:s'),
            condicionesTableClass::SEDES_ATENCION => $sedes,
            condicionesTableClass::AUTORIZACION_IMPRESA=>$auto_imp,
            condicionesTableClass::WEB_AUTORIZACION=>$web_auto,
            condicionesTableClass::TELEFONO_AUTORIZACION => $auto_tel       
                );

        $ids = array(
            condicionesTableClass::CODIGO_CLIENTE => $id
        );


        condicionesTableClass::update($ids, $data);


        $_SESSION['fecha'] = $fecha;



        session::getInstance()->setSuccess('Convenio ' . $id . ' actualizado satisfactoriamente a la versión: ' . $_SESSION['fecha']);
      }

      routing::getInstance()->redirect('admin', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
