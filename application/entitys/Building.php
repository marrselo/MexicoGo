<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_Building extends CST_Entity 
{
    
    protected $_bui_id;
    public $_bui_name;

    
    public function __construct()
    {
        $this->_modelBuildings = new Application_Model_Buildings();
        
    }    
    
    private function setArrayBd(){        
        
        $data['bui_name']=$this->_bui_name;
        return $data;
    }
    
    public function createBuildings()
    {
        $data = $this->setArrayBd();        
        $this->_modelBuildings->insert($data);
    }
    
    static function listBuildings()
    {
        $model = new Application_Model_Buildings();
        return $model->listing();
    }
    
    public function editBuildings($data)
    {
        $this->_modelBuildings->update($data);
    }
        
    public function deleteBuildings($id)
    {
        $this->_modelBuildings->deleteFeatures($id);
    }
}
