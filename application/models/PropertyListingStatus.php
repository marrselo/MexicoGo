<?php
/**
 * Description of Properties
 *
 * @author marrselo
 */
class Application_Model_PropertyListingStatus extends CST_Model {
    
    protected $_modelPropertyListingStatus;

    function __construct() {
        $this->_modelPropertyListingStatus = new Application_Model_TableBase_PropertyListingStatus();
    }

    function insert($data)
    {
        if ($this->_modelPropertyListingStatus->insert($data)) {
            return $this->_modelPropertyListingStatus
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }
    
    function listingStatus(){
        return $this->_modelPropertyListingStatus
                ->select()
                ->query()
                ->fetchAll();
    }

    function update($id, $data)
    {
        if ($id != '' && $data != '') {
            $where = $this->_modelPropertyListingStatus->getAdapter()
                ->quoteInto('property_listing_status_id = ?', $id);
            $this->_modelPropertyListingStatus->update($data, $where);
        }else{
            return false;
        }
    }          

}