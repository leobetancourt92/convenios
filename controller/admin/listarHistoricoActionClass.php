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
class listarHistoricoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(condicionesOldTableClass::CODIGO_CLIENTE) && request::getInstance()->hasRequest(condicionesOldTableClass::FECHA)) {
        
          

        
        $where = request::getInstance()->getRequest(clienteTableClass::CLIENTE_CODIGO);
        $where1=request::getInstance()->getRequest(condicionesOldTableClass::FECHA);//Busqueda por fecha en la ventana modal
        
        
        
        
        
        //instancia de la busqueda
        
        $this->objListarHistorico = condicionesOldTableClass::getRegistrosHistorico($where,$where1);
        
        
        
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
        
        
        $this->defineView('listarHistorico', 'admin', session::getInstance()->getFormatOutput());
      }


    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
