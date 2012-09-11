<?php

class Partner_ProfilerController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        /* Initialize action controller here */
    }

    public function indexAction() {
        $partner = new Application_Entity_PartnertEnterprises();
        $form = new Application_Form_Profiler();
        $partner->identifiquePartner($this->_identityPartner->par_id);
        $ubigeo = new Application_Entity_Ubigeo();
        $estados = $ubigeo->getEstados();
        $this->view->estado = '';
        $this->view->ciudades = array();
        $this->view->estados = $form->getElement('profilerLocationState')->getMultiOptions();//Application_Entity_Ubigeo::getEstados();
        $this->view->dataProfiler = $dataProfiler = $partner->getProfiler();
        $this->view->dataVideo = $partner->getVideoProfiler();
        $this->view->file = $partner->getProfilerFile();
        $this->view->location = $partner->getLocationProfiler();
        $this->view->listingSubCategoria = $partner->listingsOtherAccountType();
        $this->view->listingSubcategoriaRel = $partner->getSubCategoriePartnerRel();
        $this->view->listingCategoriaRel = $partner->getCategoriePartnerRel();
        $this->view->listingCategoria = $partner->listingsCategories();
        $this->view->ciudades=array();
        if($this->view->location['state']!='')
        $this->view->ciudades = Application_Entity_Ubigeo::getCiudades($this->view->location['state']);
        
        if( $dataProfiler['logo'] ){
            $logo[] = array(
                'name'=>$dataProfiler['logo'],
                'url' => '/dinamic/partner/profiler/img/'.$dataProfiler['logo'],
                'id'=>1
            );
            $this->view->json_logo = json_encode($logo);
        }else{
            $this->view->json_logo = 'null';
        }
        $images  = $partner->getImageProfiler();        
        
        $a_images = array();
        foreach($images as $index){
            $tmp['id'] = $index['img_id'];
            $tmp['title'] = $index['img_title'];
            $tmp['name'] = $index['img_source'];
            $tmp['description'] = $index['img_description'];
            $tmp['url'] = '/dinamic/partner/profiler/img/'.$index['img_source'];
            $a_images[] = $tmp;
        }
        
        if($a_images){
            $this->view->json_images = json_encode($a_images);
        }else{
            $this->view->json_images = 'null';
        }
        
        //echo '<pre>';print_r($this->_request->getParams());die();
        
        if ($this->_request->isPost()) {
            //$form = new Application_Form_Profiler();
            $ft = new Zend_File_Transfer();
            $fileTranferInfo = $ft->getFileInfo();
            $keysFileTranfer = array_keys($fileTranferInfo);
            $array_elemet = array(
                'fileProfiler1',
                'fileProfiler2',
                'fileProfiler3');
            foreach ($array_elemet as $index) {
                if (!in_array($index, $keysFileTranfer)) {
                    $form->removeElement($index);
                }
            }
            
            
            $aValues = $this->_request->getParams();
            $_post = $this->getRequest()->getPost();

            //echo '<pre>';print_r($aValues); print_r($form->getValues());die();
            
            if ($form->isValid($aValues)) { 
                foreach ($fileTranferInfo as $file => $info) {
                    if ($ft->isUploaded($file)) {
                        $extn = pathinfo($form->{$file}->getFileName(), PATHINFO_EXTENSION);
                        $name = pathinfo($form->{$file}->getFileName(), PATHINFO_FILENAME);
                        $nameFile = $file . '_' . $this->_identityPartner->par_id . '.' . $extn;
                        $rutaFileAbs = $form->{$file}->getDestination() . '/' . $nameFile;
                        $form->{$file}->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                        if ($form->{$file}->receive()) {
                            $arrayFile[] = array(
                                'title' => $name,
                                'source' => $nameFile);
                        }
                    }
                }
                $input['company'] = $form->getElement('profileCompany')->getValue();
                $input['email'] = $form->getElement('profileEmail')->getValue();
                $input['website'] = $form->getElement('profileWebsite')->getValue();
                $input['phome11'] = $form->getElement('profilePhone11')->getValue();
                $input['phome12'] = $form->getElement('profilePhone12')->getValue();
                $input['phome13'] = $form->getElement('profilePhone13')->getValue();
                $input['phome21'] = $form->getElement('profilePhone21')->getValue();
                $input['phome22'] = $form->getElement('profilePhone22')->getValue();
                $input['phome23'] = $form->getElement('profilePhone23')->getValue();
                $input['phome31'] = $form->getElement('profilePhone31')->getValue();
                $input['phome32'] = $form->getElement('profilePhone32')->getValue();
                $input['phome33'] = $form->getElement('profilePhone33')->getValue();
                $input['descripcion'] = $form->getElement('profileDescription')->getValue();
                $input['phoneDes1'] = $form->getElement('profilePhoneDescription1')->getValue();
                $input['phoneDes2'] = $form->getElement('profilePhoneDescription2')->getValue();
                $input['phoneDes3'] = $form->getElement('profilePhoneDescription3')->getValue();

                $_post = $this->getRequest()->getPost();               
                
                if( $_post['logo'] ){
                    $input_logo['crop'] = trim($_post['logo_params'][0]);
                    if($_post['logo_id'][0]){
                        $input_logo['file'] = APPLICATION_PATH.'/../public/dinamic/partner/profiler/img/'.$_post['logo'][0];
                    }else{
                        $input_logo['file'] = APPLICATION_PATH.'/../public/tmp/'.$_post['logo'][0];
                    }
                }
                $input['logo'] = $input_logo;
                
                
                $gallery = $_post['gallery'];
                $gallery_params = $_post['gallery_params'];
                $gallery_title = $_post['gallery_title'];
                $gallery_description = $_post['gallery_description'];
                $gallery_delete = $_post['gallery_delete'];
                $gallery_id = $_post['gallery_id'];
                $images = array();
                foreach($gallery as $key=>$index){
                    $tmp = array();
                    $tmp['crop'] = trim($gallery_params[$key]);
                    $tmp['title'] = $gallery_title[$key];
                    $tmp['description'] = $gallery_description[$key];
                    $tmp['delete'] = (int)$gallery_delete[$key];
                    $tmp['id'] = (int)$gallery_id[$key];
                    if($tmp['id']){
                        $tmp['file'] = APPLICATION_PATH.'/../public/dinamic/partner/profiler/img/'.$index;
                    }else{
                        $tmp['file'] = APPLICATION_PATH.'/../public/tmp/'.$index;
                    }
                    
                    $images[]= $tmp;
                }
                
                $partner->registerProfiler($input);
                $videosInput = array(
                    $form->getElement('profileVideo1')->getValue(),
                    $form->getElement('profileVideo2')->getValue(),
                    $form->getElement('profileVideo3')->getValue()
                );
                $partner->addImageProfiler($images);
                $partner->addVideoProfiler($videosInput);
                $partner->addFileProfiler($arrayFile);
                                
                $partner->registerLocationProfiler($uriVideo);
                $inputLocation['address'] = $form->getElement('profileLocationAddress')->getValue();
                $inputLocation['site'] = $form->getElement('profileLocationSuite')->getValue();
                $inputLocation['city'] = $form->getElement('profileLocationCity')->getValue();
                $inputLocation['state'] = $form->getElement('profilerLocationState')->getValue();
                $inputLocation['zip'] = $form->getElement('profilerLocationZip')->getValue();
                $inputLocation['latitud'] = $form->getElement('profileLocationLatitud')->getValue();
                $inputLocation['longitud'] = $form->getElement('profileLocationLongitud')->getValue();
                $partner->registerLocationProfiler($inputLocation);
                $partner->addSubCategorieProfilerRel($form->getElement('profileSubCategoria')->getValue());
                $partner->addCategorieProfilerRel($form->getElement('profileCategoria')->getValue());
                $this->_redirect('/partner/profiler');
            } else {
                //echo '<pre>';die(print_r($form->getErrors()));
                print_r($form->getErrorMessages());
               // print_r($this->_request->getParams());
            }
        }
    }
    
    /**
     * Recibe las imagenes 
     */
    public function uploadAction() {
        
        $adapter = new Zend_File_Transfer_Adapter_Http();
        $adapter->addValidator('Extension', false, 'jpg,png');
        $files = $adapter->getFileInfo();
        $datas= array();
        foreach ($files as $file => $info) {                        
            $name = $adapter->getFileName($file);

            if (!$adapter->isUploaded($file)){
                $datas['error'] = 'the file upload ('.$name. ') was not successful';
                break;
            }
            if (!$adapter->isValid($file)){
                $datas['error'] = 'Uploaded file ('.$name. ') has not an allowed extension';
                break;
            }
            
            //$new_name = hash('sha256', date('dns').$name);
            $new_name = uniqid(date('dnhms'));
            switch($info['type']){
                case 'image/png': $new_name.='.png'; break;
                case 'image/gif': $new_name.='.gif'; break;
                default: $new_name.='.jpg'; break;
            }
            
            $adapter->receive($file); // this has to be on top            
            $fileclass = new stdClass();
            $fileclass->name = $new_name;
            $fileclass->title = preg_replace('/\..*$/', '', $info['name']);
            $fileclass->size = $adapter->getFileSize($file);
            $fileclass->type = $adapter->getMimeType($file);
            $fileclass->url = '/tmp/'.$fileclass->name;
            
            $datas[] = $fileclass;
            
            $thumb = PhpThumbFactory::create($adapter->getFileName());
            $thumb->save(APPLICATION_PATH.'/../public/tmp/'.$fileclass->name);
            break; // Solo se permite una imagen
        }
        header('Pragma: no-cache');
        header('Cache-Control: private, no-cache');
        header('Content-Disposition: inline; filename="files.json"');
        header('X-Content-Type-Options: nosniff');
        header('Vary: Accept');
        echo json_encode($datas);              

        //echo json_encode($return);
        exit();
    }
    

}

