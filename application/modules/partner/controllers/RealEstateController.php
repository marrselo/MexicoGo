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
    }

    public function listingsAction() {
        // ody
    }

    public function locationAction() {
        $home = new Application_Entity_Home();
        $home->identifiqueHome($this->_sessionPartner->idHome);
        $ubigeo = new Application_Entity_Ubigeo();
        $estados = $ubigeo->getEstados();
        $this->view->estados = Application_Entity_Ubigeo::getEstados();
        $this->view->dataVideo = $home->listingVideo();
        $this->view->file = $home->listingsFile();
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
            if ($form->isValid($this->_request->getParams())) {
                foreach ($fileTranferInfo as $file => $info) {
                    if ($ft->isUploaded($file)) {
                        $extn = pathinfo($form->{$file}->getFileName(), PATHINFO_EXTENSION);
                        $name = pathinfo($form->{$file}->getFileName(), PATHINFO_FILENAME);
                        $nameFile = $file . '_' . $this->_identityPartner->par_id.rand(1,800) . '.' . $extn;
                        $rutaFileAbs = $form->{$file}->getDestination() . '/' . $nameFile;
                        $form->{$file}->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                        if ($form->{$file}->receive()) {
                            $arrayFile[] = array(
                                'title' => $name,
                                'source' => $nameFile);
                        }
                    }
                }
                $input['_title'] = $form->getElement('locationTitle')->getValue();
                $input['_description'] = $form->getElement('locationDescription')->getValue();
                $input['_addres'] = $form->getElement('locationAddress')->getValue();
                $input['_city'] = $form->getElement('locationCity')->getValue();
                $input['_state'] = $form->getElement('locationState')->getValue();
                $input['_suitApaUnit'] = $form->getElement('profileLocationSuite')->getValue();
                $input['_zip'] = $form->getElement('profilerLocationZip')->getValue();
                $input['_latitud'] = $form->getElement('profileLocationLatitud')->getValue();
                $input['_longitud'] = $form->getElement('profileLocationLongitud')->getValue();
                $input['_videos'] = array(
                    $form->getElement('profileVideo1')->getValue(),
                    $form->getElement('profileVideo2')->getValue(),
                    $form->getElement('profileVideo3')->getValue()
                );
                $input['_files'] = $arrayFile;
                $home->setProperties($input);
                if($this->_sessionPartner->idHome==''){
                    $home->insertHome();
                    $this->_sessionPartner->idHome = $home->_id;
                }else{
                    $home->updateHome();
                }
                $home->addVideo();
                $home->addFile();
                $this->_redirect('/partner/real-estate/features/home/'.$this->_sessionPartner->idHome);
            } else {
                print_r($form->getErrorMessages());
                print_r($this->_request->getParams());
            }
        }
    }

    public function featuresAction() {
        $this->view->listFeatures = Application_Entity_Feature::listFeatures();        
        $this->view->listBuildings = Application_Entity_Building::listBuildings();        
        $this->view->listAmenities = Application_Entity_Amenities::listAmenities();        
        $this->view->listApplianve = Application_Entity_Appliance::listAppliances();
        print_r($this->view->listApplianve);exit;
    }

    public function agentAssignAction() {
        // action body
    }

    public function listingPreviewAction() {
        // action body
    }

}
