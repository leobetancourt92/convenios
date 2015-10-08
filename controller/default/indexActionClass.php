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
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {


      $where = null;
      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');
        $radio = request::getInstance()->getPost('radioInline');


        if (isset($filter['cliente']) and $filter['cliente'] !== null and $filter['cliente'] !== '') {

          if ($radio == 'nit') {

            $where[clienteTableClass::NIT] = $filter['cliente'];
          }

          if ($radio == 'razon') {
            $where[clienteTableClass::RAZON_SOCIAL] = $filter['cliente'];
          }

          if ($radio == 'clte_codigo') {

            $where[clienteTableClass::CLIENTE_CODIGO] = $filter['cliente'];
          }

          if ($radio == 'nombre') {

            $where[clienteTableClass::NOMBRE_PLAN] = $filter['cliente'];
          }
        }
        session::getInstance()->setAttribute('clienteIndexFilterDefault', $where);
      } else if (session::getInstance()->hasAttribute('clienteIndexFilterDefault')) {
        $where = session::getInstance()->getAttribute('clienteIndexFilterDefault');
      }

      $fields = array(
          clienteTableClass::NIT,
          clienteTableClass::NOMBRE_PLAN,
          clienteTableClass::CODIGO_PLAN,
//          clienteTableClass::NOMBRE_PLAN,
          clienteTableClass::RAZON_SOCIAL,
          clienteTableClass::CLIENTE_CODIGO
      );



      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }



      $this->cntPages = clienteTableClass::getTotalPages(config::getRowGrid(), $where);


      if (isset($where)) {

        $this->objConvenios = clienteTableClass::getAll($fields, FALSE, null, null, config::getRowGrid(), $page, $where);
      }






      $bitacora = array(
          //condicionesTableClass::USUARIO_ID,
          condicionesTableClass::FECHA,
          condicionesTableClass::CODIGO_CLIENTE
      );


      $where_bit = array(
          'convenios.condiciones.fecha_vencimiento>= now()'
      );

      $this->objBitacora = condicionesTableClass::getAll($bitacora, false, null, null, null, null, $where_bit);






      if (session::getInstance()->isUserAuthenticated() and ( (in_array('AUX', session::getInstance()->getCredentials())) or ( in_array('BAC', session::getInstance()->getCredentials())) )) {



        routing::getInstance()->redirect('admin', 'index');
      }

      $this->defineView('index', 'default', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
