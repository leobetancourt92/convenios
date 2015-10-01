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
 * 
 * clase que gestiona el update de un convenio 
 * 
 * 
 * 
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

//            echo config::getUrlBase().'upload/'.request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true));;
//die();
                
                
                
                
                
                
                
                
                /*
                 * 
                 * atributos tipo texto que van a la tabla condiciones en el esquema convenios
                 * 
                 * 
                 */
                
                
               
               $condicion_update=  request::getInstance()->getPost('condicion'); 
                
                
                
                $id = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true));
                //$file = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::IMAGENES, true));
               
                $observacion =  request::getInstance()->getPost('observaciones'); 
                $id_negocio =  request::getInstance()->getPost('id_negocio');
                $firma = request::getInstance()->getPost('firma'); 
                $copia_resultado = request::getInstance()->getPost('copia_res');
                $formato_no_pos = request::getInstance()->getPost('no_pos');
                $historia_clinica=  request::getInstance()->getPost('hist_clinica');
                $copago =  request::getInstance()->getPost('copago');
                $orden=request::getInstance()->getPost('orden');
                /*
                 * nombre de las imagenes que seran insertadas en la base de datos
                 */
                
                
                /*
                 * 
                 * variable que trae el codigo del plan para crear el directorio
                 * 
                 * 
                 */
                
                
                
                //$imp=request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true));
                
                
                
                /*
                 * nombre de la imagenes que se van a insertar en el directorio
                 */
                
                $ext = substr($_FILES['clientes_foto']['name'], -3, 3);
                $nameFile = date('Ymd His').base64_encode($_FILES['clientes_foto']['name']. strtotime(date(config::getFormatTimestamp())) ) . '.' . $ext;
                

                $ext1 = substr($_FILES['imagenClienteDos']['name'], -3, 3);
                $nameFile1 = date('Ymd His').base64_encode($_FILES['imagenClienteDos']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext1;
                
                $ext2 = substr($_FILES['imagenClienteTres']['name'], -3, 3);
                $nameFile2 = date('Ymd His').base64_encode($_FILES['imagenClienteTres']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext2;
                
                
                $ext3 = substr($_FILES['imagenClienteCuatro']['name'], -3, 3);
                $nameFile3 = date('Ymd His').base64_encode($_FILES['imagenClienteCuatro']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext3;
                
                
                $ext4 = substr($_FILES['imagenClienteCinco']['name'], -3, 3);
                $nameFile4 = date('Ymd His').base64_encode($_FILES['imagenClienteCinco']['name'] . strtotime(date(config::getFormatTimestamp()))) . '.' . $ext4;
                
                
                
                
                
                /*
                 * array con la  información a insertar en la base de datos
                 */
                
                $data = array(
                condicionesTableClass::CODIGO_CLIENTE=>$id,
                condicionesTableClass::IMAGEN_UNO=>  '/'.$id.'/'.$nameFile,    //la ruta de las imagenes pasan a la base de datos con el  directorio (codigo del plan)
                condicionesTableClass::IMAGEN_DOS=>  '/'.$id.'/'.$nameFile1,
                condicionesTableClass::IMAGEN_TRES=>  '/'.$id.'/'.$nameFile2,
                condicionesTableClass::IMAGEN_CUATRO=> '/'.$id.'/'.$nameFile3,
                condicionesTableClass::IMAGEN_CINCO=> '/'.$id.'/'.$nameFile4,    
                condicionesTableClass::ID_UNIDAD_NEGOCIO=> $id_negocio,        
                condicionesTableClass::FIRMA_PACIENTE=> $firma,        
                condicionesTableClass::COPIA_RESULTADO=> $copia_resultado,        
                condicionesTableClass::FORMATO_NO_POS=> $formato_no_pos,
                condicionesTableClass::HISTORIA_CLINICA=> $historia_clinica,     
                condicionesTableClass::OBSERVACIONES=> $observacion,       
                condicionesTableClass::COPAGO=>$copago,
                condicionesTableClass::ORDEN_MEDICA=>$orden,
                condicionesTableClass::USUARIO_ID=>  session::getInstance()->getUserName()        
                        
                        );

                
                /*
                 * insercion de los registros en la base de datos 
                 */
                
                
             
                    
                    
                    $ids = array(
                    condicionesTableClass::CODIGO_CLIENTE => $id
                );
               
                
                    
                    
                    
                    
                    $data1 = array(
                //condicionesTableClass::CODIGO_CLIENTE=>$id,
                condicionesTableClass::IMAGEN_UNO=>  '/'.$id.'/'.$nameFile,    //la ruta de las imagenes pasan a la base de datos con el  directorio (codigo del plan)
                condicionesTableClass::IMAGEN_DOS=>  '/'.$id.'/'.$nameFile1,
                condicionesTableClass::IMAGEN_TRES=>  '/'.$id.'/'.$nameFile2,
                condicionesTableClass::IMAGEN_CUATRO=> '/'.$id.'/'.$nameFile3,
                condicionesTableClass::IMAGEN_CINCO=> '/'.$id.'/'.$nameFile4,    
                condicionesTableClass::ID_UNIDAD_NEGOCIO=> $id_negocio,        
                condicionesTableClass::FIRMA_PACIENTE=> $firma,        
                condicionesTableClass::COPIA_RESULTADO=> $copia_resultado,        
                condicionesTableClass::FORMATO_NO_POS=> $formato_no_pos,
                condicionesTableClass::HISTORIA_CLINICA=> $historia_clinica,     
                condicionesTableClass::OBSERVACIONES=> $observacion,       
                condicionesTableClass::COPAGO=>$copago,
                condicionesTableClass::ORDEN_MEDICA=>$orden,
                condicionesTableClass::USUARIO_ID=>  session::getInstance()->getUserName()        
                        
                        );
                    
                    
                    
                    
                    
                    
                    
                
                
                 if(is_null($condicion_update)){
                
                condicionesTableClass::insert($data);
                }else{
                    
                    
                    condicionesTableClass::update($ids, $data1);
                    
                    
                    
                }

                /*
                 * la imagenes se dirigen al directorio siempre  y cuando no halla excepcion de base de  datos
                 */
                
                /*
                 * 
                 * Validacion de ruta por plan
                 */
                
                
                
              //subida  de las  imagenes al directorio especificado por el ciclo 
                
                
                
              if( is_dir('../web/upload/'.$id)){
                
                move_uploaded_file($_FILES['clientes_foto']['tmp_name'], config::getPathAbsolute() . 'web/upload/' .$id.'/'. $nameFile);
                move_uploaded_file($_FILES['imagenClienteDos']['tmp_name'], config::getPathAbsolute() . 'web/upload/'.$id.'/'. $nameFile1);
                move_uploaded_file($_FILES['imagenClienteTres']['tmp_name'], config::getPathAbsolute() . 'web/upload/'.$id.'/' . $nameFile2);
                move_uploaded_file($_FILES['imagenClienteCuatro']['tmp_name'], config::getPathAbsolute() . 'web/upload/'.$id.'/' . $nameFile3);
                move_uploaded_file($_FILES['imagenClienteCinco']['tmp_name'], config::getPathAbsolute() . 'web/upload/'.$id.'/' . $nameFile4);
                }else{
                    
                mkdir('../web/upload/'.$id); //creacion de el directorio(si no existe) 
                chmod('../web/upload/'.$id, 0777); // le asignamos permisos al directorio creado
                    
                   move_uploaded_file($_FILES['clientes_foto']['tmp_name'], config::getPathAbsolute() . 'web/upload/' .$id.'/'. $nameFile); 
                   move_uploaded_file($_FILES['imagenClienteDos']['tmp_name'], config::getPathAbsolute() . 'web/upload/'.$id.'/'. $nameFile1);
                   move_uploaded_file($_FILES['imagenClienteTres']['tmp_name'], config::getPathAbsolute() . 'web/upload/'.$id.'/' . $nameFile2);
                   move_uploaded_file($_FILES['imagenClienteCuatro']['tmp_name'], config::getPathAbsolute() . 'web/upload/'.$id.'/' . $nameFile3);
                   move_uploaded_file($_FILES['imagenClienteCinco']['tmp_name'], config::getPathAbsolute() . 'web/upload/'.$id.'/' . $nameFile4); 
                    
                    
                }
                
                
            
                
                
                 
                
                
                

                
                /*
                 * se registra en al tabla bitacora las modificaciones al registro
                 */
                
                
                log::register('se modifico el convenio número '.request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO, true)),'condiciones');
                
                
                session::getInstance()->setSuccess('convenio actualizado satisfactoriamente');
            }

            routing::getInstance()->redirect('admin', 'index');
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
