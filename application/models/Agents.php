<?php

class Application_Model_Agents extends CST_Model {

    private $_modelAgents;

    function __construct() {
        $this->_modelAgents = new Application_Model_TableBase_Agents();
    }

    function insert($data)
    {
        if ($this->_modelAgents->insert($data)) {
            return $this->_modelAgents
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getAgents($id) 
    {
        return $this->_modelAgents
                        ->select()
                        ->where('age_id = ?', $id)
                        ->query()
                        ->fetch();
    }

    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelAgents->getAdapter()->quoteInto('age_id = ?', $id);
            $this->_modelAgents->update($data, $where);
        } else {
            return false;
        }
    }

    public function listAgents($idPartner)
    {    	
        return $this->_modelAgents->select()
               ->where('par_id = ?',$idPartner)
               ->query()
               ->fetchAll();
    }
    
    public function deleteAgent($idAgent)
    {
        if(!empty($idAgent))
        {
            $where = $this->_modelAgents->getAdapter()
                ->quoteInto('par_id =?',$idAgent);
            $this->_modelAgents->update('age_state = 0',$where);
        }else{
            return false;
        }
    }

}

