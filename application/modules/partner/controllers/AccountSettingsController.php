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
        // action body
    }

}

