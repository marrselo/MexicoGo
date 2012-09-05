<?php
/**
 * Description of Properties
 *
 * @author marrselo
 */
class Application_Model_Buildings extends CST_Model {
    
    protected $_modelBuildings;

    function __construct() {
        $this->_modelBuildings = new Application_Model_TableBase_Buildings();
    }

    function insert($data)
    {
        if ($this->_modelBuildings->insert($data)) {
            return $this->_modelBuildings
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getBuildings($id) 
    {
        return $this->_modelBuildings
                        ->select()
                        ->where('bui_id = ?', $id)
                        ->query()
                        ->fetch();
    }
    
    public function listing()
    {    	
        return $this->_modelBuildings->select()               
               ->order('bui_ids DESC')
               ->query()
               ->fetchAll();
    }
            
    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelBuildings->getAdapter()
                ->quoteInto('bui_id = ?', $id);
            $this->_modelBuildings->update($data, $where);
        }else{
            return false;
        }
    }            
    
}

?>
