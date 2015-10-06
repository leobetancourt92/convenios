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
        
          
          
//        $fields = array(
//                clienteTableClass::NIT,
//                clienteTableClass::NOMBRE_PLAN,
//                clienteTableClass::CODIGO_PLAN,
//                clienteTableClass::NOMBRE_PLAN,
//                clienteTableClass::RAZON_SOCIAL,
//                clienteTableClass::SEDES_ATENCION,
//                clienteTableClass::OBSERVACIONES,
//                clienteTableClass::COPAGO,
//                //clienteTableClass::CARNET
//                clienteTableClass::BOOL_CARNET,
//                clienteTableClass::CONTROL_AUTORIZACION,
//                //clienteTableClass::
//                clienteTableClass::TELEFONO,
//                clienteTableClass::EMAIL_WEB,
//                clienteTableClass::CLIENTE_CODIGO
//        );
        
        
        
//        $where = array(
//            clienteTableClass::CLIENTE_CODIGO => request::getInstance()->getRequest(clienteTableClass::CLIENTE_CODIGO)
//        );
       //$this->objListar = clienteTableClass::getAll($fields, false, null, null, null, null, $where);
        
        
        $where = request::getInstance()->getRequest(clienteTableClass::CLIENTE_CODIGO);
        $where1=request::getInstance()->getRequest(condicionesOldTableClass::FECHA);
        
        
        
        
        
        
        
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
