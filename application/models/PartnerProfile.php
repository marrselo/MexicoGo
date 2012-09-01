<?php

class Application_Model_PartnerProfile extends CST_Model {

    private $_modelPartnerProfile;

    function __construct() {
        $this->_modelPartnerProfile = new Application_Model_TableBase_PartnerProfile();
    }

    function insert($data)
    {
        if ($this->_modelPartnerProfile->insert($data)) {
            return $this->_modelPartnerProfile
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getProfiler($id) 
    {
        return $this->_modelPartnerProfile
                        ->select()
                        ->where('par_id = ?', $id)
                        ->query()
                        ->fetch();
    }

    function updateProfiler($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelPartnerProfile->getAdapter()->quoteInto('par_id = ?', $id);
            $this->_modelPartnerProfile->update($data, $where);
        } else {
            return false;
        }
    }
}

