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
        // action body
    }

    public function locationAction() {
        $partner = new Application_Entity_PartnertEnterprises();
        $partner->identifiquePartner($this->_identityPartner->par_id);
        $ubigeo = new Application_Entity_Ubigeo();
        $estados = $ubigeo->getEstados();
        $this->view->estados = Application_Entity_Ubigeo::getEstados();
        $this->view->dataVideo = $partner->getVideoProfiler();
        $this->view->file = $partner->getProfilerFile();
        $this->view->location = $partner->getLocationProfiler();
        $this->view->listingSubCategoria = $partner->listingsOtherAccountType();
        $this->view->listingSubcategoriaRel = $partner->getSubCategoriePartnerRel();
        $this->view->listingCategoriaRel = $partner->getCategoriePartnerRel();
        $this->view->listingCategoria = $partner->listingsCategories();
        if ($this->_request->isPost()) {
            $form = new Application_Form_Profiler();
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
            if ($form->isValid($this->_request->getParams())) {
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

                $partner->registerProfiler($input);
                $videosInput = array(
                    $form->getElement('profileVideo1')->getValue(),
                    $form->getElement('profileVideo2')->getValue(),
                    $form->getElement('profileVideo3')->getValue()
                );
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
                print_r($form->getErrorMessages());
                print_r($this->_request->getParams());
            }
        }
    }

    public function featuresAction() {
        // action body
    }

    public function agentAssignAction() {
        // action body
    }

    public function listingPreviewAction() {
        // action body
    }

}
