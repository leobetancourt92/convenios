<?php

use mvc\model\table\tableBaseClass;
  
/**
 * Description of condicionesBaseTableClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class condicionesBaseTableClass extends tableBaseClass {
    /*
     * atributos de la tabla usuario utilizados como constantes
     */

    const ID = 'Id';
    const CODIGO_CLIENTE='clte_codigo';
    //const TELEFONO_AUTORIZACION='autorizacion_telefono';
    const HISTORIA_CLINICA='historia_clinica';
    const FIRMA_PACIENTE='firma_paciente';
    const COPIA_RESULTADO='copia_resultado';
    const FORMATO_NO_POS='formato_nopos';
    const ID_UNIDAD_NEGOCIO='id_unidad_negocio';
    const IMAGEN_UNO='imagenuno';
    const IMAGEN_DOS='imagendos';
    const IMAGEN_TRES='imagentres';
    const IMAGEN_CUATRO='imagencuatro';
    const IMAGEN_CINCO='imagencinco';
    const OBSERVACIONES='observacion';
    const COPAGO='copago';
    const ORDEN_MEDICA='orden_medica';
    const USUARIO_ID='usuario_id';
    const FECHA='fecha';
    const SEDES_ATENCION='sedes_atencion';
    const FECHA_VENCIMIENTO='fecha_vencimiento';
  // campos nuevo de autorizacion  
    const TELEFONO_AUTORIZACION='tel_autorizacion';
    const WEB_AUTORIZACION='web_autorizacion';
    const AUTORIZACION_IMPRESA='autorizacion_impresa';
    const MEDICO_ADSCRITO='medico_adscrito';
            


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
        return 'convenios.condiciones';
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
    public static function getAll($fields, $deletedLogical = false, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $table = null) {
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
