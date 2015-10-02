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

                //Validaciones
                if (isset($filter['cliente']) and $filter['cliente'] !== null and $filter['cliente'] !== '') {
                    $where[clienteTableClass::NIT] = $filter['cliente'];
                }
                session::getInstance()->setAttribute('clienteIndexFilter', $where);
            } else if (session::getInstance()->hasAttribute('clienteIndexFilter')) {
                $where = session::getInstance()->getAttribute('clienteIndexFilter');
            }


//echo session::getInstance()->getAttribute('clienteIndexFilter');

            $fields = array(
                //"convenios.condiciones.clte_codigo",
                clienteTableClass::NIT,
                clienteTableClass::NOMBRE_PLAN,
                clienteTableClass::CODIGO_PLAN,
                clienteTableClass::NOMBRE_PLAN,
                clienteTableClass::RAZON_SOCIAL,
                clienteTableClass::CLIENTE_CODIGO
            );

            $nit = array(
                clienteTableClass::NIT
            );

            $razon = array(
                clienteTableClass::RAZON_SOCIAL
            );
            $codigo = array(
                clienteTableClass::CODIGO_PLAN
            );
            $nombre = array(
                clienteTableClass::NOMBRE_PLAN
            );



            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }

//objetos para el autocompletar

            $this->objNit = clienteTableClass::getAll($nit, FALSE);
            //$this->objRazon = clienteTableClass::getAll($razon, FALSE);
            
            


/*
 * Estructurando un metdod para una peticion ajax
 * 
 */



//            if(request::getInstance()->isAjaxRequest()){
//            
//            $this->objCodigo = clienteTableClass::getAll($codigo, FALSE);
//           }


// $this->objNombre = clienteTableClass::getAll($nombre, FALSE);






            $this->cntPages = clienteTableClass::getTotalPages(config::getRowGrid(), $where);


            
            
            
//            $bitacora = array(
//                bitacoraTableClass::ACCION,
//                bitacoraTableClass::FECHA
//                    );
//
//
//
//            $this->objBitacora = bitacoraTableClass::getAll($bitacora);
            
            

            if (isset($where)) {

              $this->objConveniosAdministrator = clienteTableClass::getClientes(implode(',',$where));
            
                //$this->objConveniosAdministrator = clienteTableClass::getAll($fields, FALSE, null, null, config::getRowGrid(), $page, $where);
            }

            
            
            
            
            

            //$this->objConveniosAdministrator = clienteTableClass::getAll($fields, FALSE, null, null,config::getRowGrid(), $page, $where);

            $this->defineView('index', 'admin', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
