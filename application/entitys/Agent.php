<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_Agent extends CST_Entity 
{
    
    protected $_idPartner;
    protected $_modelAgents;
    protected $_idAgent;
    public $_agePhoto;
    public $_ageFirstName;
    public $_ageLastName;
    public $_ageEmail;
    public $_ageWebsite;
    public $_ageBrokerage;
    public $_ageProfileDsc;
    public $_agePhone;
    public $_ageMobilePhone;
    
    
    public function __construct($idPartner)
    {
        $this->_modelAgents = new Application_Model_Agents();
        $this->_idPartner = $idPartner;        
    }    
    
    private function setArrayBd(){        
        
        $data['age_photo']=$this->_agePhoto;
        $data['age_first_name']=$this->_ageFirstName;
        $data['age_last_name'] = $this->_ageLastName;
        $data['age_email']= $this->_ageEmail;
        $data['age_website']= $this->_ageWebsite;
        $data['age_brokerage'] = $this->_ageBrokerage;
        $data['age_profile_dsc'] = $this->_ageProfileDsc;
        $data['age_phone'] = $this->_agePhone;
        $data['age_mobile_phone'] = $this->_ageMobilePhone;
        $data['par_id'] = $this->_idPartner;
        return $data;
    }
    
    public function createAgents()
    {
        $data = $this->setArrayBd();
        $data['par_id'] = $this->_idPartner;
        $this->_modelAgents->insert($data);
    }
    
    public function listAgents()
    {
        return $this->_modelAgents->listAgents($this->_idPartner);
    }
    
    public function editAgents($data)
    {
        $this->_modelAgents->update($this->_idPartner,$data);
    }
        
    public function deleteAgents($idAgent)
    {
        $this->_modelAgents->deleteAgent($idAgent);
    }
    public function listAgentsState($statePublic)
    {        
        return $this->_modelAgents->listAgentsStatePublic($this->_idPartner,$statePublic);
    }
    
    public function publish($id,$flag)
    {
        $this->_modelAgents->publishAgent($id,$flag);
    }
}
