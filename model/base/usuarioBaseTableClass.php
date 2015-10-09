<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of usuarioBaseTableClass
 *
 * @author Leonardo Betancourt <leobetacai@gmail.com>
 */
class usuarioBaseTableClass extends tableBaseClass {

  protected $id;
  protected $user;
  protected $password;
  protected $actived;
  protected $last_login_at;
  protected $created_at;
  protected $updated_at;
  protected $deleted_at;
  protected static $package;

  /*
   * atributos de la tabla usuario utilizados como constantes
   */
  
  
  
  //const ID = 'usr_codigo';
  const USER = 'usr_codigo';
  const USER_LENGTH = 80;
  const PASSWORD = 'clavemd5';
  const PASSWORD_LENGTH = 32;
  const NOMBRE_COMPLETO = 'nombre_completo';
  const NOMBRE_COMPLETO_LENGTH = 200;
  const DIRECCION = 'direccion';
  const DIRECCION_LENGTH = 100;
  const CODIGO_CIUDAD = 'ciudad_cod';
  const CODIGO_CIUDAD_LENGTH = 10;
  const TELEFONO= 'telefono';
  const TELEFONO_LENGTH = 40;
  const EMAIL = 'email';
  const EMAIL_LENGTH = 200;
  const FAX = 'fax';
  const FAX_LENGTH = 40;
  const CELULAR = 'celular';
  const CELULAR_LENGTH = 40;
  const TAX_PROF= 'tax_prof';
  const TAX_PROF_LENGTH = 40;
  const TIPODCTO_COD= 'tipodcto_doc';
  const TIPODCTO_COD_LENGTH = 5;
  const DOCUMENTO = 'documento';
  const DOCUMENTO_LENGTH = 40;
  const GRUPO_COD = 'grupo_cod';
  const GRUPO_COD_LENGTH = 10;
  const FECHA_NACIMIENTO = 'nacio';
  const PROFESION = 'profesion';
  const PROFESION_LENGTH = 100;
  const FECHA_INGRESO = 'fecha_ingreso';
  const HORA_INGRESO = 'hora_ingreso';
  const HORA_INGRESO_LENGTH = 6;
  const INICIALES = 'iniciales';
  const INICIALES_LENGTH = 10;
  const JERARQUIA = 'jerarquia';
  const JERARQUIA_LENGTH = 1;
  const CUENTA_CON = 'cuenta_con';
  const CUENTA_CON_LENGTH = 36;
  const LIBC2 = 'libc2';
  const LIBC2_LENGTH = 36;
  const LIBRE1 = 'libre1';
  const LIBRE1_LENGTH = 36;
  const LIBRE2 = 'libre2';
  const LIBRE2_LENGTH = 36;
  const IDIOMA_USUARIO = 'usr_idioma';
  const IDIOMA_USUARIO_LENGTH = 2;
  const FOTO = 'foto';
  const FIRMA = 'firma';
  const HUELLA = 'huella';
  const AUTORIZA_DESTOS = 'autorizadestos';
  const BANDERA1 = 'bandera1';
  const BANDERA2 = 'bandera2';
  const CLAVE_MD5 = 'clavemd5';
  
  
  
  const ACTIVED = 'activo';
  const LAST_LOGIN_AT = 'last_login_at';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  const DELETED_AT = 'deleted_at';

  public function getLastLoginAt() {
    return $this->last_login_at;
  }

  public function setLastLoginAt($last_login_at) {
    $this->last_login_at = $last_login_at;
    return $this;
  }

  public function getId() {
    return $this->id;
  }

  public function getUser() {
    return $this->user;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getActived() {
    return $this->actived;
  }

  public function getCreatedAt() {
    return $this->created_at;
  }

  public function getUpdatedAt() {
    return $this->updated_at;
  }

  public function getDeletedAt() {
    return $this->deleted_at;
  }

  public static function getPackage() {
    return self::$package;
  }

  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  public function setUser($user) {
    $this->user = $user;
    return $this;
  }

  public function setPassword($password) {
    $this->password = $password;
    return $this;
  }

  public function setActived($actived) {
    $this->actived = $actived;
    return $this;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
    return $this;
  }

  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
    return $this;
  }

  public function setDeletedAt($deleted_at) {
    $this->deleted_at = $deleted_at;
    return $this;
  }

  public static function setPackage($package) {
    self::$package = $package;
    return self;
  }

  public function __construct($id = null, $usuario = null, $password = null, $estado = null, $last_login_at = null, $created_at = null, $updated_at = null, $deleted_at = null) {
    $this->id = $id;
    $this->user = $usuario;
    $this->password = $password;
    $this->actived = $estado;
    $this->last_login_at = $last_login_at;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
    $this->deleted_at = $deleted_at;
    self::$package = array(
        self::ID,
        self::USER,
        self::PASSWORD,
        self::LAST_LOGIN_AT,
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETED_AT
    );
  }

  public function __toString() {
    return $this->user;
  }

  public function __sleep() {
    return self::$package;
  }

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
    return 'web.usuarios_web';
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
  public static function delete($ids, $deletedLogical = true, $table = null) {
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
