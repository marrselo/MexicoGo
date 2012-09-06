<?php

/**
 * Description of Properties
 *
 * @author marrselo
 */
class Application_Model_Properties extends CST_Model {

    protected $_modelProperties;
    protected $_modelPropertiesFiles;
    protected $_modelPropertiesVideos;
    protected $_modelPropertiesFeartureRel;
    protected $_modelPropertiesBuildingsRel;
    protected $_modelPropertiesApplianceRel;
    protected $_modelAppliance;
    protected $_modelBuilding;
    protected $_modelFeature;

    function __construct() {
        $this->_modelProperties = new Application_Model_TableBase_Properties();
        $this->_modelPropertiesFiles = new Application_Model_TableBase_PropertyFiles();
        $this->_modelPropertiesVideos = new Application_Model_TableBase_PropertyVideos();
        $this->_modelPropertiesFeartureRel = new Application_Model_TableBase_PropertiesFeaturesRel();
        $this->_modelPropertiesBuildingsRel = new Application_Model_TableBase_PropertiesBuildingsRel();
        $this->_modelPropertiesApplianceRel = new Application_Model_TableBase_PropertiesApplianceRel();
        $this->_modelAppliance = new Application_Model_TableBase_Appliances();
        $this->_modelBuilding = new Application_Model_TableBase_Buildings();
        $this->_modelFeature = new Application_Model_TableBase_Features();
    }

    function insert($data) {
        if ($this->_modelProperties->insert($data)) {
            return $this->_modelProperties
                            ->getAdapter()
                            ->lastInsertId();
        } else {
            return false;
        }
    }

    function getAgents($id) {
        return $this->_modelProperties
                        ->select()
                        ->where('ame_id = ?', $id)
                        ->query()
                        ->fetch();
    }

    public function listing($age_id) {
        return $this->_modelProperties->select()
                        ->where('par_id = ?', $age_id)
                        ->order('ame_id DESC')
                        ->query()
                        ->fetchAll();
    }

    function update($id, $data) {
        if ($id != '' && $data != '') {
            $where = $this->_modelProperties->getAdapter()
                    ->quoteInto('pro_id = ?', $id);
            $this->_modelProperties->update($data, $where);
        } else {
            return false;
        }
    }
    
    function isHomePartner($idProperty,$idPartner){
        return $this->_modelProperties->select()
                ->from($this->_modelProperties->getName(),array('par_id'))
                ->where('pro_id = ?', $idProperty)
                ->where('par_id = ?', $idPartner)
                ->query()
                ->fetch();
    }

    function listingPropertyFile($idProperty) {
        $where = $this->_modelPropertiesFiles
                ->getAdapter()
                ->quoteInto('pro_id = ?', $idProperty);
        return $this->_modelPropertiesFiles->select()
                        ->where($where)
                        ->query()
                        ->fetchAll();
    }

    function insertPropertyesFile($data) {
        return $this->_modelPropertiesFiles->insert($data);
    }

    function getFileSource($title,$idProperty) {
        return $this->_modelPropertiesFiles->select()
                ->where('fil_source = ?', $title)
                ->where('pro_id = ?', $idProperty)
                ->query()
                ->fetch();
    }

    function updatePropertyesFile($id, $data) {
        $where = $this->_modelPropertiesFiles->getAdapter()->quoteInto('fil_id = ?', $id);
        $this->_modelPropertiesFiles->update($data, $where);
    }

    function listingVideo($id) {
        return $this->_modelPropertiesVideos
                        ->select()
                        ->where('pro_id = ?', $id)
                        ->query()
                        ->fetchAll();
    }

    function insertVideo($data) {
        return $this->_modelPropertiesVideos->insert($data);
    }

    function deleteVideo($idVideo) {
        $where = $this->_modelPropertiesVideos->getAdapter()->quoteInto('vid_id = ?', $idVideo);
        return $this->_modelPropertiesVideos->delete($where);
    }

    function getPropertyId($idProperty,$idPartern) {
        return $this->_modelProperties
                        ->select()
                        ->where('pro_id = ?', $idProperty)
                        ->where('par_id = ?', $idPartern)
                        ->query()
                        ->fetch();
    }

