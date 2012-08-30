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
class Partner_InscriptionPartnertController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        if (!$this->_identityPartner) {
            $this->_redirect('/');
        }
        $container = new Zend_Navigation(
                        array(
                            array('label' => 'MEXI-GO! PACKAGES',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'inscription-partnert',
                                'action' => 'packages',
                            ),
                            array('label' => 'CONTACT',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'inscription-partnert',
                                'action' => 'contact',
                            ),
                            array('label' => 'ADD ONLINE',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'inscription-partnert',
                                'action' => 'add-online',
                            ),
                            array('label' => 'PRINT MAGAZINE',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'inscription-partnert',
                                'action' => 'print-megazine',
                            ),
                            array('label' => 'ONLINE-MAGAZINE',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'inscription-partnert',
                                'action' => 'online-megazine',
                            ),
                        )
        );
        $this->view->navigation($container);

        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function packagesAction() {
        if ($this->_request->isPost()) {
            $this->_sessionPartner->packageInformativePartner =
                    $this->_getParam('package');
            $this->_redirect('/partner/inscription-partnert/contact');
        }
        $this->view->typeAccount = $this->_identityPartner->par_acount_type_id;
    }

    public function contactAction() {
        
        $fc = Zend_Controller_Front::getInstance();
        $paramConfig = $fc->getParam("bootstrap")->getOption("paramConfig");
        switch ($this->_identityPartner->par_acount_type_id) {
            case 2:
                $partner = new Application_Entity_PartnertBrokerages();
                break;
            case 3:
                $partner = new Application_Entity_PartnertRealState();
                break;
        }
        $this->view->infoAbaut = Application_Entity_InfoAbaut::listingsInfoAbaut();
        $form = new Application_Form_ContactPartnerInscription();
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getParams())) {

                $usuario = new Application_Entity_Usuario();
                $usuario->setIdentification($this->_identityPartner->usu_id);
                $infoAbaut = $form->getValue('infoabaut');

                if (is_array($infoAbaut) && !empty($infoAbaut)) {
                    foreach ($infoAbaut as $index) {
                        $usuario->insetInsertInfoAbaut($index);
                    }
                }
                $mail = new CST_Mail();
                $mail->setMensaje('
                    <h2>Thanks for writing</h2>
                    <p>
                    Shortly we will contact with you
                    ');
                $mail->setAsunto('Contact');
                $mail->addDestinatario(array(
                    'mail' => $this->_identityPartner->usu_correo,
                    'name' => $this->_identityPartner->usu_nombre));
                $flashMessenger = $this->_helper->FlashMessenger;
                if (!$mail->send()) {
                    $flashMessenger->addMessage('Failed to send');
                } else {
                    $flashMessenger->addMessage('Satisfactory shipping');
                }
                /* enviar correo al administrador */
                $messageBanner = '';
                if (is_array($this->_sessionPartner->promoteBrand)) {
                    $messageBanner = '<hr></hr><h3> banner that interests </h3><br>';
                    foreach (Application_Entity_Banner::listingsBanners() as $index) {
                        if (array_search($index['mexi_banners_id'], $this->_sessionPartner->promoteBrand) != FALSE) {
                            $messageBanner .= $index['mexi_banners_nombre'] . '<br>';
                        }
                    }
                    $messageBanner .= '<hr></hr>';
                    $messageBanner .= '<p>';
                }
                $messagePackage = '';
                if ($this->_sessionPartner->packageInformativePartner != '') {
                    $infoPackage = $partner->getPackagesInformative(
                            $this->_sessionPartner->packageInformativePartner
                    );
                    if ($infoPackage != FALSE) {
                        $messagePackage.= 'le interesa el paquete ' .
                                '<h3>' . $infoPackage['part_pack_infor_name'] . '</h3>' .
                                '<p> Descripcion: <p>' .
                                $infoPackage['part_pack_infor_descripcion'] .
                                '<p> Detalle: <p>' .
                                $infoPackage['part_pack_infor_details'];
                    }
                }
                $message = $messageBanner.$messagePackage;
                $mail = new CST_Mail();
                $mail->setMensaje($message);
                $mail->addDestinatario(array(
                    'mail' => $paramConfig['correoContacto'],'name'=>''
                        ));
                $mail->setAsunto('Contact Partner');
                $mail->send();
                $this->_redirect('/partner/inscription-partnert/contact');
            }
        }
        $this->view->form = $form;
    }

    public function addOnlineAction() {
        $this->view->banners = CST_Utils::arrayAsoccForFirstItem(
                        Application_Entity_Banner::listingsBanners(), 'mexi_banners_type_nombre');
        if ($this->_request->isPost()) {
            $this->_sessionPartner->promoteBrand =
                    $this->_getParam('banner');
            $this->_redirect('/partner/inscription-partnert/contact');
        }
    }

    public function printMegazineAction() {
        // action body
    }

    public function onlineMegazineAction() {
        // action body
    }

}
