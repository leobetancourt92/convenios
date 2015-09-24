<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;

/**
 * Description of clienteTableClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class clienteTableClass extends clienteBaseTableClass {
    /*
     * funcion estatica para estructurar un paginador en la vista de los clientes
     */

    public static function getTotalPages($lines, $where) {
        try {





            $sql = 'SELECT count(' . clienteTableClass::CLIENTE_CODIGO . ') AS cantidad '
                    . 'FROM ' . clienteTableClass::getNameTable() . ' WHERE ' . clienteTableClass::CLIENTE_CODIGO . ' IS NOT NULL ';


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
            if ((!empty(session::getInstance()->getAttribute('clienteIndexFilter'))) or ( !empty(session::getInstance()->getAttribute('clienteIndexFilterDefault')))) {
                $answer = model::getInstance()->prepare($sql);
                $answer->execute();
                $answer = $answer->fetchAll(PDO::FETCH_OBJ);
                return ceil($answer[0]->cantidad / $lines);
            } else {

                return 1;
            }
        } catch (PDOException $exc) {
            throw $exc;
        }
    }


    
    
    
    public static function getRegistros($where) {
        try {





            $sql = "SELECT clientes.nit, clientes.clte_codigo, "
                    . "clientes.clte_cod_ppal, clientes.nombre, clientes.razon, "
                    . "clientes.ciudad_cod, convenios.condiciones.observacion,"
                    . "clientes.oblicarnet,"
                    . " clientes.copago, clientes.oblicarnet, clientes.telefono, clientes.email_web, "
                    . "clientes.clte_codigo,convenios.condiciones.historia_clinica,"
                    . "convenios.condiciones.firma_paciente,convenios.condiciones.copia_resultado,"
                    . "convenios.condiciones.formato_nopos,convenios.condiciones.id_unidad_negocio,"
                    . "convenios.condiciones.imagenuno,convenios.condiciones.imagendos,"
                    . "convenios.condiciones.imagentres,convenios.condiciones.imagencuatro,"
                    . "convenios.condiciones.imagencinco,convenios.condiciones.observacion "
                    . "FROM public.clientes,convenios.condiciones WHERE public.clientes.clte_codigo = convenios.condiciones.clte_codigo AND public.clientes.clte_codigo ="."'$where'";


            
            //echo $sql;
            //exit();
            
                return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
                
            
        } catch (PDOException $exc) {
            throw $exc;
        }
    }
    
    
    
     public static function getRegistrosDefault($where) {
        try {





            $sql = "SELECT clientes.nit, clientes.clte_codigo, clientes.clte_cod_ppal,"
                    . " clientes.nombre, clientes.razon, clientes.ciudad_cod,"
                    . " convenios.condiciones.observacion,clientes.oblicarnet, clientes.copago, "
                    . "clientes.oblicarnet, clientes.telefono, clientes.email_web,"
                    . " clientes.clte_codigo,convenios.condiciones.historia_clinica,"
                    . "convenios.condiciones.firma_paciente,convenios.condiciones.copia_resultado,"
                    . "convenios.condiciones.formato_nopos,convenios.condiciones.imagenuno,"
                    . "convenios.condiciones.imagendos,convenios.condiciones.imagentres,"
                    . "convenios.condiciones.imagencuatro,convenios.condiciones.imagencinco,"
                    . "convenios.condiciones.observacion,convenios.unidad_negocio.nombre_unidad"
                    . " FROM public.clientes,convenios.condiciones,convenios.unidad_negocio WHERE "
                    . "public.clientes.clte_codigo = convenios.condiciones.clte_codigo AND  convenios.condiciones.id_unidad_negocio = convenios.unidad_negocio.id_unidad_negocio AND public.clientes.clte_codigo ="."'$where'";


            
            //echo $sql;
            //exit();
            
                return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
                
            
        } catch (PDOException $exc) {
            throw $exc;
        }
    }
    
    
    
    
    
    
    
    
    
    //SELECT clientes.nit, clientes.clte_codigo, clientes.clte_cod_ppal, clientes.nombre, clientes.razon, clientes.ciudad_cod, convenios.condiciones.observacion,clientes.oblicarnet, clientes.copago, clientes.oblicarnet, clientes.telefono, clientes.email_web, clientes.clte_codigo,convenios.condiciones.historia_clinica,convenios.condiciones.firma_paciente,convenios.condiciones.copia_resultado,convenios.condiciones.formato_nopos,convenios.condiciones.imagenuno,convenios.condiciones.imagendos,convenios.condiciones.imagentres,convenios.condiciones.imagencuatro,convenios.condiciones.imagencinco,convenios.condiciones.observacion,convenios.unidad_negocio.nombre_unidad FROM public.clientes,convenios.condiciones,convenios.unidad_negocio WHERE public.clientes.clte_codigo = convenios.condiciones.clte_codigo AND  convenios.condiciones.id_unidad_negocio = convenios.unidad_negocio.id_unidad_negocio AND public.clientes.clte_codigo
    
    
    
    
    
    
        }
