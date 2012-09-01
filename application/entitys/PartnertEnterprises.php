<?php

class Application_Entity_PartnertEnterprises extends Application_Entity_Partnert {
    /* entidades publicas */

    function registerPlans() {
        
    }

    function emailPreferences($newsletter, $other) {
        
    }

    function registerProfiler($input) {
        $data['par_id'] = $this->_id;
        $data['prof_logo'] = $input['logo'];
        $data['prof_company'] = $input['company'];
        $data['prof_email'] = $input['email'];
        $data['prof_website'] = $input['website'];
        $data['prof_phone1'] = $input['phome11'] . '-' . $input['phome12'] . '-' . $input['phome13'];
        $data['prof_phone2'] = $input['phome21'] . '-' . $input['phome22'] . '-' . $input['phome23'];
        $data['prof_phone3'] = $input['phome31'] . '-' . $input['phome32'] . '-' . $input['phome33'];
        $data['prof_dsc'] = $input['descripcion'];
        $data['prof_phone_desc1'] = $input['phoneDes1'];
        $data['prof_phone_desc2'] = $input['phoneDes1'];
        $data['prof_phone_desc3'] = $input['phoneDes1'];
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

    function addFileProfiler($title, $source) {
        
    }

    function addImageProfiler($name) {
        
    }

    function validateVideo($video) {
        /*validate youtube*/
        
        /*validate vimeo*/
    }

    function addVideoProfiler($videosInput = array()) {
        $modelPartVid = new Application_Model_PartnerVideos();
        $videos = $modelPartVid->getVideo($this->_id);
        
        $delete = false;
        if (is_array($videosInput) && !empty($videosInput)) {
            foreach ($videosInput as $index) {
                $this->validateVideo($videosInput);
                $data['par_id'] = $this->_id;
                $data['vid_source'] = $index;
                $modelPartVid->insert($data);
                $delete = true;
            }
        } else {
            if (is_string($videosInput) && !$videosInput != '') {
                $data['par_id'] = $this->_id;
                $data['vid_source'] = $videosInput;
                $modelPartVid->insert($data);
                $delete = true;
            }
        }
        if($delete) {
            foreach ($videos as $index) {
                $modelPartVid->deleteVideo($index['vid_id']);
            }
        }
    }

    function registerLocationProfiler($uriVideo) {
        
    }

    function registerCategorieProfiler($uriVideo) {
        
    }

    function registerSubCategorieProfiler($uriVideo) {
        
    }

}
