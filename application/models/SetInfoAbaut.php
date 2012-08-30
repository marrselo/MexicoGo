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
    
    function getInfoAbautUser($idUsuario,$idInfoAbaut){
        return $this->_modelSetInfoAbautUsuario->select()
                ->where('core_set_info_abaut_id =?',$idInfoAbaut)
                ->where('usu_id =?',$idUsuario)
                ->query()
                ->fetch();
                
    }
    function getAllInfoAbaut(){
        return $this->_modelSetInfoAbaut->select()
                ->query()
                ->fetchAll();
    }
    

}

?>
