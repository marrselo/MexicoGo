<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author Laptop
 */
class Application_Model_CoreUsuarios extends CST_Model {

    //put your code here
    private $_modelCoreUsuarios;

    function __construct() {
        $this->_modelCoreUsuarios = new Application_Model_TableBase_CoreUsuarios();
    }

    function insert($data) {
        if ($this->_modelCoreUsuarios->insert($data)) {
            return $this->_modelCoreUsuarios
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function update($id, $data) {
        if ($id != '' && !empty ($data)) {
            $where = $this->_modelCoreUsuarios->getAdapter()->quoteInto('usu_id = ?', $id);
            return $this->_modelCoreUsuarios->update($data, $where);
        } else {
            return false;
        }
    }

    function getDataUsuario($id) {
        return $this->_modelCoreUsuarios
                        ->select()
                        ->where('usu_id =?',$id)
                        ->query()
                        ->fetch();
    }
    function getpassword($usuario){
        $sql = $this->_modelCoreUsuarios->select()
                ->from($this->_modelCoreUsuarios->getName(),
                        array('usu_contrasena'))
                ->where('usu_nick = ?',$usuario);
       return $this->_modelCoreUsuarios->getAdapter()->fetchOne($sql);
    }

}

?>
