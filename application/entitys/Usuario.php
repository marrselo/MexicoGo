<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Laptop
 */
class Application_Entity_Usuario extends CST_Entity {
    /* entidades publicas */

    public $_id;
    public $_rol;
    public $_nombreUsuario;
    public $_apellidosUsuario;
    public $_estado;
    //public $_genero;
    public $_login;
    public $_password;
    public $_telefono;
    public $_celular;
    public $_email;
    public $_avatar;
    public $_recibeOferta;
    /* entidades privadas */
    private $_modelUsuario;
    private $_modelSetInfoAbaut;

    function __construct($dataUsuario = null) {
        if ($dataUsuario != null) {
            parent::init($dataUsuario);
        }
        $this->_modelUsuario = new Application_Model_CoreUsuarios();
        $this->_modelSetInfoAbaut = new Application_Model_SetInfoAbaut();
    }

    function setArrayData() {
        $param['rol_id'] = $this->_rol;
        $param['usu_apellidos'] = $this->_apellidosUsuario;
        $param['usu_nombre'] = $this->_nombreUsuario;
        $param['usu_correo'] = $this->_email;
        $param['usu_nick'] = $this->_login;
        $param['usu_telefono'] = $this->_telefono;
        $param['usu_celular'] = $this->_celular;
        $param['usu_correo'] = $this->_email;
        $param['usu_img'] = $this->_avatar;
        $param['usu_id_estado'] = $this->_estado;
        $param['usu_contrasena'] = $this->_password;
        $param['usu_recibe_ofertas'] = $this->_recibeOferta;
        return $param;
    }

    function createUser() {
        $param = $this->setArrayData();
        $param['usu_creacion_fec'] = date('Y-m-d H:i:s');
        return $this->_modelUsuario->insert($param);
    }

    function editUser() {
        return $this->_modelUsuario->update($this->_id, $this->setArrayData());
    }

    function setProperties($dataUsuario) {
        parent::setProperties($dataUsuario);
        $this->_password = $this->encriptaPassword($this->_password);
    }

    function encriptaPassword($value) {
        $valueHash = hash('md5', $value);
        $value = rand(1, 1000) . '$$' . rand(1, 1000) . '$$' . $valueHash;
        return $value;
    }

    function setPassword($value) {
        return substr(strrchr($value, '$$'), 1);
    }

    function getValueSegurityPassword($value) {
        return substr($value, 0, strrpos($value, '$$')) . '$$';
    }

    function setIdentification($id) {
        $param = $this->_modelUsuario->getDataUsuario($id);
        $this->_id = $param['usu_id'];
        $this->_rol = $param['rol_id'];
        $this->_apellidosUsuario = $param['usu_apellidos'];
        $this->_nombreUsuario = $param['usu_nombre'];
        $this->_email = $param['usu_correo'];
        $this->_login = $param['usu_nick'];
        $this->_telefono = $param['usu_telefono'];
        $this->_celular = $param['usu_celular'];
        $this->_email = $param['usu_correo'];
        $this->_avatar = $param['usu_img'];
        $this->_estado = $param['usu_id_estado'];
        $this->_password = $param['usu_contrasena'];
        $this->_recibeOferta = $param['usu_recibe_ofertas'];
    }

    function autentificateUser($usuario, $password, $grupo) {
        $auth = Zend_Auth::getInstance();
        switch ($grupo) {
            case 1://solo para los partner 
                $adapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'),
                                'view_core_usuarios_partner',
                                'usu_nick',
                                'usu_contrasena');
                break;
            case 2://para otro tipo de usuario
                
                $adapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'),
                                'view_core_usuarios_partner',
                                'usu_nick',
                                'usu_contrasena');
                break;
            default:
                return false;
                break;
        }
        $adapter->setIdentity($usuario);
        $contrasenia = $this->getPassword($usuario);
        $valueSegurity = $this->getValueSegurityPassword($contrasenia);
        $password = $valueSegurity . $this->setPassword(
                        $this->encriptaPassword($password));
        $adapter->setCredential($password);
        $result = $auth->authenticate($adapter);
        if ($result->isValid()) {
            $data = $adapter->getResultRowObject(null, 'usu_contrasena');
            $auth->getStorage()->write($data);
            echo 'se registro';
            return TRUE;
        } else {
            echo 'no seregistro';
            return FALSE;
        }
    }

    protected function getPassword($usuario) {
        return $this->_modelUsuario->getpassword($usuario);
    }

    function insetInsertInfoAbaut($idInfoAbaut) {
        if (!$this->_modelSetInfoAbaut->getInfoAbautUser($this->_id, $idInfoAbaut)) {
            $data['core_set_info_abaut_id'] = $idInfoAbaut;
            $data['usu_id'] = $this->_id;
            $this->_modelSetInfoAbaut->insertInfoAbautUsuario($data);
        }
    }

}
