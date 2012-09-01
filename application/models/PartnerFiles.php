<?php

class Application_Model_PartnerFiles extends CST_Model {

    private $_modelPartnerFile;

    function __construct() {
        $this->_modelPartnerFile = new Application_Model_TableBase_PartnerFiles();
    }

    function getFilePartner($idPartner){
        $where = $this->_modelPartnerFile
                ->getAdapter()
                ->quoteInto('par_id = ?', $idPartner);
        return $this->_modelPartnerFile->select()
                ->where($where)
                ->query()
                ->fetchAll();
    }
    function getFileSource($title) {
        $where = $this->_modelPartnerFile
                ->getAdapter()
                ->quoteInto('fil_source = ?', $title);
        return $this->_modelPartnerFile->select()
                ->where($where)
                ->query()
                ->fetch();
    }
    
    function insert($data)
    {
        if ($this->_modelPartnerFile->insert($data)) {
            return $this->_modelPartnerFile->getAdapter()->lastInsertId();
        } else {
            return false;
        }
    }
    function update($id,$data){
        $where = $this->_modelPartnerFile->getAdapter()->quoteInto('fil_id = ?', $id);
        $this->_modelPartnerFile->update($data, $where);
    }

    

}

