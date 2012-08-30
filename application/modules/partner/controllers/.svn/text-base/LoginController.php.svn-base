<?php

class Partner_LoginController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        /* Initialize action controller here */
    }

    public function indexAction() {

        if ($this->_request->isPost()) {
            $usuario = new Application_Entity_Usuario();
            $params = $this->_request->getParams();
            if ($usuario->autentificateUser($params['mail'], $params['password'], 1)) {
                switch ($this->_identityPartner->rol_id) {
                    case 1:
                        $this->_redirect('/partner/single-agent/plans');
                        break;
                    case 2:
                        $this->_redirect('/partner/broker');
                        break;
                    case 3:
                        $this->_redirect('/partner/real-estate');
                        break;
                    case 4:
                        break;
                    default:
                        break;
                }
            }
        }
    }

}

