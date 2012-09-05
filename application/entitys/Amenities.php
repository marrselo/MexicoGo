<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_Amenities extends CST_Entity 
{
    
    protected $_ame_id;
    public $_ame_name;

    
    public function __construct()
    {
        $this->_modelAmenities = new Application_Model_Amenities();
        
    }    
    
    private function setArrayBd(){        
        
        $data['ame_name']=$this->_ame_name;
        return $data;
    }
    
    public function createAmenities()
    {
        $data = $this->setArrayBd();        
        $this->_modelAmenities->insert($data);
    }
    
    static function listAmenities()
    {
        $model = new Application_Model_Amenities();
        return $model->listing();
    }
    
    public function editAmenities($data)
    {
        $this->_modelAmenities->update($data);
    }
        
    public function deleteAmenities($id)
    {
        $this->_modelAmenities->deleteAgent($id);
    }
}
