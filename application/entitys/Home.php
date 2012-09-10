<?php

/**
 * Description of Home
 *
 * @author marrselo
 */
class Application_Entity_Home extends CST_Entity {

    //put your code here
    public $_id;
    public $_idPartner;
    public $_title;
    public $_description;
    public $_files;
    public $_images;
    public $_videos;
    public $_addres;
    public $_suitApaUnit;
    public $_city;
    public $_state;
    public $_zip;
    public $_latitud;
    public $_longitud;
    public $_status;
    public $_idListingStatus;
    public $_idPropertyType;
    public $_price;
    public $_houseDetail;
    public $_landDetail;
    public $_bedroon;
    public $_idStyle;
    public $_garage;
    public $_idView;
    public $_recreationalAreas;
    public $_bathrooms;
    public $_keywords;
    public $_size;
    public $_addressFeature;
    public $_featureFeature;
    public $_featureBuilding;
    public $_featureAppliances;

    function setArrayData() {
        $param['title'] = $this->_title;
        $param['description'] = $this->_description;
        $param['address'] = $this->_addres;
        $param['suit_apa_unit'] = $this->_suitApaUnit;
        $param['cd_id'] = $this->_city;
        $param['est_id'] = $this->_state;
        $param['zip'] = $this->_zip;
        $param['latitud'] = $this->_latitud;
        $param['longitud'] = $this->_longitud;
        $param['pro_status'] = $this->_status;
        $param['bathrooms'] = $this->_bathrooms;
        $param['bedroom'] = $this->_bedroon;
        $param['garage'] = $this->_garage;
        $param['listing_status_id'] = $this->_idListingStatus;
        $param['property_type_id'] = $this->_idPropertyType;
        $param['recreational_areas'] = $this->_recreationalAreas;
        $param['property_style_id'] = $this->_idStyle;
        $param['property_view_id'] = $this->_idView;
        $param['par_id'] = $this->_idPartner;
        $param['pro_price'] = $this->_price;
        $param['pro_house_details'] = $this->_houseDetail;
        $param['pro_house_details'] = $this->_landDetail;
        $param['keyword'] = $this->_keywords;
        $param['size'] = $this->_size;
        $param['address_feature'] = $this->_addressFeature;
        foreach ($param as $index => $value) {
            if ($value == '') {
                unset($param[$index]);
            }
        }
        return $param;
    }

    function identifiqueHome($idProperty, $idPartern) {
        $modelProperties = new Application_Model_Properties();
        if ($idProperty == '' || $idPartern == '') {
            return false;
        }
        $modelProperties = new Application_Model_Properties();
        $param = $modelProperties->getPropertyId($idProperty, $idPartern);
        if ($param != FALSE) {
            $this->_title = $param['title'];
            $this->_id = $param['pro_id'];
            $this->_description = $param['description'];
            $this->_addres = $param['address'];
            $this->_suitApaUnit = $param['suit_apa_unit'];
            $this->_city = $param['cd_id'];
            $this->_state = $param['est_id'];
            $this->_zip = $param['zip'];
            $this->_latitud = $param['latitud'];
            $this->_longitud = $param['longitud'];
            $this->_status = $param['pro_status'];
            $this->_bathrooms = $param['bathrooms'];
            $this->_bedroon = $param['bedroom'];
            $this->_garage = $param['garage'];
            $this->_idListingStatus = $param['listing_status_id'];
            $this->_idPropertyType = $param['property_type_id'];
            $this->_recreationalAreas = $param['recreational_areas'];
            $this->_idStyle = $param['property_style_id'];
            $this->_idView = $param['property_view_id'];
            $this->_idPartner = $param['par_id'];
            $this->_price = $param['pro_price'];
            $this->_houseDetail = $param['pro_house_details'];
            $this->_landDetail = $param['pro_house_details'];
            $this->_keywords = $param['keyword'];
            $this->_size = $param['size'];
            $this->_addressFeature = $param['address_feature'];
            $this->_featureAppliances = $this->getAppliance();
            $this->_featureBuilding = $this->getBuilding();
            $this->_featureFeature = $this->getFeature();
            return true;
        } else {
            return false;
        }
    }

    function insertHome() {
        $modelProperties = new Application_Model_Properties();
        $data = $this->setArrayData();
        $this->_id = $modelProperties->insert($data);
    }

    function updateHome() {
        $modelProperties = new Application_Model_Properties();
        if ($modelProperties->isHomePartner($this->_id, $this->_idPartner) != FALSE) {
            $data = $this->setArrayData();
            $modelProperties->update($this->_id, $data);
            return true;
            
        } else {
            return FALSE;
        }
    }

