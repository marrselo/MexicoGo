<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_Feature extends CST_Entity 
{
    
    protected $_fea_id;
    public $_fea_nfea;

    
    public function __construct()
    {
        $this->_modelFeatures = new Application_Model_Features();
        
    }    
    
    private function setArrayBd(){        
        
        $data['fea_nfea']=$this->_fea_nfea;
        return $data;
    }
    
    public function createFeatures()
    {
        $data = $this->setArrayBd();        
        $this->_modelFeatures->insert($data);
    }
    
    static function listFeatures()
    {
        $model = new Application_Model_Features();
        return $model->listing();
    }
    
    public function editFeatures($data)
    {
        $this->_modelFeatures->update($data);
    }
        
    public function deleteFeatures($id)
    {
        $this->_modelFeatures->deleteFeatures($id);
    }
}
