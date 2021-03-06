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
class Partner_SingleAgentController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        if (!$this->_identityPartner) {
            $this->_redirect('/');
        }

        //print_r($this->_identity);
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function plansAction() {
        $priceFeature = Application_Entity_Parametros::getParamValue
                        (Application_Entity_Parametros::PRICEFEATURESINGLEPARTNER);
        $listingsSingleAgentPackages = Application_Entity_Partnert::
                listingsSingleAgentPackages();
        if ($this->_request->isPost()) {
            $form = new Application_Form_SingleAgentSelectPlans();
            foreach ($listingsSingleAgentPackages as $index) {
                if ($index['single_agent_packages_id'] ==
                        $this->_request->getParam('checkSingleAgentPlans')) {
                    $this->_sessionPartner->singleAgent['plansSelect']
                            ['packagesListing'] =
                            $index['single_agent_packages_listing'];
                    $this->_sessionPartner->singleAgent['plansSelect']
                            ['packagesPrice'] =
                            $index['single_agent_packages_permonth'];
                    if ($index['single_agent_packages_listing'] > 1)
                        for ($i = 1; $i <= $index['single_agent_packages_listing']; $i++) {
                            $arraySingleAgentFeature[$i] = $i;
                        }
                    if ($index['single_agent_packages_listing'] == 1)
                        $arraySingleAgentFeature = array(1 => 1);
                }
            }
            $form->addElement(new Zend_Form_Element_Select('selectSingleAgentFeature',
                            array(
                                'multiOptions' => $arraySingleAgentFeature,
                    )));
            if ($form->isValid($this->_request->getParams())) {
                if (isset($this->_sessionPartner->singleAgent['plansSelect'])) {
                    $this->_sessionPartner->singleAgent['plansSelect'] =
                            array_merge(
                            $this->_sessionPartner->singleAgent['plansSelect'], $form->getValues()
                    );
                } else {
                    $this->_sessionPartner->singleAgent['plansSelect'] =
                            $form->getValues();
                }
                $this->_sessionPartner->singleAgent['plansSelect']
                        ['rangeFeatures'] = $arraySingleAgentFeature;
                $this->_sessionPartner->singleAgent['priceFeature'] =
                        $priceFeature;
                $this->_redirect('/partner/single-agent/plan-details');
            } else {
                $this->view->formError = $form->getMessages();
            }
        }
        if (isset($this->_sessionPartner->singleAgent['plansSelect'])) {
            $this->view->plansSelect =
                    $this->_sessionPartner->singleAgent['plansSelect'];
        }
        $this->view->priceFeature = $priceFeature;
        $this->view->listingsSingleAgentPackages = $listingsSingleAgentPackages;
    }

    public function planDetailsAction() {
        if (isset($this->_sessionPartner->singleAgent['plansSelect'])) {
            $this->view->plansSelect =
                    $this->_sessionPartner->singleAgent['plansSelect'];
            $this->view->priceFeature =
                    $this->_sessionPartner->singleAgent['priceFeature'];
        }
        if ($this->_request->isPost()) {
            $this->_redirect('/partner/single-agent/payment-details');
        }
    }

    public function paypalAction(){
        
    }
    public function paymentDetailsAction() {
        $partner = new Application_Entity_PartnertSingleAgent();
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
                $this->_redirect('/partner/single-agent/paypal');
              
            } else {
                print_r($form->getMessages());
            }
        }
        $this->view->estados = Application_Entity_Ubigeo::getEstados();
    }

}
