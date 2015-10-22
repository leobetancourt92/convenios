<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historicoActionClass
 *
 * @author practicante_dokeos
 */
class historicoActionClass extends controllerClass {

  //put your code here



  public function execute() {
    try {
      //if (request::getInstance()->hasRequest(clienteTableClass::CLIENTE_CODIGO)) {

      $where = null;


      if (request::getInstance()->hasPost('filter')) {
        $filter = request::getInstance()->getPost('filter');


        if ((isset($filter['Fecha1']) and $filter['Fecha1'] !== null and $filter['Fecha1'] !== '') and ( isset($filter['Fecha2']) and $filter['Fecha2'] !== null and $filter['Fecha2'] !== '')) {
          $where [condicionesOldTableClass::FECHA] = array(
              date(config::getFormatTimestamp(), strtotime($filter['Fecha1'] . '00:00:00')),
              date(config::getFormatTimestamp(), strtotime($filter['Fecha2'] . '23:59:59'))
          );
        }



        $var = request::getInstance()->getRequest(clienteTableClass::CLIENTE_CODIGO);


        if ($filter['Fecha1'] > $filter['Fecha2'] || $filter['Fecha2'] < $filter['Fecha1']) {

          session::getInstance()->setError('Error en las fechas de busqueda, intente nuevamente');
          routing::getInstance()->redirect('admin', 'historico', array(clienteTableClass::CLIENTE_CODIGO => $var));
        }




        session::getInstance()->setAttribute('historyFilter', $where);
      } else if (session::getInstance()->hasAttribute('historyFilter')) {
        $where = session::getInstance()->getAttribute('historyFilter');
      }

      if (session::getInstance()->getAttribute('historyFilter') == null) {

        $where = array(
            condicionesOldTableClass::CODIGO_CLIENTE => request::getInstance()->getRequest(clienteTableClass::CLIENTE_CODIGO)
        );
      }


      $fields = array(
          condicionesOldTableClass::CODIGO_CLIENTE,
          condicionesOldTableClass::FECHA,
          condicionesOldTableClass::USUARIO_ID
      );




      $orderBy = array(
          condicionesOldTableClass::FECHA
      );



      $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }





      $this->cntPages = condicionesOldTableClass::getTotalPages(config::getRowGrid(), $where);


      //echo $where;
      //       die();








      $this->objHistory = condicionesOldTableClass::getAll($fields, false, $orderBy, 'DESC', config::getRowGrid(), $page, $where);





      $this->defineView('history', 'admin', session::getInstance()->getFormatOutput());

      //}
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
