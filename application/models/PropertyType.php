<?php

class Application_Model_PropertyType extends CST_Model {

    protected $_modelPropertyType;

    function __construct() {
        $this->_modelPropertyType = new Application_Model_TableBase_PropertyType();
    }

    function insert($data)
    {
        if ($this->_modelPropertyType->insert($data)) {
            return $this->_modelPropertyType
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }
    
    function listingPropertyType(){
        return $this->_modelPropertyType
                ->select()
                ->query()
                ->fetchAll();
    }

    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelPropertyType->getAdapter()->quoteInto('property_type_id = ?', $id);
            $this->_modelPropertyType->update($data, $where);
        } else {
            return false;
        }
    }
    
    
        }

