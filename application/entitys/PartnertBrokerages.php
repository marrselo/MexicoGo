<?php

class Application_Entity_PartnertBrokerages extends Application_Entity_PartnertEnterprises{
    /* entidades publicas */
    //protected $_partnertEnterprises;
    public $_ageId; 
    public $_parId;
    public $_agePhoto;
    public $_ageFirstName;
    public $_ageLastName;
    public $_ageEmail;
    public $_ageWebsite;
    public $_ageBrokerage;
    public $_ageProfileDsc;
    public $_agePhone;
    public $_ageMobilePhone;
    protected $_modelAgents;
    protected $_idPartner;
    
    
    
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
