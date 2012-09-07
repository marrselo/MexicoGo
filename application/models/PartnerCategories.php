<?php

class Application_Model_PartnerCategories extends CST_Model {

    private $_modelPartnerCategories;
    private $_modelPartnerCategoriesRel;

    function __construct() {
        $this->_modelPartnerCategories = new Application_Model_TableBase_PartnersCategories();
        $this->_modelPartnerCategoriesRel = new Application_Model_TableBase_PartnersCategoriesRel();
    }
    function getCategories(){
        return $this->_modelPartnerCategories->select()
                ->query()
                ->fetchAll();
    }
    
    function getSubCategories(){
        $select = $this->_modelPartnerCategories->select()->setIntegrityCheck(false);
        $select->from('partners_subcategories');
        $data = $this->_modelPartnerCategories->fetchAll($select);
        return $data->toArray();
    }
    function getCategoriesRel($idPartern, $idCat=''){
         $result = $this->_modelPartnerCategoriesRel
                ->getAdapter()
                ->select()
                ->from(array('pcr'=>$this->_modelPartnerCategoriesRel->getName()),
                        array('pc.cat_id',
                            'pc.cat_name'))
                ->join(array('pc'=>$this->_modelPartnerCategories->getName()), 
                        'pc.cat_id = pcr.cat_id')
                ->where('pcr.par_id =?', $idPartern);
        if ($idCat != '') {
            $result = $result->where(
                    'pcr.cat_id =?', 
                    $idCat)
                    ->query()
                    ->fetch();
        } else {
            $result = $result->query()
                    ->fetchAll();
        }
        return $result;
    }
    function insertCategoriesRel($data){
        return $this->_modelPartnerCategoriesRel->insert($data);
    }
    function deleteCategoriesRel($idCategorie,$idPartner){
        $where[] = $this->_modelPartnerCategoriesRel->getAdapter()
                ->quoteInto('par_id=?', $idPartner);
        $where[] = $this->_modelPartnerCategoriesRel->getAdapter()
                ->quoteInto('cat_id=?', $idCategorie);
        $this->_modelPartnerCategoriesRel->delete($where);
    } 

}

