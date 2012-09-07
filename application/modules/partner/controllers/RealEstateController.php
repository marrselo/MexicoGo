<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InscriptionController
 *
 * @author Laptop
 */
class Partner_RealEstateController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        /* Initialize action controller here */
        $this->_Partner = new Application_Entity_Partnert();
        
    }

    public function listingAction() {
        $params = $this->_getAllParams();         
        $this->view->listPropertiesAgent = $this->_Partner
            ->listPropertiesAgent($this->_identityPartner->par_id,$params['id']);
        
        $col = $this->view->listPropertiesNotAgent = $this->_Partner
            ->listPropertiesNotAgent($this->_identityPartner->par_id,$params['id']);;
        print_r($col); exit;
        $this->view->tituloH1 = 'Agents';
        $this->view->tituloH2 = 'Agent/Listings';
    }

    public function locationAction() {
        $home = new Application_Entity_Home();
        unset($this->_sessionPartner->idHome);
        $this->view->idHome = $this->_request->getParam('home', '');
        $home->identifiqueHome($this->_request->getParam('home', ''), $this->_identityPartner->par_id);

        $ubigeo = new Application_Entity_Ubigeo();
        $estados = $ubigeo->getEstados();
        $this->view->data = $home->getProperties();
        $this->view->estados = Application_Entity_Ubigeo::getEstados();
        $this->view->ciudades = Application_Entity_Ubigeo::getCiudades($this->view->data['_state']);

        $this->view->dataVideo = $home->listingVideo();
        $this->view->dataFile = $home->listingsFile();

        if ($this->_request->isPost()) {
            $form = new Application_Form_RealEstateRegisterLocation();
            $ft = new Zend_File_Transfer();
            $fileTranferInfo = $ft->getFileInfo();
            $keysFileTranfer = array_keys($fileTranferInfo);

            $array_elemet = array(
                'fileLocation1',
                'fileLocation2',
                'fileLocation3');
            foreach ($array_elemet as $index) {
                if (!in_array($index, $keysFileTranfer)) {
                    $form->removeElement($index);
                }
            }
            //   exit;
            if ($form->isValid($this->_request->getParams())) {

                $input['_idPartner'] = $this->_identityPartner->par_id;
                $input['_title'] = $form->getElement('locationTitle')->getValue();
                $input['_description'] = $form->getElement('locationDescription')->getValue();
                $input['_addres'] = $form->getElement('locationAddress')->getValue();
                $input['_city'] = $form->getElement('locationCity')->getValue();
                $input['_state'] = $form->getElement('locationState')->getValue();
                $input['_suitApaUnit'] = $form->getElement('locationSuite')->getValue();
                $input['_zip'] = $form->getElement('locationZip')->getValue();
                $input['_latitud'] = $form->getElement('locationLatitud')->getValue();
                $input['_longitud'] = $form->getElement('locationLongitud')->getValue();
                $home->setProperties($input);
                if ($home->_id == '') {
                    $home->insertHome();
                } else {
                    $home->updateHome();
                }
                foreach ($fileTranferInfo as $file => $info) {
                    if ($ft->isUploaded($file)) {
                        $extn = pathinfo($form->{$file}->getFileName(), PATHINFO_EXTENSION);
                        $name = pathinfo($form->{$file}->getFileName(), PATHINFO_FILENAME);
                        $nameFile = $file . '_' . $this->_identityPartner->par_id . $home->_id . '.' . $extn;
                        $rutaFileAbs = $form->{$file}->getDestination() . '/' . $nameFile;
                        $form->{$file}->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                        if ($form->{$file}->receive()) {
                            $arrayFile[] = array(
                                'title' => $name,
                                'source' => $nameFile);
                        }
                    }
                }
                $home->setPropertie('_files', $arrayFile);
                $home->addFile();
                $arrayVideo = array(
                    $form->getElement('video1')->getValue(),
                    $form->getElement('video2')->getValue(),
                    $form->getElement('video3')->getValue()
                );
                $home->setPropertie('_videos', $arrayVideo);
                $home->addVideo();
                $this->_redirect('/partner/real-estate/features/home/' . $home->_id);
            } else {

                //print_r($form->getErrorMessages());
                //print_r($this->_request->getParams());
            }
        }
    }

    public function featuresAction() {
        $form = new Application_Form_RealEstateRegisterFeature();
        $this->view->listFeatures = $form->getElement('featureFeature')->getMultiOptions();
        $this->view->listBuildings = $form->getElement('featureBulinding')->getMultiOptions();
        $this->view->listAppliances = $form->getElement('featureAppliances')->getMultiOptions();
        $this->view->listPropertyStatus = $form->getElement('listingStatus')->getMultiOptions();
        $this->view->listPropertyType = $form->getElement('propertyType')->getMultiOptions();
        $this->view->listPropertyStyle = $form->getElement('style')->getMultiOptions();
        $this->view->listPropertyView = $form->getElement('view')->getMultiOptions();
        
        $this->view->listAvailable = $form->getElement('available')->getMultiOptions();
        $this->view->listBedroom = $form->getElement('bedroom')->getMultiOptions();
        $this->view->listBathrooms = $form->getElement('bathrooms')->getMultiOptions();
        $this->view->listGarage = $form->getElement('garage')->getMultiOptions();
        $this->view->listRecreation = $form->getElement('recreation')->getMultiOptions();
        $home = new Application_Entity_Home();
        $home->identifiqueHome($this->_request->getParam('home', ''), $this->_identityPartner->par_id);
        
        $this->view->dataHome = $home->getProperties();
        
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getParams())) {
                $input['_idPartner'] = $this->_identityPartner->par_id;
                $input['_status'] = $form->getElement('available')->getValue();
                $input['_idListingStatus'] = $form->getElement('listingStatus')->getValue();
                $input['_idPropertyType'] = $form->getElement('propertyType')->getValue();
                $input['_price'] = $form->getElement('priceValue')->getValue();
                $input['_houseDetail'] = $form->getElement('houseValue')->getValue();
                $input['_landDetail'] = $form->getElement('landValue')->getValue();
                $input['_bedroon'] = $form->getElement('bedroom')->getValue();
                $input['_bathrooms'] = $form->getElement('bathrooms')->getValue();
                $input['_idStyle'] = $form->getElement('style')->getValue();
                $input['_keywords'] = $form->getElement('keyword')->getValue();
                $input['_addressFeature'] = $form->getElement('address')->getValue();
                $input['_garage'] = $form->getElement('garage')->getValue();
                $input['_idView'] = $form->getElement('view')->getValue();
                $input['_size'] = $form->getElement('size')->getValue();
                $input['_recreationalAreas'] = $form->getElement('recreation')->getValue();
                $input['_featureFeature'] = $form->getElement('featureFeature')->getValue();
                $input['_featureBuilding'] = $form->getElement('featureBulinding')->getValue();
                $input['_featureAppliances'] = $form->getElement('featureAppliances')->getValue();
                $home->setProperties($input);
                $home->updateHome();
                $this->_redirect('/partner/real-estate/preview/home/'.$home->_id);
            }else{
//                print_r($form->getMessages());
  //              echo 'no gravo';
            }
        }
    }

    public function agentAssignAction() {
        // action body
    }
    public function previewAction() {
        // action body
    }

    public function listingPreviewAction() {
        // action body
    }

}
