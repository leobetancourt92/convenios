<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of usuarioTableClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class usuarioTableClass extends usuarioBaseTableClass {

    public static function verifyUser($usuario, $password) {
        try {
            $sql = 'SELECT ' . credencialTableClass::getNameField(credencialTableClass::ID) . ' as credencial,
	' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' as usuario' .
                    ' FROM ' . usuarioTableClass::getNameTable() . //. ' LEFT JOIN ' . usuarioCredencialTableClass::getNameTable() . ' ON ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::USUARIO_ID) . '
                    ' LEFT JOIN ' . credencialTableClass::getNameTable() . ' ON ' . credencialTableClass::getNameField(credencialTableClass::ID) . ' = ' . usuarioTableClass::getNameField(usuarioTableClass::GRUPO_COD) . '
    WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::ACTIVED) . ' = :actived ' //. usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL
                    . ' AND ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' = :user
    AND ' . usuarioTableClass::getNameField(usuarioTableClass::PASSWORD) . ' = :pass';
            $params = array(
                ':user' => $usuario,
                ':pass' => md5($password),
                ':actived' => ((config::getDbDriver() === 'mysql') ? 1 : 't')
            );
            
            //echo $sql;
            //die();
            
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return (count($answer) > 0 ) ? $answer : false;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

    public static function setRegisterLastLoginAt($id) {
        try {
            $sql = 'UPDATE ' . usuarioTableClass::getNameTable() . '
              SET ' . usuarioTableClass::LAST_LOGIN_AT . ' = :last_login_at
              WHERE ' . usuarioTableClass::ID . ' = :id';
            $params = array(
                ':id' => $id,
                ':last_login_at' => date(config::getFormatTimestamp())
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            return true;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

}
