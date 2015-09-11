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
class insertActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

           if (session::getInstance()->isUserAuthenticated() and ((in_array('AUX',session::getInstance()->getCredentials()))    or    (in_array('BAC',session::getInstance()->getCredentials()))   ) ){
               
               
                $this->defineView('insert', 'admin', session::getInstance()->getFormatOutput());
                
            }

           
            else {

                routing::getInstance()->redirect('shfSecurity', 'noPermission');
            }

            //$this->defineView('insert', 'admin', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
