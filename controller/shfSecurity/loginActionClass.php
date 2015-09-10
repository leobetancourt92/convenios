<?php

//use mvc\interfaces\xssInterface;
use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use hook\log\logHookClass as log;
use mvc\i18n\i18nClass as i18n;

//use mvc\xss\xssValidatorClass as xss;

/**
 * Description of loginActionClass
 *
 * @author Leonardo Betancourt<leobetacai@gmail.com>
 */
class loginActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {
                $usuario = request::getInstance()->getPost('inputUser');
                $password = request::getInstance()->getPost('inputPassword');

                if (($objUsuario = usuarioTableClass::verifyUser($usuario, $password)) !== false) {
                    hook\security\securityHookClass::login($objUsuario);

                    hook\security\securityHookClass::redirectUrl();
                } else {
                    session::getInstance()->setError('Usuario y contraseña incorrectos');
                    routing::getInstance()->redirect(config::getDefaultModuleSecurity(), config::getDefaultActionSecurity());
                }
            } else {
                routing::getInstance()->redirect(config::getDefaultModule(), config::getDefaultAction());
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->getUrlWeb('shfSecurity', 'exception');
        }
    }

}
