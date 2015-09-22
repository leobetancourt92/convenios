<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of listarActionClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class listarActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(clienteTableClass::CLIENTE_CODIGO)) {
        
          
          
        $fields = array(
                clienteTableClass::NIT,
                clienteTableClass::NOMBRE_PLAN,
                clienteTableClass::CODIGO_PLAN,
                clienteTableClass::NOMBRE_PLAN,
                clienteTableClass::RAZON_SOCIAL,
                clienteTableClass::OBSERVACIONES
        );
        $where = array(
            clienteTableClass::CLIENTE_CODIGO => request::getInstance()->getRequest(clienteTableClass::CLIENTE_CODIGO)
        );
        $this->objListar = clienteTableClass::getAll($fields, false, null, null, null, null, $where);
        $this->defineView('listar', 'default', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('default', 'index');
      }


    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
