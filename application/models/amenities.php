<?php
/**
 * Description of Properties
 *
 * @author marrselo
 */
class Application_Model_Amenities extends CST_Model {
    
    protected $_modelAmenities;

    function __construct() {
        $this->_modelAmenities = new Application_Model_TableBase_Amenities();
    }

    function insert($data)
    {
        if ($this->_modelAmenities->insert($data)) {
            return $this->_modelAmenities
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getAgents($id) 
    {
        return $this->_modelAmenities
                        ->select()
                        ->where('ame_id = ?', $id)
                        ->query()
                        ->fetch();
    }
    
    public function listing()
    {    	
        return $this->_modelAmenities->select()               
               ->order('ame_id DESC')
               ->query()
               ->fetchAll();
    }
            
    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelAmenities->getAdapter()
                ->quoteInto('ame_id = ?', $id);
            $this->_modelAmenities->update($data, $where);
        }else{
            return false;
        }
    }            
    
}

?>
