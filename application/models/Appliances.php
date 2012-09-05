<?php
/**
 * Description of Properties
 *
 * @author marrselo
 */
class Application_Model_Appliances extends CST_Model {
    
    protected $_modelAppliances;

    function __construct() {
        $this->_modelAppliances = new Application_Model_TableBase_Appliances();
    }

    function insert($data)
    {
        if ($this->_modelAppliances->insert($data)) {
            return $this->_modelAppliances
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getAppliances($id) 
    {
        return $this->_modelAppliances
                        ->select()
                        ->where('app_id = ?', $id)
                        ->query()
                        ->fetch();
    }
    
    public function listing()
    {    	
        return $this->_modelAppliances->select()
               ->order('app_id DESC')
               ->query()
               ->fetchAll();
    }
            
    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelAppliances->getAdapter()
                ->quoteInto('app_id = ?', $id);
            $this->_modelAppliances->update($data, $where);
        }else{
            return false;
        }
    }            
    
}

?>
