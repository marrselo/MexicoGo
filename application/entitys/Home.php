<?php
/**
 * Description of Home
 *
 * @author marrselo
 */
class Home extends CST_Entity{
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
    public $_idAvailable;
    public $_idListingStatus;
    public $_idPropertyType;
    public $_price;
    public $_houseMetros;
    public $_LandMetros;
    public $_idBedroon;
    public $_idStyle;
    public $_idGarage;
    public $_idView;
    public $_idRecreationalAreas;
    public $_idBathrooms;
    public $_keywords;
    public $_size;
    public $_addressFeature;
    
    
    function setArrayData(){
        $param[''] = $this->_title;
        $param[''] = $this->_description;
        $param[''] = $this->_addres;
        $param[''] = $this->_suitApaUnit;
        $param[''] = $this->_city;
        $param[''] = $this->_state;
        $param[''] = $this->_zip;
        $param[''] = $this->_latitud;
        $param[''] = $this->_longitud;
        $param[''] = $this->_idAvailable;
        $param[''] = $this->_idBathrooms;
        $param[''] = $this->_idBedroon;
        $param[''] = $this->_idGarage;
        $param[''] = $this->_idListingStatus;
        $param[''] = $this->_idPropertyType;
        $param[''] = $this->_idRecreationalAreas;
        $param[''] = $this->_idStyle;
        $param[''] = $this->_idView;
        return $param;
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
        
    }
    function addVideo(){
        
    }
    
    
}

?>
