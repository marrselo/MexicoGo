<?php
class Application_Entity_PartnertEnterprises extends CST_Entity
{

    /* entidades publicas */
   
    public function __construct()
    {
        $this->_modelAgents = new Application_Model_Agents();
        $this->_idPartner = $idPartner;
    }   
    
    private function setArrayBd(){        
        $data['par_id']=$this->_parId;
        $data['age_photo']=$this->_agePhoto;
        $data['age_first_name']=$this->_ageFirstName;
        $data['age_last_name'] = $this->_ageLastName;
        $data['age_email']= $this->_ageEmail;
        $data['age_website']= $this->_ageWebsite;
        $data['age_brokerage'] = $this->_ageBrokerage;
        $data['age_profile_dsc'] = $this->_ageProfileDsc;
        $data['age_phone'] = $this->_agePhone;
        $data['age_mobile_phone'] = $this->_ageMobilePhone;
        return $data;
    }
    
    public function createAgents()
    {
        $data = $this->setArrayBd();
        $this->_modelAgents->insert($data);
    }
    
    function registerPlans()
    {
        
    }
    
    function emailPreferences($newsletter,$other)
    {
        
    }
    
}
