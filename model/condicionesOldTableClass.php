<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of bitacoraTableClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class condicionesOldTableClass extends condicionesOldBaseTableClass {

    public static function getTotalPages($lines, $where) {
        try {





            $sql = 'SELECT count(' . 'condiciones_old.' . condicionesOldTableClass::CODIGO_CLIENTE . ') AS cantidad '
                    . 'FROM ' . condicionesOldTableClass::getNameTable() . ' WHERE ' . 'condiciones_old.' . condicionesOldBaseTableClass::CODIGO_CLIENTE . ' IS NOT NULL ';


            if (is_array($where) === true) {
                foreach ($where as $field => $value) {
                    if (is_array($value)) {

                        $sql = $sql . ' AND ' . $field . ' BETWEEN ' . ((is_numeric($value[0])) ? $value[0] : "'$value[0]'") . ' AND ' . ((is_numeric($value[1])) ? $value[1] : "'$value[1]'") . ' ';
                    } else {
                        $sql = $sql . ' AND ' . $field . ' = ' . "'" . $value . "'";
                    }
                }
            }
            //echo $sql;
            //exit();
            //if ((!empty(session::getInstance()->getAttribute('clienteIndexFilter'))) or ( !empty(session::getInstance()->getAttribute('clienteIndexFilterDefault')))) {
            $answer = model::getInstance()->prepare($sql);
            $answer->execute();
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return ceil($answer[0]->cantidad / $lines);
        } catch (PDOException $exc) {
            throw $exc;
        }
    }


    
    
    
      public static function getRegistrosHistorico($where,$where1) {
        try {





            $sql = "SELECT 
convenios.unidad_negocio.nombre_unidad,
convenios.condiciones_old.clte_codigo as c,clientes.nit, clientes.clte_codigo,
 clientes.clte_cod_ppal, clientes.nombre, clientes.razon, 
 convenios.condiciones_old.observacion,clientes.oblicarnet, 
 clientes.oblicarnet, 
 
 --clientes.telefono, 
 --clientes.email_web, 
 
convenios.condiciones_old.tel_autorizacion,
convenios.condiciones_old.web_autorizacion,
convenios.condiciones_old.autorizacion_impresa,
 

 clientes.clte_codigo,convenios.condiciones_old.historia_clinica,convenios.condiciones_old.firma_paciente,
 convenios.condiciones_old.copia_resultado,
 convenios.condiciones_old.formato_nopos,convenios.condiciones_old.id_unidad_negocio,
 convenios.condiciones_old.imagenuno,convenios.condiciones_old.imagendos, 
 convenios.condiciones_old.copago,convenios.condiciones_old.imagentres,
 convenios.condiciones_old.imagencuatro,convenios.condiciones_old.imagencinco ,convenios.condiciones_old.orden_medica, 
 convenios.condiciones_old.sedes_atencion,
 convenios.condiciones_old.fecha

 
 FROM  
 public.clientes  
 inner join ciudades 
 on ciudades.ciudad_cod=clientes.ciudad_cod 
 left join convenios.condiciones_old  
 on public.clientes.clte_codigo = convenios.condiciones_old.clte_codigo 
left join convenios.unidad_negocio 
 on convenios.unidad_negocio.id_unidad_negocio=convenios.condiciones_old.id_unidad_negocio

 where public.clientes.clte_codigo='$where'"."and convenios.condiciones_old.fecha='$where1'";


            //echo $sql;
            //exit();

            return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $exc) {
            throw $exc;
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
        }
