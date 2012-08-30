<?php

class Application_Entity_PartnertRealState extends Application_Entity_PartnertEnterprises{
    /* entidades publicas */
    
    function registerPlans(){
        
    }
    static function listingsPackagesInformative(){
        $modelPackageInformative = new Application_Model_Partners();
        return $modelPackageInformative->listingsPackagesInformativePartnerShip();
    }
    
    static function getPackagesInformative($idPackage){
        $modelPackageInformative = new Application_Model_Partners();
        return $modelPackageInformative->getPackagesInformativePartnerShip($idPackage);
    }
}

?>
