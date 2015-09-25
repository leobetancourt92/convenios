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

/*
                 * 
                 * atributos tipo texto que van a la tabla condiciones en el schema convenios
                 * 
                 * 
                 */
                
                $id = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true));
                //$file = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::IMAGENES, true));
                $observacion =  request::getInstance()->getPost('observaciones'); 
                $id_negocio =  request::getInstance()->getPost('id_negocio');
                $firma = request::getInstance()->getPost('firma'); 
                $copia_resultado = request::getInstance()->getPost('copia_res');
                $formato_no_pos = request::getInstance()->getPost('no_pos');
                $historia_clinica=  request::getInstance()->getPost('hist_clinica');
                $copago=  request::getInstance()->getPost('copago');
                
                /*
                 * nombre de las imagenes que seran insertadas en la base de datos
                 */
                
                
                
                $ext = substr($_FILES['clientes_foto']['name'], -3, 3);
                $nameFile = md5($_FILES['clientes_foto']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext;
                

                $ext1 = substr($_FILES['imagenClienteDos']['name'], -3, 3);
                $nameFile1 = md5($_FILES['imagenClienteDos']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext1;
                
                $ext2 = substr($_FILES['imagenClienteTres']['name'], -3, 3);
                $nameFile2 = md5($_FILES['imagenClienteTres']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext2;
                
                
                $ext3 = substr($_FILES['imagenClienteCuatro']['name'], -3, 3);
                $nameFile3 = md5($_FILES['imagenClienteCuatro']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext3;
                
                
                $ext4 = substr($_FILES['imagenClienteCinco']['name'], -3, 3);
                $nameFile4 = md5($_FILES['imagenClienteCinco']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext4;
                
                
                
                
                
                /*
                 * array con al informacion a insertar en la base de datos
                 */
                
                $data = array(
                condicionesTableClass::CODIGO_CLIENTE=>$id,
                condicionesTableClass::IMAGEN_UNO=>  $nameFile,
                condicionesTableClass::IMAGEN_DOS=>  $nameFile1,
                condicionesTableClass::IMAGEN_TRES=>  $nameFile2,
                condicionesTableClass::IMAGEN_CUATRO=> $nameFile3,
                condicionesTableClass::IMAGEN_CINCO=> $nameFile4,    
                condicionesTableClass::ID_UNIDAD_NEGOCIO=> $id_negocio,        
                condicionesTableClass::FIRMA_PACIENTE=> $firma,        
                condicionesTableClass::COPIA_RESULTADO=> $copia_resultado,        
                condicionesTableClass::FORMATO_NO_POS=> $formato_no_pos,
                condicionesTableClass::HISTORIA_CLINICA=> $historia_clinica,     
                condicionesTableClass::OBSERVACIONES=> $observacion,       
                condicionesTableClass::COPAGO=>$copago        
                        );

                
                /*
                 * insercion de los registros en la base de datos 
                 */
                
                condicionesTableClass::insert($data);
               

                /*
                 * la imagenes se dirigen al directorio siempre  y cuando no halla excepcion de base de  datos
                 */
                
                
                move_uploaded_file($_FILES['clientes_foto']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $nameFile);
                move_uploaded_file($_FILES['imagenClienteDos']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $nameFile1);
                move_uploaded_file($_FILES['imagenClienteTres']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $nameFile2);
                move_uploaded_file($_FILES['imagenClienteCuatro']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $nameFile3);
                move_uploaded_file($_FILES['imagenClienteCinco']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $nameFile4);

                
                /*
                 * se registra en al tabla bitacora las modificaciones al registro
                 */
                
                
                log::register('se modifico el convenio número '.request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true)),'condiciones');
                
                
                session::getInstance()->setSuccess('convenio actualizado satisfactoriamente');
            }

            routing::getInstance()->redirect('admin', 'index');
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
