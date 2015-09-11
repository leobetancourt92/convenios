<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of clienteTableClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class clienteTableClass extends clienteBaseTableClass {
  

    /*
     * funcion estatica para estructurar un paginador en la vista de los clientes
     */
    
     public static function getTotalPages($lines,$where) {
    try {
      $sql = 'SELECT count(' . clienteTableClass::CLIENTE_CODIGO . ') AS cantidad '
              . 'FROM ' . clienteTableClass::getNameTable() .' WHERE ' . clienteTableClass::CLIENTE_CODIGO . ' IS NOT NULL ';
             

    if (is_array($where) === true) {
        foreach ($where as $field => $value) {
          if (is_array($value)) {

            $sql = $sql . ' AND ' . $field . ' BETWEEN ' . ((is_numeric($value[0])) ? $value[0] : "'$value[0]'") . ' AND ' . ((is_numeric($value[1])) ? $value[1] : "'$value[1]'") . ' ';
          } else {
            $sql = $sql . ' AND ' . $field . ' = ' . "'".$value."'";
          }
        }
      }
     //echo $sql;
      //exit();

      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad / $lines);
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
    
    
    
    
    
    
}
