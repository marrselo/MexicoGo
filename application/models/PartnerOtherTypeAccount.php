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
class Application_Model_PartnerOtherTypeAccount extends CST_Model {

    //put your code here
    private $_modelOtherAcountType;
    private $_modelPartnersSubcategoriesRel;

    function __construct() {
        $this->_modelOtherAcountType = new
                Application_Model_TableBase_PartnerOtherTypeAccount();
        $this->_modelPartnersSubcategoriesRel = new
                Application_Model_TableBase_PartnersSubcategoriesRel();
    }
    function listingsPartnersAcountType() {
        return $this->_modelOtherAcountType
                        ->select()
                        ->from($this->_modelOtherAcountType->getName(), 
                                array('par_other_type_account_id',
                            'par_other_type_account_name'))
                        ->order('par_other_type_account_name')
                        ->query()
                        ->fetchAll();
    }
    function insertPartnersSubcategoriesRel($data){
        return $this->_modelPartnersSubcategoriesRel->insert($data);
    }
    function getPartnersSubcategoriesRel($idPartern, $idAccountType='') {
        $result = $this->_modelPartnersSubcategoriesRel
                ->getAdapter()
                ->select()
                ->from(array('scprt'=>$this->_modelPartnersSubcategoriesRel->getName()),
                        array('oca.par_other_type_account_id',
                            'oca.par_other_type_account_name'))
                ->join(array('oca'=>$this->_modelOtherAcountType->getName()), 
                        'oca.par_other_type_account_id = scprt.par_other_type_account_id')
                ->where('scprt.par_id =?', $idPartern);
        if ($idAccountType != '') {
            $result = $result->where(
                    'scprt.par_other_type_account_id =?', 
                    $idAccountType)
                    ->query()
                    ->fetch();
        } else {
            $result = $result->query()
                    ->fetchAll();
        }
        return $result;
    }
    function deletePartnersSubcategoriesRel($idPartner,$idAccountType){
        $where[] = $this->_modelPartnersSubcategoriesRel->getAdapter()
                ->quoteInto('par_id=?', $idPartner);
        $where[] = $this->_modelPartnersSubcategoriesRel->getAdapter()
                ->quoteInto('par_other_type_account_id=?', $idAccountType);
        $this->_modelPartnersSubcategoriesRel->delete($where);
    }
}

?>
