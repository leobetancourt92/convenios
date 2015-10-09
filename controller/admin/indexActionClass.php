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

        
 
        
        //Validaciones
        if (isset($filter) and $filter !== null and $filter !== '') {


          if ($radio == 'nit') {

            $where[clienteTableClass::NIT] = $filter;
          }

          if ($radio == 'razon') {
            $where[clienteTableClass::RAZON_SOCIAL] = $filter;
          }

          if ($radio == 'clte_codigo') {

            $where[clienteTableClass::CLIENTE_CODIGO] = $filter;
          }

          if ($radio == 'nombre') {

            $where[clienteTableClass::NOMBRE_PLAN] = $filter;
          }
        }



        session::getInstance()->setAttribute('clienteIndexFilter', $where);
        session::getInstance()->setAttribute('radio', $radio);
        
        
          } else if (session::getInstance()->hasAttribute('clienteIndexFilter') and session::getInstance()->hasAttribute('radio')) {
        $where = session::getInstance()->getAttribute('clienteIndexFilter'); 
        $radio= session::getInstance()->getAttribute('radio');
        
        
      }


//echo session::getInstance()->getAttribute('clienteIndexFilter');

      

     $page = 0;
      if (request::getInstance()->hasGet('page')) {
        $this->page = request::getInstance()->getGet('page');
        $page = request::getInstance()->getGet('page') - 1;
        $page = $page * config::getRowGrid();
      }

//objetos para el autocompletar

     
      $this->cntPages = clienteTableClass::getTotalPages(config::getRowGrid(), $where);

      $bitacora = array(
          //condicionesTableClass::USUARIO_ID,
          condicionesTableClass::FECHA,
          condicionesTableClass::CODIGO_CLIENTE
      );


      $where_bit = array(
          'convenios.condiciones.fecha_vencimiento>= now()'
      );


      $this->objBitacora = condicionesTableClass::getAll($bitacora, false, null, null, null, null, $where_bit);

//$this->objConveniosAdministrator = clienteTableClass::getClientes($radio,$where);

     

        if(isset($where)){

      $this->objConveniosAdministrator = clienteTableClass::getClientes($radio,implode(',', $where));
        }
   
        
        session::getInstance()->deleteAttribute('clienteIndexFilter');
        session::getInstance()->deleteAttribute('radio');
        
        

      $this->defineView('index', 'admin', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
