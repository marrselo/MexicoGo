<?php
/**
 * Description of Properties
 *
 * @author marrselo
 */
class Application_Model_Properties extends CST_Model {
    
    protected $_modelProperties;

    function __construct() {
        $this->_modelProperties = new Application_Model_TableBase_Properties();
    }

    function insert($data)
    {
        if ($this->_modelProperties->insert($data)) {
            return $this->_modelAmenities
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getAgents($id) 
    {
        return $this->_modelProperties
                        ->select()
                        ->where('ame_id = ?', $id)
                        ->query()
                        ->fetch();
    }
    
    public function listing($age_id)
    {    	
        return $this->_modelProperties->select()
               ->where('par_id = ?',$age_id)
               ->order('ame_id DESC')
               ->query()
               ->fetchAll();
    }
            
    function edit($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelProperties->getAdapter()
                ->quoteInto('ame_id = ?', $id);
            $this->_modelProperties->update($data, $where);
        }else{
            return false;
        }
    }            
    
}