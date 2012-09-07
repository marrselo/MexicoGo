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
class Application_Model_SetInfoAbaut extends CST_Model {

    //put your code here
    private $_modelSetInfoAbaut;
    private $_modelSetInfoAbautUsuario;

    function __construct() {
        $this->_modelSetInfoAbaut = new Application_Model_TableBase_CoreSetInfoAbaut();
        $this->_modelSetInfoAbautUsuario = new Application_Model_TableBase_CoreSetInfoAbautUsuario();
    }

    function insertInfoAbautUsuario($data) {
        return $this->_modelSetInfoAbautUsuario->insert($data);
    }
    
    function deleteInfoAbautUsuario($idUsuario,$idAbaut=''){
        
        if($idAbaut!=''){
            $where[] = $this->_modelSetInfoAbautUsuario->getAdapter()->quoteInto('usu_id =?', $idUsuario);
            $where[] = $this->_modelSetInfoAbautUsuario->getAdapter()->quoteInto('core_set_info_abaut_id =?', $idAbaut);
        }else{
            $where = $this->_modelSetInfoAbautUsuario->getAdapter()->quoteInto('usu_id =?', $idUsuario);
        }
        
        $this->_modelSetInfoAbautUsuario->delete($where);
    }
    
    function getInfoAbautUser($idUsuario,$idInfoAbaut=''){
        
        $result = $this->_modelSetInfoAbautUsuario->select()
                ->from($this->_modelSetInfoAbautUsuario->getName(),array('core_set_info_abaut_id','core_set_info_abaut_usuario_id'))
                ->where('usu_id =?',$idUsuario);
        if($idInfoAbaut!=''){
            $result = $result->where('core_set_info_abaut_id =?',$idInfoAbaut)
                    ->query()
                    ->fetch();
        } else {
            $result = $result->query()->fetchAll();
        }
        
        return $result;
                
    }
    function getAllInfoAbaut(){
        return $this->_modelSetInfoAbaut->select()
                ->query()
                ->fetchAll();
    }
    

}

?>
