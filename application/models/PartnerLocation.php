<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author Laptop
 */
class Application_Model_PartnerLocation extends CST_Model {

    //put your code here
    private $_modelPartnerLocation;
    

    function __construct() {
        $this->_modelPartnerLocation = new Application_Model_TableBase_PartnerLocation();
    }
    
    function insert($data) {
        if($this->_modelPartnerLocation->insert($data)){
            return $this->_modelPartnerLocation
                    ->getAdapter()
                    ->lastInsertId();
        }else{
            return FALSE;
        }
    }
    function update($data,$id) {
        $where = $this->_modelPartnerLocation->getAdapter()->quoteInto('par_id', $id);
       return $this->_modelPartnerLocation->update($data, $where);
    }
    function getProfilerPartner($idPartner){
        return $this->_modelPartnerLocation
                ->select()
                ->where('par_id = ?',$idPartner)
                ->query()
                ->fetch();
    }
}

?>
