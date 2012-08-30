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
class Application_Entity_Parametros extends CST_Entity {
    //put your code here
    const PRICEFEATURESINGLEPARTNER = 'PriceFeatureListingsSinglePartner';
    private $_modelParametros;
    function __construct($data = null) {
        if($data != null){
            parent::init($data);
        }
        $this->_modelParametros = new Application_Model_Parametros();
    }
    static function getParamValue($value){
        $modelParametros = new Application_Model_Parametros();
        return $modelParametros->getParamValue($value);
    }
}

?>
