<?php

class Application_Model_PropertyView extends CST_Model {

    protected $_modelPropertyView;

    function __construct() {
        $this->_modelPropertyView = new Application_Model_TableBase_PropertyView();
    }

    function insert($data)
    {
        if ($this->_modelPropertyView->insert($data)) {
            return $this->_modelPropertyView
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }
    
    function listingPropertyView(){
        return $this->_modelPropertyView
                ->select()
                ->query()
                ->fetchAll();
    }

    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelPropertyView->getAdapter()->quoteInto('property_style_id = ?', $id);
            $this->_modelPropertyView->update($data, $where);
        } else {
            return false;
        }
    }
    
    
        }

