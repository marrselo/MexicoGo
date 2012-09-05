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
        $this->_modelPropertiesFiles = new Application_Model_TableBase_PropertyFiles();
    }

    function insert($data)
    {
        if ($this->_modelProperties->insert($data)) {
            return $this->_modelProperties
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
                ->quoteInto('pro_id = ?', $id);
            $this->_modelProperties->update($data, $where);
        }else{
            return false;
        }
    }          
    
    function insertPropertyesFile($data){
        return $this->_modelPropertiesFiles->insert($data);
    }
    function getFileSource($title){
        $where = $this->_modelPropertiesFiles
                ->getAdapter()
                ->quoteInto('fil_source = ?', $title);
        return $this->_modelPropertiesFiles->select()
                ->where($where)
                ->query()
                ->fetch();
    }
    function updatePropertyesFile(){
        $this->_modelPropertiesFiles->update($data, $where);
    }
}