<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  use mvc\model\modelClass as model;
/**
 * Description of medicoTableClass
 *
 * @author practicante_dokeos
 */
class medicoTableClass extends medicoBaseTableClass {

    //put your code here


    static public function getMedicos($cod_cliente) {



        try {

//            $sql = 'SELECT '.medicoTableClass::getNameField(medicoTableClass::CODIGO_MEDICO).' , '.medicoTableClass::getNameField(medicoTableClass::NOMBRE_MEDICO)
//                    .' FROM '.clienteMedicoTableClass::getNameTable().' , '.clienteTableClass::getNameTable().','.medicoTableClass::getNameTable().' WHERE '
//                    .clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO).' = '.clienteMedicoTableClass::getNameField(clienteMedicoTableClass::CODIGO_CLIENTE)
//                    .' AND '.clienteTableClass::getNameField(clienteTableClass::CLIENTE_CODIGO).' = '."'$cod_cliente'"
                    
                    $sql='SELECT convenios.view_medicos.medico_cod , convenios.view_medicos.nombre FROM convenios.view_medicos,convenios.view_empresa_medico natural  join convenios.view_clientes where convenios.view_medicos.medico_cod=convenios.view_empresa_medico.medico_cod and convenios.view_clientes.clte_codigo= '."'$cod_cliente'";
                    
            

            //echo $sql;
            //die();




            return model::getInstance()->query($sql)->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $exc) {
            throw $exc;
        }
    }

}
