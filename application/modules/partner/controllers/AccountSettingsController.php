<?php

class Partner_AccountSettingsController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        if ($this->_identityPartner->par_flag_customer == 0) {
            switch ($this->_identityPartner->id_rol) {
                case 1:
                    $this->_redirect('/partner/single-agent/plans');
                    break;
                case 2:
                    $this->_redirect('/partner/inscription-partnert/packages');
                    break;
                default:
                    break;
            }
            
        }
        /* Initialize action controller here */
    }

    public function indexAction() {
        $partner = new Application_Entity_Partnert();
        $partner->identifiquePartner($this->_identityPartner->par_id);
        $this->view->paymentDetails = $paymentDetails = $partner->verifiquePaymentDetails();
        $ubigeo = new Application_Entity_Ubigeo();
        $estados = $ubigeo->getEstados();
        $this->view->estado='';
        $this->view->ciudades =array();
        if(isset($paymentDetails['par_pay_state_id']) && $paymentDetails['par_pay_state_id']!=''){
            $this->view->estado = $ubigeo->getEstadoDeUnaCiudad($paymentDetails['par_pay_state_id']);
            $this->view->ciudades = $ubigeo->getCiudades($this->view->estado);
        }
        if ($this->_request->isPost()) {
            $form = new Application_Form_PaymentDetailsSingleAgent();
            if ($form->isValid($this->_request->getParams())) {
                $this->_sessionPartner->singleAgent['paymentDetail'] =
                        $form->getValues();
                if (!$paymentDetails) {
                    $partner->registerPaymentDetails($form->getValues());
                }else{
                    echo 'edicion';
                    $partner->updatePaymentDetails($form->getValues());
                }
                $this->_redirect('/partner/account-settings');
              
            } else {
                print_r($form->getMessages());
            }
        }
        $this->view->estados = Application_Entity_Ubigeo::getEstados();
    }

}