    function insertFeatureRel($data) {
        return $this->_modelPropertiesFeartureRel->insert($data);
    }
    
    function getFeatureRel($idProperty,$idFeature='') {
        $result = $this->_modelPropertiesFeartureRel
                ->getAdapter()
                ->select()
                ->from(array('fat'=>$this->_modelPropertiesFeartureRel->getName()),
                        array('f.fea_id',
                            'f.fea_name'))
                ->join(array('f'=>$this->_modelFeature->getName()), 
                        'f.fea_id = fat.fea_id')
                ->where('fat.pro_id =?', $idProperty);
        if ($idFeature != '') {
            $result = $result->where(
                    'fat.fea_id =?', 
                    $idFeature)
                    ->query()
                    ->fetch();
        } else {
            $result = $result->query()
                    ->fetchAll();
        }
        return $result;
    }

    function deleteFeatureRel($idFeature, $idProperty) {
        if ($idFeature != '' && $idProperty != '') {
            $where[] = $this->_modelPropertiesFeartureRel->getAdapter()
                    ->quoteInto('fea_id', $idFeature);
            $where[] = $this->_modelPropertiesFeartureRel->getAdapter()
                    ->quoteInto('pro_id', $idProperty);
            $this->_modelPropertiesFeartureRel->delete($where);
        } else {
            return FALSE;
        }
    }

    function insertApplianceRel($data) {
        return $this->_modelPropertiesApplianceRel->insert($data);
    }
    
    function getApplianceRel($idProperty,$idAppliance='') {
        $result = $this->_modelPropertiesApplianceRel
                ->getAdapter()
                ->select()
                ->from(array('apr'=>$this->_modelPropertiesApplianceRel->getName()),
                        array('a.app_id',
                            'a.app_name'))
                ->join(array('a'=>$this->_modelAppliance->getName()), 
                        'a.app_id = apr.app_id')
                ->where('apr.pro_id =?', $idProperty);
        if ($idAppliance != '') {
            $result = $result->where(
                    'apr.app_id =?', 
                    $idAppliance)
                    ->query()
                    ->fetch();
        } else {
            $result = $result->query()
                    ->fetchAll();
        }
        return $result;
    }
    
    function deleteApplianceRel($idAppliance, $idProperty) {
        if ($idAppliance != '' && $idProperty != '') {
            $where[] = $this->_modelPropertiesApplianceRel->getAdapter()
                    ->quoteInto('app_id', $idAppliance);
            $where[] = $this->_modelPropertiesApplianceRel->getAdapter()
                    ->quoteInto('pro_id', $idProperty);
            $this->_modelPropertiesApplianceRel->delete($where);
        } else {
            return FALSE;
        }
    }

    function insertBuildingRel($data) {
        return $this->_modelPropertiesBuildingsRel->insert($data);
    }
    function getBuildingRel($idProperty,$idBuilding='') {
        $result = $this->_modelPropertiesBuildingsRel
                ->getAdapter()
                ->select()
                ->from(array('br'=>$this->_modelPropertiesBuildingsRel->getName()),
                        array('b.bui_id',
                            'b.bui_name'))
                ->join(array('b'=>$this->_modelBuilding->getName()), 
                        'b.bui_id = br.bui_id')
                ->where('br.pro_id =?', $idProperty);
        if ($idBuilding != '') {
            $result = $result->where(
                    'br.bui_id =?', 
                    $idBuilding)
                    ->query()
                    ->fetch();
        } else {
            $result = $result->query()
                    ->fetchAll();
        }
        return $result;
    }
    function deleteBuildingRel($idBuilding, $idProperty) {
        if ($idBuilding != '' && $idProperty != '') {
            $where[] = $this->_modelPropertiesBuildingsRel->getAdapter()
                    ->quoteInto('bui_id', $idBuilding);
            $where[] = $this->_modelPropertiesBuildingsRel->getAdapter()
                    ->quoteInto('pro_id', $idProperty);
            $this->_modelPropertiesBuildingsRel->delete($where);
        } else {
            return FALSE;
        }
    }

}