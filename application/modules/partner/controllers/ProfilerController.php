<?php

class Partner_ProfilerController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        /* Initialize action controller here */
    }

    public function indexAction() {
        $partner = new Application_Entity_PartnertEnterprises();
        $partner->identifiquePartner($this->_identityPartner->par_id);
        $this->view->dataProfiler = $dataProfiler = $partner->getProfiler();
        $this->view->dataVideo  = $partner->getVideoProfiler();
        $this->view->file  = $partner->getProfilerFile();
        if ($this->_request->isPost()) {
            $form = new Application_Form_Profiler();
            $ft = new Zend_File_Transfer();
            $fileTranferInfo = $ft->getFileInfo();
            $keysFileTranfer = array_keys($fileTranferInfo);
            $array_elemet=array(
                'fileProfiler1',
                'fileProfiler2',
                'fileProfiler3');
            foreach($array_elemet as $index){
                if(!in_array($index,$keysFileTranfer)){
                    $form->removeElement($index);
                }
            }
            if ($form->isValid($this->_request->getParams())) {
                foreach($fileTranferInfo as $file => $info){
                    $extn = pathinfo($form->{$file}->getFileName(), PATHINFO_EXTENSION);
                    $name = pathinfo($form->{$file}->getFileName(), PATHINFO_FILENAME);
                    $nameFile = $file.'_'.$this->_identityPartner->par_id . '.' . $extn;
                    $rutaFileAbs = $form->{$file}->getDestination() . '/' . $nameFile;
                    $form->{$file}->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    if ($form->{$file}->receive()) {
                        $arrayFile[]=array(
                            'title'=>$name,
                            'source'=>$nameFile);
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
                
                $this->_redirect('/partner/profiler');
            } else {
//                print_r($form->getErrorMessages());
//                print_r($this->_request->getParams());
            }
        }
    }

}

