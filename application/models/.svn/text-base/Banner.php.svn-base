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
class Application_Model_Banner extends CST_Model {

    //put your code here
    private $_modelBanner;
    private $_modelBannerType;

    function __construct() {
        $this->_modelBanner = new Application_Model_TableBase_MexiBanner();
        $this->_modelBannerType = new Application_Model_TableBase_MexiBannerType();
    }

    function insert($data) {
        
    }
    function getBanners(){
        return $this->_modelBanner->getAdapter()
                ->select()
                ->from(array('ban'=>$this->_modelBanner->getName()),array(
                    'ban.mexi_banners_id',
                    'ban.mexi_banners_position_id',
                    'ban.mexi_banners_nombre',
                    'ban.mexi_banners_price',    
                    'ban.mexi_banners_type_id',    
                    'bant.mexi_banners_type_nombre',    
                ))
                ->join(array('bant'=>$this->_modelBannerType->getName()),'bant.mexi_banners_type_id=ban.mexi_banners_type_id')
                ->order('ban.mexi_banners_type_id')
                ->query()
                ->fetchAll();
    }
    function typeBanner($id){
    
    }

    function updateBanner($id, $data) {
    }
    
    

}

?>
