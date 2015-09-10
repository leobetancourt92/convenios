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
                    $where[clienteTableClass::NOMBRE] = $filter['cliente'];
                }
                session::getInstance()->setAttribute('clienteIndexFilter', $where);
            } else if (session::getInstance()->hasAttribute('clienteIndexFilter')) {
                $where = session::getInstance()->getAttribute('clienteIndexFilter');
            }





            $fields = array(
                clienteTableClass::NIT,
                clienteTableClass::NOMBRE_PLAN,
                clienteTableClass::CODIGO_PLAN,
                clienteTableClass::NOMBRE_PLAN,
                clienteTableClass::RAZON_SOCIAL
            );



            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $this->page = request::getInstance()->getGet('page');
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }



            $this->cntPages = clienteTableClass::getTotalPages(config::getRowGrid(), $where);

            $this->objConvenios = clienteTableClass::getAll($fields, FALSE, null, null,config::getRowGrid(), $page, $where);

            $this->defineView('index', 'admin', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
