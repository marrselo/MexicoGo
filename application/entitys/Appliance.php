<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_Appliance extends CST_Entity 
{
    
    protected $_app_id;
    public $_app_name;

    
    public function __construct()
    {
        $this->_modelAppliances = new Application_Model_Appliances();
        
    }    
    
    private function setArrayBd(){        
        
        $data['app_name']=$this->_app_name;
        return $data;
    }
    
    public function createAppliances()
    {
        $data = $this->setArrayBd();        
        $this->_modelAppliances->insert($data);
    }
    
    static function listAppliances()
    {
        return $this->_modelAppliances->listing();
    }
    
    public function editAppliances($data)
    {
        $this->_modelAppliances->update($data);
    }
        
    public function deleteAppliances($id)
    {
        $this->_modelAppliances->deleteFeatures($id);
    }
}
