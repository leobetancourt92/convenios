<?php

use mvc\model\modelClass;
use mvc\config\configClass;

/**
 * Description of usuarioTableClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class usuarioTableClass extends usuarioBaseTableClass {

  public static function getCountPages() {
    try {
      // SELECT COUNT(id) FROM usuario
      $sql = 'SELECT COUNT(' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ') AS cantidad'
              . ' FROM ' . usuarioTableClass::getNameTable();
      $answer = modelClass::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return ceil($answer[0]->cantidad / configClass::getRowGrid());
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function getUsuarioById($id) {
    try {
      $sql = 'SELECT '
              . usuarioTableClass::getNameField(usuarioTableClass::ID) . ', '
              . usuarioTableClass::getNameField(usuarioTableClass::USER) . ', '
              . usuarioTableClass::getNameField(usuarioTableClass::ACTIVED) . ', '
              . usuarioTableClass::getNameField(usuarioTableClass::CREATED_AT) . ', '
              . usuarioTableClass::getNameField(usuarioTableClass::LAST_LOGIN_AT)
              . ' FROM ' . usuarioTableClass::getNameTable()
              . ' WHERE ' . usuarioTableClass::ID . ' = :id';
      $params = array(':id' => $id);
      $answer = modelClass::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) === 0) ? false : $answer[0];
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
