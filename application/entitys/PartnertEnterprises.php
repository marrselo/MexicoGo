<?php

class Application_Entity_PartnertEnterprises extends Application_Entity_Partnert {
    /* entidades publicas */

    function registerPlans() {
        
    }

    function emailPreferences($newsletter, $other) {
        
    }

    function registerProfiler($input) {
        //echo '<pre>';print_r($input);die();
        $data['par_id'] = $this->_id;
        $data['prof_logo'] = $this->ajustarImagen($input['logo']);
        $data['prof_company'] = $input['company'];
        $data['prof_email'] = $input['email'];
        $data['prof_website'] = $input['website'];
        $data['prof_phone1'] = $input['phome11'] . '-' . $input['phome12'] . '-' . $input['phome13'];
        $data['prof_phone2'] = $input['phome21'] . '-' . $input['phome22'] . '-' . $input['phome23'];
        $data['prof_phone3'] = $input['phome31'] . '-' . $input['phome32'] . '-' . $input['phome33'];
        $data['prof_dsc'] = $input['descripcion'];
        $data['prof_phone_desc1'] = $input['phoneDes1'];
        $data['prof_phone_desc2'] = $input['phoneDes2'];
        $data['prof_phone_desc3'] = $input['phoneDes2'];
        $modelProfiler = new Application_Model_PartnerProfile();
        if ($modelProfiler->getProfiler($this->_id) != false) {
            $this->updateProfiler($data);
        } else {
            $modelProfiler->insert($data);
        }
    }

    function updateProfiler($data) {
        $modelProfiler = new Application_Model_PartnerProfile();
        $modelProfiler->updateProfiler($this->_id, $data);
    }

    function getProfiler() {
        $modelProfiler = new Application_Model_PartnerProfile();
        $data = $modelProfiler->getProfiler($this->_id);
        $input['logo'] = '';
        $input['company'] = '';
        $input['email'] = '';
        $input['website'] = '';
        $input['phome11'] = '';
        $input['phome12'] = '';
        $input['phome13'] = '';
        $input['phome21'] = '';
        $input['phome22'] = '';
        $input['phome23'] = '';
        $input['phome31'] = '';
        $input['phome32'] = '';
        $input['phome33'] = '';
        $input['descripcion'] = '';
        $input['phoneDes1'] = '';
        $input['phoneDes2'] = '';
        $input['phoneDes3'] = '';
        $input['idProfiler'] = '';

        if ($data != FALSE) {
            $input['idProfiler'] = $data['prof_id'];
            $input['logo'] = $data['prof_logo'];
            $input['company'] = $data['prof_company'];
            $input['email'] = $data['prof_email'];
            $input['website'] = $data['prof_website'];
            $arrayProfPhone1 = explode('-', $data['prof_phone1']);
            $input['phome11'] = isset($arrayProfPhone1[0]) ? $arrayProfPhone1[0] : '';
            $input['phome12'] = isset($arrayProfPhone1[1]) ? $arrayProfPhone1[1] : '';
            $input['phome13'] = isset($arrayProfPhone1[2]) ? $arrayProfPhone1[2] : '';
            $arrayProfPhone2 = explode('-', $data['prof_phone2']);
            $input['phome21'] = isset($arrayProfPhone2[0]) ? $arrayProfPhone2[0] : '';
            $input['phome22'] = isset($arrayProfPhone2[1]) ? $arrayProfPhone2[1] : '';
            $input['phome23'] = isset($arrayProfPhone2[2]) ? $arrayProfPhone2[2] : '';
            $arrayProfPhone3 = explode('-', $data['prof_phone3']);
            $input['phome31'] = isset($arrayProfPhone3[0]) ? $arrayProfPhone3[0] : '';
            $input['phome32'] = isset($arrayProfPhone3[1]) ? $arrayProfPhone3[1] : '';
            $input['phome33'] = isset($arrayProfPhone3[2]) ? $arrayProfPhone3[2] : '';
            $input['descripcion'] = $data['prof_dsc'];
            $input['phoneDes1'] = $data['prof_phone_desc1'];
            $input['phoneDes2'] = $data['prof_phone_desc2'];
            $input['phoneDes3'] = $data['prof_phone_desc3'];
        }
        return $input;
    }

