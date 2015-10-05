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





            $sql = 'SELECT count(' . 'clientes.' . clienteTableClass::CLIENTE_CODIGO . ') AS cantidad '
                    . 'FROM ' . clienteTableClass::getNameTable() . ' WHERE ' . 'clientes.' . clienteTableClass::CLIENTE_CODIGO . ' IS NOT NULL ';


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





            $sql = "SELECT 
convenios.unidad_negocio.nombre_unidad,
 convenios.condiciones.clte_codigo as c,clientes.nit, clientes.clte_codigo,
 clientes.clte_cod_ppal, clientes.nombre, clientes.razon, 
 convenios.condiciones.observacion,clientes.oblicarnet, 
 clientes.oblicarnet, clientes.telefono, clientes.email_web, 
 clientes.clte_codigo,convenios.condiciones.historia_clinica,convenios.condiciones.firma_paciente,
 convenios.condiciones.copia_resultado,
 convenios.condiciones.formato_nopos,convenios.condiciones.id_unidad_negocio,
 convenios.condiciones.imagenuno,convenios.condiciones.imagendos, 
 convenios.condiciones.copago,convenios.condiciones.imagentres,
 convenios.condiciones.imagencuatro,convenios.condiciones.imagencinco ,convenios.condiciones.orden_medica, 
 ciudades.ciudad_descrip
 FROM  
 public.clientes  
 inner join ciudades 
 on ciudades.ciudad_cod=clientes.ciudad_cod 
 left join convenios.condiciones  
 on public.clientes.clte_codigo = convenios.condiciones.clte_codigo 
left join convenios.unidad_negocio 
 on convenios.unidad_negocio.id_unidad_negocio=convenios.condiciones.id_unidad_negocio

 where public.clientes.clte_codigo='$where'";


            //echo $sql;
            //exit();

            return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

    public static function getRegistrosDefault($where) {
        try {

$sql="SELECT 
convenios.unidad_negocio.nombre_unidad,clientes.nit, clientes.clte_codigo,
 clientes.clte_cod_ppal, clientes.nombre, clientes.razon, 
 convenios.condiciones.observacion,clientes.oblicarnet, 
 clientes.oblicarnet, clientes.telefono, clientes.email_web, 
 clientes.clte_codigo,convenios.condiciones.historia_clinica,convenios.condiciones.firma_paciente,
 convenios.condiciones.copia_resultado,
 convenios.condiciones.formato_nopos,convenios.condiciones.id_unidad_negocio,
 convenios.condiciones.imagenuno,convenios.condiciones.imagendos, 
 convenios.condiciones.copago,convenios.condiciones.imagentres,
 convenios.condiciones.imagencuatro,convenios.condiciones.imagencinco ,convenios.condiciones.orden_medica, 
 ciudades.ciudad_descrip
 FROM  
 public.clientes  
 inner join ciudades 
 on ciudades.ciudad_cod=clientes.ciudad_cod 
 left join convenios.condiciones  
 on public.clientes.clte_codigo = convenios.condiciones.clte_codigo 
 left join convenios.unidad_negocio 
 on convenios.unidad_negocio.id_unidad_negocio=convenios.condiciones.id_unidad_negocio

 where public.clientes.clte_codigo='$where'";



//           $sql = "SELECT 
//clientes.nit, clientes.clte_codigo, clientes.clte_cod_ppal,
//clientes.nombre, clientes.razon, clientes.ciudad_cod,
//convenios.condiciones.observacion,convenios.condiciones.orden_medica,
//clientes.oblicarnet, clientes.telefono, clientes.email_web,
//clientes.clte_codigo,convenios.condiciones.historia_clinica,
//convenios.condiciones.firma_paciente,
//convenios.condiciones.copia_resultado,convenios.condiciones.formato_nopos,
//convenios.unidad_negocio.nombre_unidad,convenios.condiciones.imagenuno,convenios.condiciones.imagendos,
//convenios.condiciones.copago,convenios.condiciones.imagentres,convenios.condiciones.imagencuatro,convenios.condiciones.imagencinco 
//FROM 
//convenios.unidad_negocio,
//public.clientes
//left join convenios.condiciones 
//on  public.clientes.clte_codigo = convenios.condiciones.clte_codigo 
//where public.clientes.clte_codigo=" . "'$where'"." AND convenios.condiciones.id_unidad_negocio=convenios.unidad_negocio.id_unidad_negocio";



            //echo $sql;
            //exit();

            return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

    //SELECT clientes.nit, clientes.clte_codigo, clientes.clte_cod_ppal, clientes.nombre, clientes.razon, clientes.ciudad_cod, convenios.condiciones.observacion,clientes.oblicarnet, clientes.copago, clientes.oblicarnet, clientes.telefono, clientes.email_web, clientes.clte_codigo,convenios.condiciones.historia_clinica,convenios.condiciones.firma_paciente,convenios.condiciones.copia_resultado,convenios.condiciones.formato_nopos,convenios.condiciones.imagenuno,convenios.condiciones.imagendos,convenios.condiciones.imagentres,convenios.condiciones.imagencuatro,convenios.condiciones.imagencinco,convenios.condiciones.observacion,convenios.unidad_negocio.nombre_unidad FROM public.clientes,convenios.condiciones,convenios.unidad_negocio WHERE public.clientes.clte_codigo = convenios.condiciones.clte_codigo AND  convenios.condiciones.id_unidad_negocio = convenios.unidad_negocio.id_unidad_negocio AND public.clientes.clte_codigo





    public static function getClientes($where) {
        try {





            $sql = "SELECT convenios.condiciones.clte_codigo as c,clientes.nit, clientes.nombre, clientes.clte_cod_ppal, clientes.nombre, clientes.razon, clientes.clte_codigo FROM clientes left join convenios.condiciones 
on  public.clientes.clte_codigo = convenios.condiciones.clte_codigo WHERE nit = "."'".$where."'"." LIMIT 10 OFFSET 0";



//echo $sql;
//exit();

            return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

}
