<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of deleteFiltersActionClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class deleteFiltersActionClass extends controllerClass implements controllerActionInterface {

    //put your code here

    public function execute() {
        try {

            if (session::getInstance()->hasAttribute('clienteIndexFilter')) {

                
                /*
                 * 
                 * borrar atributo de la session
                 */
                
                session::getInstance()->deleteAttribute('clienteIndexFilter');
                session::getInstance()->deleteAttribute('radio');

                
                
                /*
                 * 
                 * redireccion al index o grilla con registros
                 */
                
                routing::getInstance()->redirect('admin', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
