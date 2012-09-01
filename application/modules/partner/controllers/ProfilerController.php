<?php

class Partner_ProfilerController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        /* Initialize action controller here */
    }

    public function indexAction() {
        //$uri ='https://vimeo.com/32060845';
        //print_r(CST_Utils::validateUrlVimeo($uri));
        
        $partner = new Application_Entity_PartnertEnterprises();
        $partner->identifiquePartner($this->_identityPartner->par_id);
        $this->view->dataProfiler = $dataProfiler = $partner->getProfiler();
        $this->view->dataVideo  = $partner->getVideoProfiler();
        $this->view->file  = $partner->getProfilerFile();
        
        if ($this->_request->isPost()) {
            $form = new Application_Form_Profiler();
            if ($form->isValid($this->_request->getParams())) {
                $array =$form->fileProfiler1->getFileName();
                if (!empty($array)) {
                    $extn = pathinfo($form->fileProfiler1->getFileName(), PATHINFO_EXTENSION);
                    $name = pathinfo($form->fileProfiler1->getFileName(), PATHINFO_FILENAME);
                    $nameFile = 'fileProfiler1_'.$this->_identityPartner->par_id . '.' . $extn;
                    $rutaFileAbs = $form->fileProfiler1->getDestination() . '/' . $nameFile;
                    $form->fileProfiler1->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    if ($form->fileProfiler1->receive()) {
                        $arrayFile[0]['title']= $name;
                        $arrayFile[0]['source']= $nameFile;
                    }
                }
                $array =$form->fileProfiler2->getFileName();
                if (!empty($array)) {

                    $extn = pathinfo($form->fileProfiler2->getFileName(), PATHINFO_EXTENSION);
                    $name = pathinfo($form->fileProfiler2->getFileName(), PATHINFO_FILENAME);
                    $nameFile = 'fileProfiler2_'.$this->_identityPartner->par_id . '.' . $extn;
                    $rutaFileAbs = $form->fileProfiler2->getDestination() . '/' . $nameFile;
                    $form->fileProfiler2->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    if ($form->fileProfiler2->receive()) {
                        $arrayFile[1]['title']= $name;
                        $arrayFile[1]['source']= $nameFile;
                    }
                }
                
                $array =$form->fileProfiler3->getFileName();
                if (!empty($array)) {

                    $extn = pathinfo($name=$form->fileProfiler3->getFileName(), PATHINFO_EXTENSION);
                    $name = pathinfo($form->fileProfiler2->getFileName(), PATHINFO_FILENAME);
                    $nameFile = 'fileProfiler3_'.$this->_identityPartner->par_id . '.' . $extn;
                    $rutaFileAbs = $form->fileProfiler3->getDestination() . '/' . $nameFile;
                    $form->fileProfiler3->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    if ($form->fileProfiler3->receive()) {
                        $arrayFile[2]['title']= $name;
                        $arrayFile[2]['source']= $nameFile;
                    }
                }
                $input['company'] = $form->getElement('profileCompany')->getValue();
                $input['email']=$form->getElement('profileEmail')->getValue();
                $input['website']=$form->getElement('profileWebsite')->getValue();
                $input['phome11']=$form->getElement('profilePhone11')->getValue();
                $input['phome12']=$form->getElement('profilePhone12')->getValue();
                $input['phome13']=$form->getElement('profilePhone13')->getValue();
                $input['phome21']=$form->getElement('profilePhone21')->getValue();
                $input['phome22']=$form->getElement('profilePhone22')->getValue();
                $input['phome23']=$form->getElement('profilePhone23')->getValue();
                $input['phome31']=$form->getElement('profilePhone31')->getValue();
                $input['phome32']=$form->getElement('profilePhone32')->getValue();
                $input['phome33']=$form->getElement('profilePhone33')->getValue();
                $input['descripcion']=$form->getElement('profileCompany')->getValue();
                $input['phoneDes1']=$form->getElement('profilePhoneDescription1')->getValue();
                $input['phoneDes2']=$form->getElement('profilePhoneDescription2')->getValue();
                $input['phoneDes3']=$form->getElement('profilePhoneDescription3')->getValue();
                $partner->registerProfiler($input);
                $videosInput = array(
                    $form->getElement('profileVideo1')->getValue(),
                    $form->getElement('profileVideo2')->getValue(),
                    $form->getElement('profileVideo3')->getValue()
                );
                $partner->addVideoProfiler($videosInput);
                $partner->addFileProfiler($arrayFile);
                print_r($arrayFile);
               // $this->_redirect('/partner/profiler');
            } else {
                print_r($form->getMessages());
            }
        }
    }

}