    function addFile() {
        $modelProperties = new Application_Model_Properties();
        if (is_array($this->_files)) {
            foreach ($this->_files as $index) {
                $data['fil_title'] = $index['title'];
                $data['fil_source'] = $index['source'];
                $data['pro_id'] = $this->_id;
                $fileSource = $modelProperties->getFileSource($index['source'], $this->_id);
                if ($fileSource != FALSE) {
                    $modelProperties->updatePropertyesFile($fileSource['fil_id'], $data);
                } else {
                    $modelProperties->insertPropertyesFile($data);
                }
            }
        }
    }

    function listingsFile() {
        $modelProperties = new Application_Model_Properties();
        return $modelProperties->listingPropertyFile($this->_id);
    }

    function listingVideo() {
        if ($this->_id == '')
            return false;
        $modelPropVid = new Application_Model_Properties();
        return $modelPropVid->listingVideo($this->_id);
    }

    function validateVideo($uri) {
        return 'youtube';
        $result = CST_Utils::validateUrlYoutube($uri);
        if ($result['validate'] != FALSE) {
            return $result['type'];
        } else {
            $result2 = CST_Utils::validateUrlVimeo($uri);
            if ($result2['validate'] != FALSE) {
                return $result2['type'];
            } else {
                return FALSE;
            }
        }
    }

    function addVideo() {
        $videosInput = $this->_videos;
        $modelPropVid = new Application_Model_Properties();
        $videos = $modelPropVid->listingVideo($this->_id);
        $delete = FALSE;
        if (is_array($videosInput) && !empty($videosInput)) {
            foreach ($videosInput as $index) {
                if ($index != '' && $type = $this->validateVideo($index)) {
                    $data['pro_id'] = $this->_id;
                    $data['vid_uri'] = $index;
                    $data['vid_type'] = $type;
                    $modelPropVid->insertVideo($data);
                    $delete = TRUE;
                }
            }
        } else {
            if (is_string($videosInput) && !$videosInput != '') {
                if ($videosInput != '' && $type = $this->validateVideo($videosInput)) {
                    $data['par_id'] = $this->_id;
                    $data['vid_uri'] = $videosInput;
                    $data['vid_type'] = $type;
                    $modelPropVid->insert($data);
                    $delete = TRUE;
                }
            }
        }
        if ($delete != FALSE) {
            foreach ($videos as $index) {
                $modelPropVid->deleteVideo($index['vid_id']);
            }
        }
    }

    function getFeature() {
        $model = new Application_Model_Properties();
        return CST_Utils::fetchPairs($model->getFeatureRel($this->_id));
    }

    function getAppliance() {
        $model = new Application_Model_Properties();
        return CST_Utils::fetchPairs($model->getApplianceRel($this->_id));
    }

    function getBuilding() {
        $model = new Application_Model_Properties();
        return CST_Utils::fetchPairs($model->getBuildingRel($this->_id));
    }

    function addFeature($arrayData) {
        $model = new Application_Model_Properties();
        $arrayRel = $this->getFeature();
        if (is_array($arrayData) and !empty($arrayData)) {
            foreach ($arrayData as $index) {
                unset($arrayRel[$index]);
                if ($model->getFeatureRel($this->_id, $index) == FALSE) {
                    $data['pro_id'] = $this->_id;
                    $data['fea_id'] = $index;
                    $model->insertFeatureRel($data);
                }
            }
            if (!empty($arrayRel)) {
                foreach ($arrayRel as $index => $value) {
                    $model->deleteFeatureRel($index, $this->_id);
                }
            }
        }
    }

    function addAppliance($arrayData) {
        $model = new Application_Model_Properties();
        $arrayRel = $this->getAppliance();
        
        if (is_array($arrayData) and !empty($arrayData)) {
            foreach ($arrayData as $index) {
                unset($arrayRel[$index]);
                if ($model->getApplianceRel($this->_id, $index) == FALSE) {
                    $data['pro_id'] = $this->_id;
                    $data['app_id'] = $index;
                    $model->insertApplianceRel($data);
                }
            }
            if (!empty($arrayRel)) {
                foreach ($arrayRel as $index => $value) {
                    $model->deleteApplianceRel($index, $this->_id);
                }
            }
        }
    }

    function addBuilding($arrayData) {
        $model = new Application_Model_Properties();
        $arrayRel = $this->getBuilding();
        
        if (is_array($arrayData) and !empty($arrayData)) {
            foreach ($arrayData as $index) {
                unset($arrayRel[$index]);
                if ($model->getBuildingRel($this->_id, $index) == FALSE) {
                    $data['pro_id'] = $this->_id;
                    $data['bui_id'] = $index;
                    $model->insertBuildingRel($data);
                }
            }
            
            if (!empty($arrayRel)) {
                foreach ($arrayRel as $index => $value) {
                    $model->deleteBuildingRel($index, $this->_id);
                }
            }
        }
    }

}

?>
