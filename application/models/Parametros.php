<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parametros
 *
 * @author Laptop
 */
class Application_Model_Parametros extends CST_Model {
    
    private $_modelCoreParametros;
    
    function __construct() {
        $this->_modelCoreParametros = new Application_Model_TableBase_CoreParametros();
    }
    
    function getParamValue($slug){
        $sql = $this->_modelCoreParametros->select()
                ->from($this->_modelCoreParametros->getName(),
                        'core_parametros_valor')
                ->where('core_parametros_slug =? ',$slug);
        return $this->_modelCoreParametros->getAdapter()->fetchOne($sql);
    }
    
    //put your code here
}

?>
