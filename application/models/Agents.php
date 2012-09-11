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
                        ->select()->setIntegrityCheck(false)  
                        ->from('agents')
                        ->JoinInner('agent_location','agent_location.age_id = agents.age_id')
                        ->JoinInner('regions','agent_location.reg_id = regions.reg_id',array('reg_name'))
                        ->JoinInner('core_ciudades','agent_location.cd_id = core_ciudades.cd_id',array('cd_nombre'))
                        ->JoinInner('partner_profile','agents.par_id = partner_profile.par_id',array('prof_website'))
                        ->where('agents.age_id = ?', $id)
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
    
    public function getSearchAgents($filter,$inner = null){
        $data = array();
        $select = $this->_modelAgents->select()->setIntegrityCheck(false);
        $select->from('agents',array('age_id','age_first_name','age_last_name','age_brokerage','age_profile_dsc'));
        $select->JoinInner('agent_location','agent_location.age_id = agents.age_id'); 
        $select->JoinInner('core_ciudades','core_ciudades.cd_id = agent_location.cd_id',array('cd_nombre')); 
        $select->JoinInner('regions','regions.reg_id = agent_location.reg_id',array('reg_name')); 
        //Si ocupa relacionar otra tabla
        if(!empty($inner)){
            $select->JoinInner($inner['tabla'],$inner['union'],$inner['campos']);
        }
        //Aigna las condiciones de los parametros
        foreach ($filter['query'] as $key => $val) {
            $select->where($val,$filter['fields'][$key]);
        }
        $select->group('age_first_name');
        //echo $select;die();
        try {
            $res = $this->_modelAgents->fetchAll($select);
            $data['data'] = $res->toArray();
            $data['status'] = 'ok';
        } catch (Exception $exc) {
            $data['msj'] = $exc->getMessage();
            $data['status'] = 'error'; 
        }

        return $data;
    }
    

}

