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
class Partner_InscriptionController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function createAccountAction() {
        $partner = new Application_Entity_Partnert();
        $usuario = new Application_Entity_Usuario();
        $this->view->arrayTypePartner = $partner->listingsPartnersAcountType();
        $this->view->arrayOtherTypePartner = $partner->listingsOtherAccountType();
        if ($this->_request->isPost()) {
            $form = new Application_Form_CreateAccount();
            if ($form->isValid($params = $this->_request->getParams())) {
                //echo $this->_request->getParam('accountType');


                /* setear los datos de la entidad usuario */
                $dataUsuario['_nombreUsuario'] = $params['firstName'];
                $dataUsuario['_apellidosUsuario'] = $params['lastName'];
                $dataUsuario['_email'] = $params['mail'];
                $dataUsuario['_login'] = $params['mail'];
                $dataUsuario['_password'] = $params['password'];
                $dataUsuario['_recibeOferta'] = $params['emailUpdates'];
                //$dataUsuario[''] = $params['promoCode'];
                //$dataUsuario[''] = $params['firstNameSalesRepresentative'];
                //$dataUsuario[''] = $params['lastNameSalesRepresentative'];
                //$dataUsuario[''] = $params['accountType'];
                $usuario->setProperties($dataUsuario);
                /* setear los datos de la entidad partnert */
                //$dataPartnert['_nombreUsuario'] = $params['firstName'];
                //$dataPartnert['_apellidosUsuario'] = $params['lastName'];
                $dataPartnert['_email'] = $params['mail'];
                $dataPartnert['_nick'] = $params['mail'];
                $dataPartnert['_tipoCuenta'] = $params['accountType'];
                $partner->setProperties($dataPartnert, $usuario);
                $partner->createPartner();
                $usuario->autentificateUser($params['mail'], $params['password'],1);
                switch ((int) $this->_request->getParam('accountType')) {
                    case 1:
                        $this->_redirect('/partner/single-agent/plans');
                        break;
                    case 2:
                        $this->_redirect('/partner/inscription-partnert/packages');
                        break;
                    case 3:
                        $this->_redirect('/partner/inscription-partnert/packages');
                        break;
                    case 4:
                        break;
                    default:
                        break;
                }
            } else {
                $this->view->message = $form->getMessages();
            }
        }
    }

}
