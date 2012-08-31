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
                $this->_identityPartner = Zend_Auth::getInstance()->getIdentity();
                switch ($this->_identityPartner->rol_id) {
                    case 1:
                        $this->getNavigationSinglePartner();
                        $this->_redirect('/partner/account-settings');
                        break;
                    case 2:
                        $this->getNavigationBroker();
                        $this->_redirect('/partner/account-settings');
                        break;
                    case 3:
                        $this->getNavigationProfiler();
                        $this->_redirect('/partner/account-settings');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    private function getNavigationSinglePartner() {
        $container = array(
                    array(
                        'label' => 'ACCOUNT SETTINGS',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'account-settings',
                        'order' => 1
                    ),
                    array(
                        'label' => 'Manage your',
                        'id' => 'account-settings-menu',
                        'uri' => '#',
                        'order' => 2,
                        'pages' => array(
                            array(
                                'label' => 'AGENT',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'agent',
                                'action' => 'edit',
                                'order' => 1
                            ),
                            array(
                                'label' => 'REAL ESTATE LISTINGS',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'real-estate',
                                'order' => 2
                            ),)
                    ),
                    array(
                        'label' => 'EMAIL PREFERENCES',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'email-preferences',
                        'order' => 3
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'account-password',
                        'order' => 4
                    ),
                    array(
                        'label' => 'SIGN OUT',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'sign-out',
                        'order' => 5
                    ),
                );

        $this->setRegisterNavigation($container);
    }

    private function getNavigationBroker() {
        $container = array(
                    array(
                        'label' => 'ACCOUNT SETTINGS',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'account-settings',
                        'order' => 1
                    ),
                    array(
                        'label' => 'Manage your',
                        'id' => 'account-settings-menu',
                        'uri' => '#',
                        'order' => 2,
                        'pages' => array(
                            array(
                                'label' => 'PROFILER',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'profiler',
                                'order' => 1
                            ),
                            array(
                                'label' => 'AGENT',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'agent',
                                'order' => 2
                            ),
                            array(
                                'label' => 'REAL ESTATE LISTINGS',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'real-estate',
                                'order' => 3
                            ),)
                    ),
                    array(
                        'label' => 'EMAIL PREFERENCES',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'email-preferences',
                        'order' => 3
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'account-password',
                        'order' => 4
                    ),
                    array(
                        'label' => 'SIGN OUT',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'sign-out',
                        'order' => 5
                    ),
                );
        $this->setRegisterNavigation($container);
    }

    private function getNavigationProfiler() {
        $container = array(
                    array(
                        'label' => 'ACCOUNT SETTINGS',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'account-settings',
                        'order' => 1
                    ),
                    array(
                        'label' => 'Manage your',
                        'id' => 'account-settings-menu',
                        'uri' => '#',
                        'order' => 2,
                        'pages' => array(
                            array(
                                'label' => 'AGENT',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'profiler',
                                'order' => 1
                            ),
                        )
                    ),
                    array(
                        'label' => 'EMAIL PREFERENCES',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'email-preferences',
                        'order' => 3
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'account-password',
                        'order' => 4
                    ),
                    array(
                        'label' => 'SIGN OUT',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'sign-out',
                        'order' => 5
                    ),
                );
        $this->setRegisterNavigation($container);
    }

    private function setRegisterNavigation(array $navigator) {
        $this->_sessionPartner->navigator = $navigator;
    }

}

