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
class Application_Model_PartnersAcountType extends CST_Model {

    //put your code here
    private $_modelPartnersAcountType;

    function __construct() {
        $this->_modelPartnersAcountType = new Application_Model_TableBase_PartnersAcountType();
    }

    function listingsPartnersAcountType() {
        return $this->_modelPartnersAcountType
                ->select()
                ->from($this->_modelPartnersAcountType->getName(),array('part_acount_type_id','part_acount_type_nom'))
                ->query()
                ->fetchAll();
        
    }
    
}

?>
