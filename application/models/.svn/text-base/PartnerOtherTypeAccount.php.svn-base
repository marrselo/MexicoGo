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
class Application_Model_PartnerOtherTypeAccount extends CST_Model {

    //put your code here
    private $_modelOtherAcountType;

    function __construct() {
        $this->_modelOtherAcountType = new 
                Application_Model_TableBase_PartnerOtherTypeAccount();
    }

    function listingsPartnersAcountType() {
        return $this->_modelOtherAcountType
                ->select()
                ->from($this->_modelOtherAcountType->getName(),
                        array('par_other_type_account_id',
                            'par_other_type_account_name'))
                ->order('par_other_type_account_name')
                ->query()
                ->fetchAll();
        
    }
    
}

?>
