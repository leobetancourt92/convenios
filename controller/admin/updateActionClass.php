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


                $id = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true));
                $file = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::IMAGENES, true));

                $ids = array(
                    clienteTableClass::CLIENTE_CODIGO => $id
                );



                /*
                 * Atributos para ingresar las imagenes al convenio
                 */

                $ext = substr($_FILES['clientes_foto']['name'], -3, 3);
                $nameFile = md5($_FILES['clientes_foto']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext;
                move_uploaded_file($_FILES['clientes_foto']['tmp_name'], config::getPathAbsolute() . 'web/upload/' . $nameFile);


                $data = array(
                    clienteTableClass::IMAGENES => $nameFile
                );

                clienteTableClass::update($ids, $data);



                session::getInstance()->setSuccess('convenio actualizado satisfactoriamente');
            }

            routing::getInstance()->redirect('admin', 'index');
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
