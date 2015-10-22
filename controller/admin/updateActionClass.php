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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {




        $condicion_update = request::getInstance()->getPost('condicion');



        $id = request::getInstance()->getPost('cliente');
        //$file = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::IMAGENES, true));
        //echo $id;
        //die();
        $observacion = request::getInstance()->getPost('observaciones');
        $id_negocio = request::getInstance()->getPost('id_negocio');
        $firma = request::getInstance()->getPost('firma');
        $copia_resultado = request::getInstance()->getPost('copia_res');
        $formato_no_pos = request::getInstance()->getPost('no_pos');
        $historia_clinica = request::getInstance()->getPost('hist_clinica');
        $copago = request::getInstance()->getPost('copago');
        $orden = request::getInstance()->getPost('orden');
        $sedes = request::getInstance()->getPost('sede');
        $fecha = request::getInstance()->getPost('fecha_ven');


        $ext = substr($_FILES['clientes_foto']['name'], -3, 3);
        $nameFile = date('YmdHis') . base64_encode($_FILES['clientes_foto']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext;


        $ext1 = substr($_FILES['imagenClienteDos']['name'], -3, 3);
        $nameFile1 = date('YmdHis') . base64_encode($_FILES['imagenClienteDos']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext1;

        $ext2 = substr($_FILES['imagenClienteTres']['name'], -3, 3);
        $nameFile2 = date('YmdHis') . base64_encode($_FILES['imagenClienteTres']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext2;


        $ext3 = substr($_FILES['imagenClienteCuatro']['name'], -3, 3);
        $nameFile3 = date('YmdHis') . base64_encode($_FILES['imagenClienteCuatro']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext3;


        $ext4 = substr($_FILES['imagenClienteCinco']['name'], -3, 3);
        $nameFile4 = date('YmdHis') . base64_encode($_FILES['imagenClienteCinco']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext4;





        /*
         * array con la  información a insertar en la base de datos
         */

        $data = array(
            condicionesTableClass::CODIGO_CLIENTE => $id,
            condicionesTableClass::IMAGEN_UNO => (empty($_FILES['clientes_foto']['name']) ? null : '/' . $id . '/' . $nameFile), //la ruta de las imagenes pasan a la base de datos con el  directorio (codigo del plan)
            condicionesTableClass::IMAGEN_DOS => (empty($_FILES['imagenClienteDos']['name']) ? null : '/' . $id . '/' . $nameFile1),
            condicionesTableClass::IMAGEN_TRES => (empty($_FILES['imagenClienteTres']['name']) ? null : '/' . $id . '/' . $nameFile2),
            condicionesTableClass::IMAGEN_CUATRO => (empty($_FILES['imagenClienteCuatro']['name']) ? null : '/' . $id . '/' . $nameFile3),
            condicionesTableClass::IMAGEN_CINCO => (empty($_FILES['imagenClienteCinco']['name']) ? null : '/' . $id . '/' . $nameFile4),
            condicionesTableClass::ID_UNIDAD_NEGOCIO => $id_negocio,
            condicionesTableClass::FIRMA_PACIENTE => $firma,
            condicionesTableClass::COPIA_RESULTADO => $copia_resultado,
            condicionesTableClass::FORMATO_NO_POS => $formato_no_pos,
            condicionesTableClass::HISTORIA_CLINICA => $historia_clinica,
            condicionesTableClass::OBSERVACIONES => $observacion,
            condicionesTableClass::COPAGO => $copago,
            condicionesTableClass::ORDEN_MEDICA => $orden,
            condicionesTableClass::USUARIO_ID => session::getInstance()->getUserName(),
            condicionesTableClass::FECHA => date('Y-m-d H:i:s'),
            condicionesTableClass::SEDES_ATENCION => $sedes,
            condicionesTableClass::FECHA_VENCIMIENTO => $fecha
        );



        //validaciones de la imagenes nulas


        if ($data['imagenuno'] == null) {

          unset($data['imagenuno']);
        } if ($data['imagendos'] == null) {

          unset($data['imagendos']);
        }
        if ($data['imagentres'] == null) {

          unset($data['imagentres']);
        }

        if ($data['imagencuatro'] == null) {

          unset($data['imagencuatro']);
        }
        if ($data['imagencinco'] == null) {

          unset($data['imagencinco']);
        }



        /*
         * insercion de los registros en la base de datos 
         */
        $ids = array(
            condicionesTableClass::CODIGO_CLIENTE => $id
        );
        $data1 = array(
            //condicionesTableClass::CODIGO_CLIENTE=>$id,
            condicionesTableClass::IMAGEN_UNO => (empty($_FILES['clientes_foto']['name']) ? null : '/' . $id . '/' . $nameFile), //la ruta de las imagenes pasan a la base de datos con el  directorio (codigo del plan)
            condicionesTableClass::IMAGEN_DOS => (empty($_FILES['imagenClienteDos']['name']) ? null : '/' . $id . '/' . $nameFile1),
            condicionesTableClass::IMAGEN_TRES => (empty($_FILES['imagenClienteTres']['name']) ? null : '/' . $id . '/' . $nameFile2),
            condicionesTableClass::IMAGEN_CUATRO => (empty($_FILES['imagenClienteCuatro']['name']) ? null : '/' . $id . '/' . $nameFile3),
            condicionesTableClass::IMAGEN_CINCO => (empty($_FILES['imagenClienteCinco']['name']) ? null : '/' . $id . '/' . $nameFile4),
            condicionesTableClass::ID_UNIDAD_NEGOCIO => $id_negocio,
            condicionesTableClass::FIRMA_PACIENTE => $firma,
            condicionesTableClass::COPIA_RESULTADO => $copia_resultado,
            condicionesTableClass::FORMATO_NO_POS => $formato_no_pos,
            condicionesTableClass::HISTORIA_CLINICA => $historia_clinica,
            condicionesTableClass::OBSERVACIONES => $observacion,
            condicionesTableClass::COPAGO => $copago,
            condicionesTableClass::ORDEN_MEDICA => $orden,
            condicionesTableClass::USUARIO_ID => session::getInstance()->getUserName(),
            condicionesTableClass::FECHA => date('Y-m-d H:i:s'),
            condicionesTableClass::SEDES_ATENCION => $sedes
        );



        //validaciones de la imagenes nulas en el update


        if ($data1['imagenuno'] == null) {

          unset($data1['imagenuno']);
        } if ($data1['imagendos'] == null) {

          unset($data1['imagendos']);
        }
        if ($data1['imagentres'] == null) {

          unset($data1['imagentres']);
        }

        if ($data1['imagencuatro'] == null) {

          unset($data1['imagencuatro']);
        }
        if ($data1['imagencinco'] == null) {

          unset($data1['imagencinco']);
        }


        if (empty($condicion_update)) {

          condicionesTableClass::insert($data);

          session::getInstance()->setSuccess('Se han creado las condiciones para el convenio número ' . $id);
        } else {


          condicionesTableClass::update($ids, $data1);
          session::getInstance()->setSuccess('Se han actualizado las condiciones para el convenio número ' . $id);
        }

        /*
         * la imagenes se dirigen al directorio siempre  y cuando no halla excepcion de base de  datos
         */

        
         if (is_dir('../web/upload/' . $id)) {

          move_uploaded_file($_FILES['clientes_foto']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile);
          move_uploaded_file($_FILES['imagenClienteDos']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile1);
          move_uploaded_file($_FILES['imagenClienteTres']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile2);
          move_uploaded_file($_FILES['imagenClienteCuatro']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile3);
          move_uploaded_file($_FILES['imagenClienteCinco']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile4);
        } else {

          mkdir('../web/upload/' . $id); //creacion de el directorio(si no existe) 
          chmod('../web/upload/' . $id, 0777); // le asignamos permisos al directorio creado

          move_uploaded_file($_FILES['clientes_foto']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile);
          move_uploaded_file($_FILES['imagenClienteDos']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile1);
          move_uploaded_file($_FILES['imagenClienteTres']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile2);
          move_uploaded_file($_FILES['imagenClienteCuatro']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile3);
          move_uploaded_file($_FILES['imagenClienteCinco']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $id . '/' . $nameFile4);
        }
        /*
         * se registra en al tabla bitacora las modificaciones al registro
         */
      }

      routing::getInstance()->redirect('admin', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
