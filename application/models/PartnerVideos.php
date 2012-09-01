<?php

class Application_Model_PartnerVideos extends CST_Model {

    private $_modelPartnerVideos;

    function __construct() {
        $this->_modelPartnerVideos = new Application_Model_TableBase_PartnerVideos();
    }

    function insert($data)
    {
        if ($this->_modelPartnerVideos->insert($data)) {
            return $this->_modelPartnerVideos
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getVideo($id) 
    {
        return $this->_modelPartnerVideos
                        ->select()
                        ->where('par_id = ?', $id)
                        ->query()
                        ->fetch();
    }

    function deleteVideo($idVideo){
        $where = $this->_modelPartnerVideos->getAdapter()->quoteInto('vid_id = ?', $id);
        return $this->_modelPartnerVideos->delete($where);
    }
    
    function updateVideo($id,$source,$data)
    {
        if ($id != '' && $data != '') {
            $where[] = $this->_modelPartnerVideos->getAdapter()->quoteInto('par_id = ?', $id);
            $where[] = $this->_modelPartnerVideos->getAdapter()->quoteInto('vid_source = ?', $source);
            $this->_modelPartnerVideos->update($data, $where);
        } else {
            return false;
        }
    }
}

