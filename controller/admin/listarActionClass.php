<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of listarActionClass
 *
 * 
 * clase que permite la edicion de un convenio
 * 
 * 
 * 
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class listarActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(clienteTableClass::CLIENTE_CODIGO)) {
        
          

        
        
        $where = request::getInstance()->getRequest(clienteTableClass::CLIENTE_CODIGO);
        
        $this->objListar = clienteTableClass::getRegistros($where);
        $fields2=array(
            
        negocioTableClass::ID,
        negocioTableClass::NOMBRE_UNIDAD,    
            
            
        );
        
        /*
         * instanciamos el objeto para el select de la unidad de negocio
         */
        
        
        $this->ObjUnidad =  negocioTableClass::getAll($fields2);
        
        
        
        
        
        /*
         * Instanciamos los medicos adscritos de el convenio
         */
        
   
        
        $this->objMedico =  medicoTableClass::getMedicos(request::getInstance()->getRequest(clienteTableClass::CLIENTE_CODIGO));
        
        
        $this->defineView('listar', 'admin', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('admin', 'index');
      }


    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
