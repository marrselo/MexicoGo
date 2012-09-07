<?php

class Application_Model_PartnerImages extends CST_Model {

    private $_modelPartnerImages;

    function __construct() {
        $this->_modelPartnerImages = new Application_Model_TableBase_PartnerImages();
    }

    function insert($data)
    {
        if ($this->_modelPartnerImages->insert($data)) {
            return $this->_modelPartnerImages
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getImage($id) 
    {
        return $this->_modelPartnerImages
                        ->select()
                        ->where('par_id = ?', $id)
                        ->query()
                        ->fetchAll();
    }

    function deleteImage($idImage){
        $where = $this->_modelPartnerImages->getAdapter()->quoteInto('img_id = ?', $idImage);
        return $this->_modelPartnerImages->delete($where);
    }
    
    function updateImage($id,$data)
    {
        if ($id != '' && $data != '') {
            $where[] = $this->_modelPartnerImages->getAdapter()->quoteInto('img_id = ?', $id);
            $this->_modelPartnerImages->update($data, $where);
        } else {
            return false;
        }
    }
}

