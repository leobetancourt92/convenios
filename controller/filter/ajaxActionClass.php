<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class ajaxActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isAjaxRequest() and request::getInstance()->isMethod('POST')) {

        $filtro = request::getInstance()->getPost('filtro');
        $busqueda = strtoupper(request::getInstance()->getPost('busqueda'));

        $fields = array(
            $filtro
        );

        $orderBy = $fields;

        $where = array(
            "$filtro LIKE '$busqueda%' OR $filtro LIKE '%$busqueda%' OR $filtro LIKE '%$busqueda'" . " GROUP BY " . $filtro
        );

        $data = clienteTableClass::getAll($fields, false, $orderBy, 'ASC', null, null, $where);

        $this->answer = array();
        if (count($data) > 0) {
          foreach ($data as $value) {
            $this->answer[] = $value->$filtro;
          }
        } else {
          $this->answer[] = 'No hay datos';
        }

        $this->defineView('ajax', 'filter', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('@homepage');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
