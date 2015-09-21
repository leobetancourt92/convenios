<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of clienteBaseTableClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class clienteBaseTableClass extends tableBaseClass {
    /*
     * atributos de la tabla usuario utilizados como constantes
     */

    //const ID = 'usr_codigo';
    const NIT = 'nit';
    const RAZON_SOCIAL = 'razon';
    const RAZON_SOCIAL_LENGTH = 200;
    const CLIENTE_CODIGO = 'clte_codigo';
    const CLIENTE_CODIGO_LENGTH = 20;
    const CODIGO_PLAN = 'clte_cod_ppal';
    const CODIGO_PLAN_LENGTH = 20;
    const NOMBRE_PLAN = 'nombre';
    const NOMBRE_PLAN_LENGTH = 200;
    const SEDES_ATENCION = 'ciudad_cod';
    const SEDES_ATENCION_LENGTH = 10;
    const ACTIVED = 'activo';
    const CLASE_CLIENTE = 'clasclte_cod';
    const CLASE_CLIENTE_LENGTH = 1;
    const COD_TIPO_PACIENTE = 'tipopa_cod';
    const COD_TIPO_PACIENTE_LENGTH = 2;
    const COD_TIPO_DESCUENTO ='tipodcto_cod';
    const COD_TIPO_DESCUENTO_LENGTH = 5;
    const FECHA_INGRESO ='fecha_ingreso';
    const SUFIJO_NIT = 'nitsu';
    const SUFIJO_NIT_LENGTH = 10;
    const FILIAL='filial';
    const FILIAL_LENGTH=10;
    const COPAGO = 'copago';
    const CARNET = 'n_carnet';
    const TELEFONO ='telefono';
    const EMAIL_WEB='email_web';
    const IMAGENES='foto';
    
    
    /*
     * campos booleanos
     */
    
    
    
    const BOOL_CARNET='oblicarnet'; 
    const NOMBRE_AFILIADO_PRINCIPAL='oblisocio';
    const TELEFONO_AFILIADO_PRINCIPAL='ablisotel';
    const CONTROL_MEDICOS_ADSCRITOS='oblimedi';
    const FACTURA_UNITARIA='si_facuni';
    const CONTROL_PAGO_PACIENTE='si_contcopa';
    const CONTROL_SALDOS='si_consaldos';
    const CONTROL_AUTORIZACION='si_autoriza';
    const CONTROL_CUPO='si_contcupo';
    const CONTROL_FACTURACION_PESOS='si_confacpesos';
    const CONTROL_FACTURACION_CANTIDAD='si_confaccanti';
    const NUMERODOR_POR_SEDE='si_numsede';
    const NUMERO_CEDULA_AFILIADO='si_numsedafi';
    const MODIFICA_PAGO_PACIENTES='si_modpagpac';
    const IMP_EXAM_EN_CERO='si_impexam0';
    const CONTROL_NUM_AUTO_EXAM='si_autoxexa';
    const CONTROL_NUM_CITA_EXAM='si_connumcita';
    const PRECIOS_POR_EXAMEN='si_band01';
    const PREMITE_COTIZAR='si_band02';
    const DOC_RECEP_COND='si_band03';
    const VAL_NUM_AUTO='si_band04';
    const SUBPLAN='si_band05';
    
    
    /*
     * EL CAMPO DE OBSERVACIONES EN LA BD WINSISLAB
     */    
      
    const OBSERVACIONES='notas';       


    
    
    
    
    /**
     * Método para obtener el nombre del campo más la tabla ya sea en formato
     * DB (.) o en formato HTML (_)
     *
     * @param string $field Nombre del campo
     * @param string $html [optional] Por defecto traerá el nombre del campo en
     * versión DB
     * @return string
     */
    public static function getNameField($field, $html = false, $table = null) {
        return parent::getNameField($field, self::getNameTable(), $html);
    }

    /**
     * Obtiene el nombre de la tabla
     * @return string
     */
    public static function getNameTable() {
        return 'clientes';
    }

    /**
     * Método para borrar un registro de una tabla X en la base de datos
     *
     * @param array $ids Array con los campos por posiciones
     * asociativas y los valores por valores a tener en cuenta para el borrado.
     * Ejemplo $fieldsAndValues['id'] = 1
     * @param boolean $deletedLogical [optional] Borrado lógico [por defecto] o
     * borrado físico de un registro en una tabla de la base de datos
     * @return PDOException|boolean
     */
    public static function delete($ids, $deletedLogical = false, $table = null) {
        return parent::delete($ids, $deletedLogical, self::getNameTable());
    }

    /**
     * Método para insertar en una tabla usuario
     *
     * @param array $data Array asociativo donde las claves son los nombres de
     * los campos y su valor sería el valor a insertar. Ejemplo:
     * $data['nombre'] = 'Erika'; $data['apellido'] = 'Galindo';
     * @return PDOException|boolean
     */
    public static function insert($data, $table = null) {
        return parent::insert(self::getNameTable(), $data);
    }

    /**
     * Método para leer todos los registros de una tabla
     *
     * @param array $fields Array con los nombres de los campos a solicitar
     * @param boolean $deletedLogical [optional] Indicación de borrado lógico
     * o borrado físico
     * @param array $orderBy [optional] Array con el o los nombres de los campos
     * por los cuales se ordenará la consulta
     * @param string $order [optional] Forma de ordenar la consulta
     * (por defecto NULL), pude ser ASC o DESC
     * @param integer $limit [optional] Cantidad de resultados a mostrar
     * @param integer $offset [optional] Página solicitadad sobre la cantidad
     * de datos a mostrar
     * @param array $where
     * @return mixed una instancia de una clase estandar, la cual tendrá como
     * variables publica los nombres de las columnas de la consulta o una
     * instancia de \PDOException en caso de fracaso.
     */
    public static function getAll($fields, $deletedLogical = true, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $table = null) {
        return parent::getAll(self::getNameTable(), $fields, $deletedLogical, $orderBy, $order, $limit, $offset, $where);
    }

    /**
     * Método para actualizar un registro en una tabla de una base de datos
     *
     * @param array $ids Array asociativo con las posiciones por nombres de los
     * campos y los valores son quienes serían las llaves a buscar.
     * @param array $data Array asociativo con los datos a modificar,
     * las posiciones por nombres de las columnas con los valores por los nuevos
     * datos a escribir
     * @return PDOException|boolean
     */
    public static function update($ids, $data, $table = null) {
        return parent::update($ids, $data, self::getNameTable());
    }

}
