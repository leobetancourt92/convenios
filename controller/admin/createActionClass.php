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
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $nit = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::NIT, true));
                $razon_social = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::RAZON_SOCIAL, true));
                $codigo_plan = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CODIGO_PLAN, true));
                $razon_social = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::NOMBRE_PLAN, true));

                
                $data = array(
                    
                    
                    clienteTableClass::CLIENTE_CODIGO => '10002' ,
                    clienteTableClass::NIT => $nit,
                    clienteTableClass::RAZON_SOCIAL => $razon_social,
                    clienteTableClass::CODIGO_PLAN=>$codigo_plan,
                    clienteTableClass::NOMBRE_PLAN=>$razon_social
                    
                        
                        
      );
                
                clienteTableClass::insert($data);

               log::register('crear', 'clientes', 'creacion de convenio');

                routing::getInstance()->redirect('admin', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
