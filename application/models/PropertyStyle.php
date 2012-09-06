<?php

class Application_Model_PropertyStyle extends CST_Model {

    protected $_modelPropertyStyle;

    function __construct() {
        $this->_modelPropertyStyle = new Application_Model_TableBase_PropertyStyle();
    }

    function insert($data)
    {
        if ($this->_modelPropertyStyle->insert($data)) {
            return $this->_modelPropertyStyle
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }
    
    function listingPropertyStyle(){
        return $this->_modelPropertyStyle
                ->select()
                ->query()
                ->fetchAll();
    }

    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelPropertyStyle->getAdapter()->quoteInto('property_style_id = ?', $id);
            $this->_modelPropertyStyle->update($data, $where);
        } else {
            return false;
        }
    }
    
    
}

