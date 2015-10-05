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
                
                
                /*
                 * implementar un metodo que valide los casos de el radio button por medio del metodo post(un array bidimensional que recorra las posiciones de el formulario en el filtro de busqueda)
                 */
                
                //filtro por codigo del plan
//                if (isset($filter['cliente'][1]) and $filter['cliente'][1] !== null and $filter['cliente'][1] !== '') {
//                    $where[clienteTableClass::CODIGO_PLAN] = $filter['cliente'][1];
//                }
                
                 
                //filtro por nombre del plan
//                if (isset($filter['cliente'][2]) and $filter['cliente'][2] !== null and $filter['cliente'][2] !== '') {
//                    $where[clienteTableClass::NOMBRE_PLAN] = $filter['cliente'][2];
//                }
                
                
                 //filtro por razon social del cliente
//                if (isset($filter['cliente'][3]) and $filter['cliente'][3] !== null and $filter['cliente'][3] !== '') {
//                    $where[clienteTableClass::RAZON_SOCIAL] = $filter['cliente'][2];
//                }
                
                
                
                //filtro en funcionamiento con la posicion actual de el filtro de busqueda filter['cliente'][0] o filter['cliente'] 
                
                if (isset($filter['cliente']) and $filter['cliente'] !== null and $filter['cliente'] !== '') {
                    $where[clienteTableClass::NIT] = $filter['cliente'];
                }
                session::getInstance()->setAttribute('clienteIndexFilterDefault', $where);
            } else if (session::getInstance()->hasAttribute('clienteIndexFilterDefault')) {
                $where = session::getInstance()->getAttribute('clienteIndexFilterDefault');
            }

//            var_dump(session::getInstance()->getAttribute('clienteIndexFilterDefault'));
//            die();



            $fields = array(
                clienteTableClass::NIT,
                clienteTableClass::NOMBRE_PLAN,
                clienteTableClass::CODIGO_PLAN,
                clienteTableClass::NOMBRE_PLAN,
                clienteTableClass::RAZON_SOCIAL,
                clienteTableClass::CLIENTE_CODIGO
            );

            $nit = array(
                clienteTableClass::NIT,
                clienteTableClass::NOMBRE_PLAN
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



            $this->cntPages = clienteTableClass::getTotalPages(config::getRowGrid(), $where);


            if (isset($where)) {

                $this->objConvenios = clienteTableClass::getAll($fields, FALSE, null, null, config::getRowGrid(), $page, $where);
            }
            /*
             * Objetos instanciados para el autocompletar de la vista.
             */

            // if(request::getInstance()->isMethod('POST')){




            $this->objNit = clienteTableClass::getAll($nit, FALSE);
            //$this->objRazon = clienteTableClass::getAll($razon, FALSE);
            // $this->objCodigo = clienteTableClass::getAll($codigo, FALSE);
            //$this->objNombre = clienteTableClass::getAll($nombre, FALSE);
            //}




            $bitacora = array(
                //condicionesTableClass::USUARIO_ID,
                condicionesTableClass::FECHA,
                condicionesTableClass::CODIGO_CLIENTE
            );
//
//
//
            $this->objBitacora = condicionesTableClass::getAll($bitacora);



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
