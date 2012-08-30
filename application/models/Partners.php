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
class Application_Model_Partners extends CST_Model {

    //put your code here
    private $_modelPartners;
    private $_modelPartnerPayment;

    function __construct() {
        $this->_modelPartners = new Application_Model_TableBase_Partners();
        $this->_modelPartnerPayment = new Application_Model_TableBase_PartnerPayment();
        $this->_modelPackageInformative = new Application_Model_TableBase_PartnerpartnerPackagesInformative();
    }

    function insert($data) {
        if ($this->_modelPartners->insert($data)) {
            return $this->_modelPartners
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }
    function getPartner($id){
        return $this->_modelPartners
                ->select()
                ->where('par_id = ?', $id)
                ->query()
                ->fetch();
    }

    function update($id, $data) {
        if ($id != '' && $data != '') {
            $where = $this->_modelPartners->getAdapter()->quoteInto('usu_id = ?', $id);
            return $this->_modelPartners->update($data, $where);
        } else {
            return false;
        }
    }
    function insertPayment($data){
        if ($this->_modelPartnerPayment->insert($data)) {
            return $this->_modelPartnerPayment
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }
    function updatePayment($data,$idPartner){
        $where = $this->_modelPartnerPayment->getAdapter()
                ->quoteInto('par_id = ?',$idPartner);
        if ($this->_modelPartnerPayment->update($data, $where)) {
            return $this->_modelPartnerPayment
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }
    function setPaymentDetails($idPartner){
        return $this->_modelPartnerPayment->select()
                ->where('par_id =? ',$idPartner)
                ->order('par_pay_id desc')
                ->query()
                ->fetch();
    }    
    
    function listingsPackagesInformativeBrokerAgent(){
        return $this->_modelPackageInformative->select()
                ->where('part_pack_infor_type = ?','BROKERAGE')
                ->query()
                ->fetchAll();
    }
    
    function listingsPackagesInformativePartnerShip(){
        return $this->_modelPackageInformative->select()
                ->where('part_pack_infor_type = ?','PARTNERSHIP')
                ->query()
                ->fetchAll();
    }
    function getPackagesInformativePartnerShip($id){
        return $this->_modelPackageInformative->select()
                ->where('part_pack_infor_type = ?','PARTNERSHIP')
                ->where('part_pack_infor_id = ?',$id)
                ->query()
                ->fetch();
    }
    function getPackagesInformativeBrokerAgent($id){
        return $this->_modelPackageInformative->select()
                ->where('part_pack_infor_type = ?','BROKERAGE')
                ->where('part_pack_infor_id = ?',$id)
                ->query()
                ->fetch();
    }

    

}

?>
