<?php

class Application_Entity_PartnertBrokerages extends Application_Entity_PartnertEnterprises{
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
