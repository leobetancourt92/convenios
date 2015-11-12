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
   * funcion estatica para estructurar un paginador en el index
   */

  public static function getTotalPages($lines, $where) {
    try {





      $sql = 'SELECT count(' . 'convenios.view_clientes.' . clienteTableClass::CLIENTE_CODIGO . ') AS cantidad '
              . 'FROM ' . clienteTableClass::getNameTable() . ' WHERE ' . 'convenios.view_clientes.' . clienteTableClass::CLIENTE_CODIGO . ' IS NOT NULL ';


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





      $sql = "
              

SELECT convenios.unidad_negocio.nombre_unidad, convenios.condiciones.clte_codigo as c,
convenios.view_clientes.nit, convenios.view_clientes.clte_codigo as codigo, convenios.view_clientes.clte_cod_ppal
, convenios.view_clientes.nombre, convenios.view_clientes.razon, convenios.condiciones.observacion,
convenios.view_clientes.oblicarnet, convenios.view_clientes.oblicarnet,
--convenios.view_clientes.telefono, 
--convenios.view_clientes.email_web, 


convenios.view_clientes.clte_codigo,convenios.condiciones.historia_clinica,

--campos nuevos agragados a la base de datos

convenios.condiciones.tel_autorizacion,
convenios.condiciones.web_autorizacion,
convenios.condiciones.autorizacion_impresa,

convenios.condiciones.firma_paciente, convenios.condiciones.copia_resultado, convenios.condiciones.formato_nopos,
convenios.condiciones.id_unidad_negocio, convenios.condiciones.imagenuno,convenios.condiciones.imagendos,
convenios.condiciones.copago,convenios.condiciones.imagentres, convenios.condiciones.imagencuatro,
convenios.condiciones.imagencinco ,convenios.condiciones.orden_medica, convenios.condiciones.sedes_atencion 
FROM convenios.view_clientes 
left join convenios.condiciones 
on convenios.view_clientes.clte_codigo = convenios.condiciones.clte_codigo left join convenios.unidad_negocio 
on convenios.unidad_negocio.id_unidad_negocio=convenios.condiciones.id_unidad_negocio 
where convenios.view_clientes.clte_codigo='$where'";








      //echo $sql;
      //exit();

      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getRegistrosDefault($where) {
    try {

      $sql ="
              

SELECT convenios.unidad_negocio.nombre_unidad, convenios.condiciones.clte_codigo as c,
convenios.view_clientes.nit, convenios.view_clientes.clte_codigo as codigo, convenios.view_clientes.clte_cod_ppal
, convenios.view_clientes.nombre, convenios.view_clientes.razon, convenios.condiciones.observacion,
convenios.view_clientes.oblicarnet, convenios.view_clientes.oblicarnet,
--convenios.view_clientes.telefono, 
--convenios.view_clientes.email_web, 


convenios.view_clientes.clte_codigo,convenios.condiciones.historia_clinica,

--campos nuevos agragados a la base de datos

convenios.condiciones.tel_autorizacion,
convenios.condiciones.web_autorizacion,
convenios.condiciones.autorizacion_impresa,

convenios.condiciones.firma_paciente, convenios.condiciones.copia_resultado, convenios.condiciones.formato_nopos,
convenios.condiciones.id_unidad_negocio, convenios.condiciones.imagenuno,convenios.condiciones.imagendos,
convenios.condiciones.copago,convenios.condiciones.imagentres, convenios.condiciones.imagencuatro,
convenios.condiciones.imagencinco ,convenios.condiciones.orden_medica, convenios.condiciones.sedes_atencion 
FROM convenios.view_clientes 
left join convenios.condiciones 
on convenios.view_clientes.clte_codigo = convenios.condiciones.clte_codigo left join convenios.unidad_negocio 
on convenios.unidad_negocio.id_unidad_negocio=convenios.condiciones.id_unidad_negocio 
where convenios.view_clientes.clte_codigo='$where'" ;
//echo $sql;
      //exit();

      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  //SELECT clientes.nit, clientes.clte_codigo, clientes.clte_cod_ppal, clientes.nombre, clientes.razon, clientes.ciudad_cod, convenios.condiciones.observacion,clientes.oblicarnet, clientes.copago, clientes.oblicarnet, clientes.telefono, clientes.email_web, clientes.clte_codigo,convenios.condiciones.historia_clinica,convenios.condiciones.firma_paciente,convenios.condiciones.copia_resultado,convenios.condiciones.formato_nopos,convenios.condiciones.imagenuno,convenios.condiciones.imagendos,convenios.condiciones.imagentres,convenios.condiciones.imagencuatro,convenios.condiciones.imagencinco,convenios.condiciones.observacion,convenios.unidad_negocio.nombre_unidad FROM public.clientes,convenios.condiciones,convenios.unidad_negocio WHERE public.clientes.clte_codigo = convenios.condiciones.clte_codigo AND  convenios.condiciones.id_unidad_negocio = convenios.unidad_negocio.id_unidad_negocio AND public.clientes.clte_codigo





  public static function getClientes($input, $where, $page) {
    try {





      $sql = "SELECT 

(SELECT  convenios.condiciones_old.clte_codigo FROM convenios.condiciones_old WHERE convenios.condiciones_old.clte_codigo=convenios.view_clientes.clte_codigo LIMIT 1) as c,
(SELECT  convenios.condiciones.clte_codigo FROM convenios.condiciones WHERE convenios.view_clientes.clte_codigo = convenios.condiciones.clte_codigo LIMIT 1) as d,

convenios.view_clientes.nit, convenios.view_clientes.nombre, convenios.view_clientes.clte_cod_ppal, convenios.view_clientes.razon, convenios.view_clientes.clte_codigo 
FROM convenios.view_clientes 
WHERE $input = " . "'" . $where . "'" . " LIMIT 10 offset $page";
//
//echo $sql;
//exit();

      return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
