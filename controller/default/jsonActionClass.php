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
class jsonActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('GET') && request::getInstance()->isAjaxRequest()) {




                
                
                
                
               $hola=$_GET['radio'];
               
               
               echo $hola."controller"; 
               
               
               
           
               
               
             
           
            
            

            





//
                $this->arrayAjax = array(
                   'code' => 200,
                   'msg' => $_GET['radio']
                );

                $this->defineView('json', 'default', session::getInstance()->getFormatOutput());
            } else {
                routing::getInstance()->redirect('default', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
