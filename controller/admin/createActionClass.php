<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;
use mvc\validator\createClienteValidatorClass as validate;

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
                    
                    
                    clienteTableClass::CLIENTE_CODIGO => '10006' ,
                    clienteTableClass::NIT => $nit,
                    clienteTableClass::RAZON_SOCIAL => $razon_social,
                    clienteTableClass::CODIGO_PLAN=>$codigo_plan,
                    clienteTableClass::NOMBRE_PLAN=>$razon_social
                    
                        
                        
      );
                
                
                
                /*
                 * Estructuracion de las validaciones
                 */
                
               $this->validate($nit);
                
               clienteTableClass::insert($data);

               log::register('crear', 'clientes', 'creacion de convenio');
               session::getInstance()->setSuccess('Convenio creado satisfactoriamente');
                routing::getInstance()->redirect('admin', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }


    
    private function validate($nit) {

    $flag = false;


    if (empty($nit)) {

      session::getInstance()->setError('el campo nit no puede estar vacio');
      $flag = true;
//      session::getInstance()->setFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true), true);
//      session::getInstance()->setFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true), true);
//      session::getInstance()->setFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true), true);
//      session::getInstance()->setFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true), true);
//      session::getInstance()->setFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true), true);
//      session::getInstance()->setFlash(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true), true);
//      session::getInstance()->setFlash(usuarioGustaCategoriaTableClass::getNameField(usuarioGustaCategoriaTableClass::CATEGORIA_ID, true), true);
    }

    

    if ($flag === true) {

      request::getInstance()->setMethod('GET');
      routing::getInstance()->forward('admin', 'insert');
    }
  }
    
    
    
    
        }
