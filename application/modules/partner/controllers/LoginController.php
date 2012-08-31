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
                        $this->getNavigationSinglePartner();
                        $this->_redirect('/partner/single-agent/plans');
                        break;
                    case 2:
                        $this->getNavigationBroker();
                        $this->_redirect('/partner/broker');
                        break;
                    case 3:
                        $this->getNavigationProfiler();
                        $this->_redirect('/partner/real-estate');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    private function getNavigationSinglePartner() {
        $container = new Zend_Navigation(array(
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
                                'order' => 1
                            ),)
                    ),
                    array(
                        'label' => 'EMAIL PREFERENCES',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'email-preferences',
                        'order' => 1
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'account-password',
                        'order' => 1
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'sign out',
                        'order' => 1
                    ),
                ));
        $this->setRegisterNavigation($container);
    }

    private function getNavigationBroker() {
        $container = new Zend_Navigation(array(
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
                        'pages' => array(
                            array(
                                'label' => 'AGENT',
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
                                'order' => 1
                            ),
                            array(
                                'label' => 'REAL ESTATE LISTINGS',
                                'id' => 'account-settings-menu',
                                'module' => 'partner',
                                'controller' => 'real-estate',
                                'order' => 1
                            ),)
                    ),
                    array(
                        'label' => 'EMAIL PREFERENCES',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'email-preferences',
                        'order' => 1
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'account-password',
                        'order' => 1
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'sign out',
                        'order' => 1
                    ),
                ));
        $this->setRegisterNavigation($container);
    }

    private function getNavigationProfiler() {
        $container = new Zend_Navigation(array(
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
                        'order' => 1
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'account-password',
                        'order' => 1
                    ),
                    array(
                        'label' => 'ACCOUNT PASSWORD',
                        'id' => 'account-settings-menu',
                        'module' => 'partner',
                        'controller' => 'my-account',
                        'action' => 'sign out',
                        'order' => 1
                    ),
                ));
        $this->setRegisterNavigation($container);
    }

    private function setRegisterNavigation(Zend_Navigation $navigator) {
        Zend_Registry::set('CstNavigator', $navigator);
    }

}

