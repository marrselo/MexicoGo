<?php
/**
 * Description of Properties
 *
 * @author marrselo
 */
class Application_Model_Features extends CST_Model {
    
    protected $_modelFeatures;

    function __construct() {
        $this->_modelFeatures = new Application_Model_TableBase_Features();
    }

    function insert($data)
    {
        if ($this->_modelFeatures->insert($data)) {
            return $this->_modelFeatures
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getFeatures($id) 
    {
        return $this->_modelFeatures
                        ->select()
                        ->where('fea_id = ?', $id)
                        ->query()
                        ->fetch();
    }
    
    public function listing()
    {    	
        return $this->_modelFeatures->select()               
               ->order('fea_id DESC')
               ->query()
               ->fetchAll();
    }
            
    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelFeatures->getAdapter()
                ->quoteInto('fea_id = ?', $id);
            $this->_modelFeatures->update($data, $where);
        }else{
            return false;
        }
    }            
    
}

?>
