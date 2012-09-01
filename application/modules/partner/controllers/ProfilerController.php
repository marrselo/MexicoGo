<?php

class Partner_ProfilerController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        /* Initialize action controller here */
    }

    public function indexAction() {
        if ($this->_request->isPost()) {
            $form = new Application_Form_Profiler();
            if ($form->isValid($this->_request->getParams())) {
                $array =$form->fileProfiler1->getFileName();
                if (!empty($array)) {
                    $extn = pathinfo($form->fileProfiler1->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'fileProfiler1_'.$this->_identityPartner->par_id . '.' . $extn;
                    $rutaFileAbs = $form->fileProfiler1->getDestination() . '/' . $nameFile;
                    $form->fileProfiler1->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    if (!$form->fileProfiler1->receive()) {
                        echo 'no subio la fileProfiler';
                    }
                }
                $array =$form->fileProfiler2->getFileName();
                if (!empty($array)) {

                    $extn = pathinfo($form->fileProfiler2->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'fileProfiler2_'.$this->_identityPartner->par_id . '.' . $extn;
                    $rutaFileAbs = $form->fileProfiler2->getDestination() . '/' . $nameFile;
                    $form->fileProfiler2->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    if (!$form->fileProfiler2->receive()) {
                        echo 'no subio la fileProfiler';
                    }
                }
                $array =$form->fileProfiler3->getFileName();
                if (!empty($array)) {

                    $extn = pathinfo($form->fileProfiler3->getFileName(), PATHINFO_EXTENSION);
                    $nameFile = 'fileProfiler3_'.$this->_identityPartner->par_id . '.' . $extn;
                    $rutaFileAbs = $form->fileProfiler3->getDestination() . '/' . $nameFile;
                    $form->fileProfiler3->addFilter('Rename', array('target' => $rutaFileAbs, 'overwrite' => true));
                    if (!$form->fileProfiler3->receive()) {
                        echo 'no subio la fileProfiler';
                    }
                }
            } else {
                print_r($form->getMessages());
            }
        }
    }

}

