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
        $this->_modelProperties = new Application_Model_TableBase_Properties();
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

    public function listProperties($idPartner)
    {   
        
        return $this->_modelProperties->getAdapter()->select()
                ->from(array('P'=>$this->_modelProperties->getName()),
                    array('pro_price',
                        'listing_status_id',
                        'img_source'=>'source_img',
                        'img_title'=>'title_img'
                        )
                    )
                ->join(array('Part'=>$this->_modelPartners->getName()),
                    'Part.par_id = P.par_id'
                    )
                ->where('Part.par_id = ?',$idPartner)
                ->order('P.par_id DESC')
                ->query()->fetchAll();
    }
    
    public function listPropertiesAgent($idPartner,$idAgent)
    {   
       
        return $this->_modelProperties->getAdapter()->select()
                ->from(array('P'=>$this->_modelProperties->getName()),
                    array('pro_price',
                        'pro_id',
                        'listing_status_id',
                        'img_source'=>'source_img',
                        'img_title'=>'title_img'
                        )
                    )
                ->join(array('Part'=>$this->_modelPartners->getName()),
                    'Part.par_id = P.par_id'
                    )                
                ->where('Part.par_id = ?',$idPartner)
                ->where('P.age_id = ?',$idAgent)                
                ->query()->fetchAll();
    }
    
    public function listPropertiesNotAgent($idPartner,$idAgent)
    {
        return  $this->_modelProperties->getAdapter()->select()
                ->from(array('P'=>$this->_modelProperties->getName()),
                    array('pro_price',
                        'pro_id',
                        'listing_status_id',
                        'img_source'=>'source_img',
                        'img_title'=>'title_img'
                        )
                    )
                ->join(array('Part'=>$this->_modelPartners->getName()),
                    'Part.par_id = P.par_id'
                    )                
                ->where('Part.par_id = ?',$idPartner)
                ->where("P.age_id ='' OR P.age_id IS NULL")
                ->query()->fetchAll();
    }
    function getSearchPartners($filter,$inner = null) {
        $data = array();
        $select = $this->_modelPartners->select()->setIntegrityCheck(false);
        $select->from('partners',array('par_id'));
        $select->JoinInner('partner_imgs','partner_imgs.par_id = partners.par_id',array('img_source')); 
        $select->JoinInner('partners_categories_rel','partners_categories_rel.par_id = partners.par_id',array('cat_id')); 
        //Si ocupa relacionar otra tabla
        if(!empty($inner)){
            $select->JoinInner($inner['tabla'],$inner['union'],$inner['campos']);
        }
        //Aigna las condiciones de los parametros
        foreach ($filter['query'] as $key => $val) {
            $select->where($val,$filter['fields'][$key]);
        }
        $select->group('par_full_name');
        try {
            $res = $this->_modelPartners->fetchAll($select);
            $data['data'] = $res->toArray();
            $data['status'] = 'ok';
        } catch (Exception $exc) {
            $data['msj'] = $exc->getMessage();
            $data['status'] = 'error'; 
        }

        return $data;
    }
    public function listPropertiesPublish($idPartner)
    {   
       
       return  $this->_modelProperties->getAdapter()->select()
                ->from(array('P'=>$this->_modelProperties->getName()),
                    array('pro_price',
                        'pro_id',
                        'listing_status_id',
                        'img_source'=>'source_img',
                        'img_title'=>'title_img'
                        )
                    )
                ->join(array('Part'=>$this->_modelPartners->getName()),
                    'Part.par_id = P.par_id'
                    )                
                ->where('Part.par_id = ?',$idPartner)
                ->where('P.publish= ?',1)
                ->query()->fetchAll();
    }
    
    public function listPropertiesUnPublish($idPartner)
    {
        return  $this->_modelProperties->getAdapter()->select()
                ->from(array('P'=>$this->_modelProperties->getName()),
                    array('pro_price',
                        'pro_id',
                        'listing_status_id',
                        'img_source'=>'source_img',
                        'img_title'=>'title_img'
                        )
                    )
                ->join(array('Part'=>$this->_modelPartners->getName()),
                    'Part.par_id = P.par_id'
                    )                
                ->where('Part.par_id = ?',$idPartner)
                ->where('P.publish= ?',0)
                ->query()->fetchAll();
    }
}

?>
