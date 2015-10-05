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

}
