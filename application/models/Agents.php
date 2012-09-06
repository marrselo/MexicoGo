<?php

class Application_Model_Agents extends CST_Model {

    protected $_modelAgents;

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
    
    public function listAgents($idPartner)
    {    	
        return $this->_modelAgents->select()
               ->where('par_id = ?',$idPartner)
               ->order('age_public DESC')
               ->query()
               ->fetchAll();
    }
    public function listAgentsStatePublic($idPartner,$statePublic)
    {    	
        return $this->_modelAgents->select()
               ->where('par_id = ?',$idPartner)
               ->where('age_public = ?',$statePublic)
               ->query()
               ->fetchAll();
        
    }
    public function deleteAgent($idAgent)
    {
        if(!empty($idAgent))
        {
            $where = $this->_modelAgents->getAdapter()
                ->quoteInto('par_id =?',$idAgent);
            $data = array('age_state'=>'0');
            $this->_modelAgents->update($data,$where);
        }else{
            return false;
        }
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
    
    public function publishAgent($id,$flag)
    {        
        if(!empty($id)){
            $where = $this->_modelAgents->getAdapter()->quoteInto('age_id = ?',$id);
            $data = array('age_public'=>"$flag");
            $this->_modelAgents->update($data,$where);
        }else{            
            return false;
        }        
    }

}

