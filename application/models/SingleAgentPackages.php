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
class Application_Model_SingleAgentPackages extends CST_Model {

    //put your code here
    private $_modelSingleAgentPackages;

    function __construct() {
        $this->_modelSingleAgentPackages = new Application_Model_TableBase_SingleAgentPackages();
    }
    
    function listingsSingleAgentPackages() {
        return $this->_modelSingleAgentPackages
                ->select()
                ->query()
                ->fetchAll();
    }
    
}

?>
