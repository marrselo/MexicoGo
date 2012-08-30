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
class Application_Entity_PartnertBrokerages extends Application_Entity_Partnert {
    /* entidades publicas */
    
    function registerPlans(){
        
    }
    static function listingsPackagesInformative() {
        $modelPackageInformative = new Application_Model_Partners();
        return $modelPackageInformative->listingsPackagesInformativeBrokerAgent();
    }
    static function getPackagesInformative($idPackage){
        $modelPackageInformative = new Application_Model_Partners();
        return $modelPackageInformative->getPackagesInformativeBrokerAgent($idPackage);
    }
}

?>
