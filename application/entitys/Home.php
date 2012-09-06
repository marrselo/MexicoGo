<?php
/**
 * Description of Home
 *
 * @author marrselo
 */
class Application_Entity_Home extends CST_Entity{
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
    public $_houseMetros;
    public $_LandMetros;
    public $_Bedroon;
    public $_idStyle;
    public $_Garage;
    public $_idView;
    public $_RecreationalAreas;
    public $_Bathrooms;
    public $_keywords;
    public $_size;
    public $_addressFeature;
    
    
    function setArrayData(){
        $param['pro_title'] = $this->_title;
        $param['pro_description'] = $this->_description;
        $param['address'] = $this->_addres;
        $param['suit_apa_unit'] = $this->_suitApaUnit;
        $param['cd_id'] = $this->_city;
        $param['est_id'] = $this->_state;
        $param['zip'] = $this->_zip;
        $param['latitud'] = $this->_latitud;
        $param['longitud'] = $this->_longitud;
        $param['pro_status'] = $this->_status;
        $param['bathrooms'] = $this->_Bathrooms;
        $param['bedroon'] = $this->_Bedroon;
        $param['garage'] = $this->_Garage;
        $param['listing_status_id'] = $this->_idListingStatus;
        $param['property_type_id'] = $this->_idPropertyType;
        $param['recreational_areas'] = $this->_RecreationalAreas;
        $param[''] = $this->_idStyle;
        $param[''] = $this->_idView;
        
        $param[''] = $this->_id;
        $param[''] = $this->_idPartner;
        $param[''] = $this->_files;
        $param[''] = $this->_images;
        $param[''] = $this->_videos;
        $param[''] = $this->_price;
        $param[''] = $this->_houseMetros;
        $param[''] = $this->_LandMetros;
        $param[''] = $this->_keywords;
        $param[''] = $this->_size;
        $param[''] = $this->_addressFeature;
        foreach($param as $index=>$value){
            if($value==''){
                unset($param[$index]);
            }
        }
        return $param;
    }
    
    function identifiqueHome($idProperty){
        if($idProperty!=''){
         return false;   
        }
        $modelProperties = new Application_Model_Properties();
        $param = $modelProperties->getPropertyId($idProperty);
        if($param!=FALSE){
            $this->_title = $param[''];
            $this->_description = $param[''];
            $this->_addres = $param[''];
            $this->_suitApaUnit = $param[''];
            $this->_city = $param[''];
            $this->_state = $param[''];
            $this->_zip = $param[''];
            $this->_latitud = $param[''];
            $this->_longitud = $param[''];
            $this->_status = $param[''];
            $this->_Bathrooms = $param[''];
            $this->_Bedroon = $param[''];
            $this->_Garage = $param[''];
            $this->_idListingStatus = $param[''];
            $this->_idPropertyType = $param[''];
            $this->_RecreationalAreas = $param[''];
            $this->_idStyle = $param[''];
            $this->_idView = $param[''];
        return true;
        }else{
            return false;
        }
    }
    
    function insertHome(){
        $modelProperties = new Application_Model_Properties();
        $data = $this->setArrayData();
        $this->_id = $modelProperties->insert($data);
    }
    function updateHome(){
        $modelProperties = new Application_Model_Properties();
        $data = $this->setArrayData();
        return $modelProperties->edit($this->_id,$data);
    }
    function addFile(){
        $modelProperties = new Application_Model_Properties();
        if (is_array($this->_files)) {
            foreach ($this->_files as $index) {
                $data['fil_title'] = $index['title'];
                $data['fil_source'] = $index['source'];
                $data['pro_id'] = $this->_id;
                if ($fileSource = $modelProperties->getFileSource($index['source'])) {
                    $modelProperties->updatePropertyesFile($fileSource['fil_id'], $data);
                } else {
                    $modelProperties->insertPropertyesFile($data);
                }
            }
        }
    }
    function listingsFile(){
         $modelProperties = new Application_Model_Properties();
         return $modelProperties->listingPropertyFile($this->_id);
    }
    function listingVideo(){
        $modelPropVid = new Application_Model_Properties();
        return $modelPropVid->listingVideo($this->_id);
    }
    function validateVideo($uri) {
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
                if ($type = $this->validateVideo($index)) {
                    $data['par_id'] = $this->_id;
                    $data['vid_uri'] = $index;
                    $data['vid_type'] = $type;
                    $modelPropVid->insertVideo($data);
                    $delete = TRUE;
                }
            }
        } else {
            if (is_string($videosInput) && !$videosInput != '') {
                if ($type = $this->validateVideo($videosInput)) {
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
    
    
}

?>