    function getProfilerFile() {
        $modelPartVid = new Application_Model_PartnerFiles();
        return $modelPartVid->getFilePartner($this->_id);
    }

    function addFileProfiler($arrayFile) {
        $modelFilePartert = new Application_Model_PartnerFiles();
        if (is_array($arrayFile)) {
            foreach ($arrayFile as $index) {
                $data['fil_title'] = $index['title'];
                $data['fil_source'] = $index['source'];
                $data['par_id'] = $this->_id;
                if ($fileSource = $modelFilePartert->getFileSource($index['source'])) {
                    $modelFilePartert->update($fileSource['fil_id'], $data);
                } else {
                    $modelFilePartert->insert($data);
                }
            }
        }
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

    function getVideoProfiler() {
        $modelPartVid = new Application_Model_PartnerVideos();
        return $modelPartVid->getVideo($this->_id);
    }

    function addVideoProfiler($videosInput = array()) {
        $modelPartVid = new Application_Model_PartnerVideos();
        $videos = $modelPartVid->getVideo($this->_id);

        $delete = FALSE;
        if (is_array($videosInput) && !empty($videosInput)) {
            foreach ($videosInput as $index) {
                if ($type = $this->validateVideo($index)) {
                    $data['par_id'] = $this->_id;
                    $data['vid_uri'] = $index;
                    $data['vid_type'] = $type;
                    $modelPartVid->insert($data);
                    $delete = TRUE;
                }
            }
        } else {
            if (is_string($videosInput) && !$videosInput != '') {
                if ($type = $this->validateVideo($videosInput)) {
                    $data['par_id'] = $this->_id;
                    $data['vid_uri'] = $videosInput;
                    $data['vid_type'] = $type;
                    $modelPartVid->insert($data);
                    $delete = TRUE;
                }
            }
        }
        if ($delete != FALSE) {
            foreach ($videos as $index) {
                $modelPartVid->deleteVideo($index['vid_id']);
            }
        }
    }

    function getImageProfiler() {
        $modelPartImgid = new Application_Model_PartnerImages();
        return $modelPartImgid->getImage($this->_id);
    }

    function addImageProfiler($imagesInput = array()) {

        $modelPartImgid = new Application_Model_PartnerImages();

        if (is_array($imagesInput) && !empty($imagesInput)) {            
            foreach ($imagesInput as $key=>$index) {
                
                
                if( $index['delete']==1 ){
                    if( !empty( $index['id']) ){
                        $modelPartImgid->deleteImage((int)$index['id']);
                    }
                    continue;
                }
                
                $name = $this->ajustarImagen($index);                                
                                
                $data['par_id'] = $this->_id;
                $data['img_title'] = $index['title'];
                $data['img_source'] = $name;
                $data['img_description'] = $index['description'];                
                
                if( !empty($index['id'])){
                    $modelPartImgid->updateImage($index['id'], $data);
                }else{                    
                    $modelPartImgid->insert($data);
                }
            }
        }
    }    
    
    function ajustarImagen($imagen){
        if(!$imagen){
            return false;
        }
        $thumb = PhpThumbFactory::create($imagen['file']);
                
        $name = substr($imagen['file'], strrpos($imagen['file'], '/')+1 );

        if( !empty($imagen['crop'])){
            $params = array();
            parse_str($imagen['crop'], $params);

            $dimensions = $thumb->getCurrentDimensions();

            $factor = 1;
            if($dimensions['width']>$dimensions['height']){
                $factor = $dimensions['width']/250;  // los 250 son por el tamaño de la imagen en la interfaz que esta escalada
                $factorD = $dimensions['width']/590;
            }else{
                $factor = $dimensions['height']/250;  // los 250 son por el tamaño de la imagen en la interfaz
                $factorD = $dimensions['height']/332;
            }
            $params['x'] *= $factor;
            $params['y'] *= $factor;
            $params['x2'] *= $factor;
            $params['y2'] *= $factor;
            $params['w'] *= $factor;
            $params['h'] *= $factor;

            $thumb->crop($params['x'], $params['y'], $params['w'], $params['h'])->adaptiveResize(590,332); //->save(APPLICATION_PATH.'/../public/media/uploads/rest/local/'.$fileclass->name);
        }else{
            $thumb->adaptiveResize(590,332);
        }                

        $thumb->save(APPLICATION_PATH.'/../public/dinamic/partner/profiler/img/'.$name);
        return $name;
    }

    function registerLocationProfiler($input) {
        $data['loc_address'] = $input['address'];
        $data['loc_sute_apt_unit'] = $input['site'];
        $data['cd_id'] = $input['city']!=''?$input['city']:null;
        $data['est_id'] = $input['state'];
        $data['loc_zip_posta_code'] = $input['zip'];
        $data['loc_lat'] = $input['latitud'];
        $data['loc_lon'] = $input['longitud'];
        $data['par_id'] = $this->_id;
        $modelPartnerLocation = new Application_Model_PartnerLocation();
        echo 'asdad';
        if ($modelPartnerLocation->getProfilerPartner($this->_id) == FALSE) {
            return $modelPartnerLocation->insert($data);
        } else {
            return $modelPartnerLocation->update($data, $this->_id);
        }
    }

    function getLocationProfiler() {
        $input['address'] = '';
        $input['site'] = '';
        $input['city'] = '';
        $input['state'] = '';
        $input['zip'] = '';
        $input['latitud'] = '';
        $input['longitud'] = '';
        $modelPartnerLocation = new Application_Model_PartnerLocation();
        $data = $modelPartnerLocation->getProfilerPartner($this->_id);
        if ($data != FALSE) {
            $input['address'] = $data['loc_address'];
            $input['site'] = $data['loc_sute_apt_unit'];
            $input['city'] = $data['cd_id'];
            $input['state'] = $data['est_id'];
            $input['zip'] = $data['loc_zip_posta_code'];
            $input['latitud'] = $data['loc_lat'];
            $input['longitud'] = $data['loc_lon'];
        }
        return $input;
    }

    

  
    

    function getSubCategoriePartnerRel(){
        $otherAccount = new Application_Model_PartnerOtherTypeAccount();
        return CST_Utils::fetchPairs($otherAccount->getPartnersSubcategoriesRel($this->_id));
    }
    static function listingsCategories(){
        $partCat = new Application_Model_PartnerCategories();
        return CST_Utils::fetchPairs($partCat->getCategories());
    }
    
    static function listingsSubCategories(){
        $partCat = new Application_Model_PartnerCategories();
        return CST_Utils::fetchPairs($partCat->getSubCategories());
    }
    
    function getCategoriePartnerRel(){
        $partCat = new Application_Model_PartnerCategories();
        return CST_Utils::fetchPairs($partCat->getCategoriesRel($this->_id));
    }
    
    function addCategorieProfilerRel($arrayData) {
        $parCat = new Application_Model_PartnerCategories();
        $categorieParternRel = $this->getCategoriePartnerRel();
         
        if (is_array($arrayData)) {
            foreach ($arrayData as $index) {
                unset($categorieParternRel[$index]);
                if ($parCat->getCategoriesRel($this->_id, $index) == FALSE){
                    $data['par_id'] = $this->_id;
                    $data['cat_id'] = $index;
                    $parCat->insertCategoriesRel($data);
                }
            }
            if(!empty($categorieParternRel)){
                foreach($categorieParternRel as $index=>$value){
                    $parCat->deleteCategoriesRel($index, $this->_id);
                }
            }
            return true;
        }else {
            return false;
        }
    }
    
    function addSubCategorieProfilerRel($arrayData) {
        $otherAccount = new Application_Model_PartnerOtherTypeAccount();
        $subcategorieParternRel = $this->getSubCategoriePartnerRel();
        
        if (is_array($arrayData)) {
            foreach ($arrayData as $index) {
                unset($subcategorieParternRel[$index]);
                if ($otherAccount->getPartnersSubcategoriesRel($this->_id, $index) == FALSE){
                    $data['par_id'] = $this->_id;
                $data['par_other_type_account_id'] = $index;
                $otherAccount->insertPartnersSubcategoriesRel($data);
                }
            }
            if(!empty($subcategorieParternRel)){
                foreach($subcategorieParternRel as $index=>$value){
                    $otherAccount->deletePartnersSubcategoriesRel($this->_id, $index);
                }
                
            }
            return true;
        }else {
            return false;
        }
    }

}
