<?php

class CST_Controller_ActionPartnerBroker extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        $container = new Zend_Navigation(array(
                    array('label' => 'ACCOUNT SETTINGS',
                        'id' => 'account-settings-menu',
                        'action' => 'account-settings',
                        'controller' => 'broker',
                        'order' => 1
                    ),
                    array('label' => 'Manage your',
                        'controller' => 'broker',
                        'order' => 2,
                        'id' => 'manage-your-style',
                        'class' => 'menu-lateral-bg-gris-oscuro',
                        'pages' => array(
                            array(
                                'label' => 'AGENTS',
                                'action' => 'agents',
                                'controller' => 'broker',
                                'title' => 'go to agents',
                                'class' => 'lateral text-yellow',
                                'active' => true
                            ),
                            array(
                                'label' => 'REAL ESTATE LISTINGS',
                                'action' => 'real-estate-listings',
                                'controller' => 'broker',
                                'title' => 'go to real estate listings',
                                'class' => 'text-yellow menu-lateral-relative',
                                'active' => false
                            ),
                        )
                    ),
                    array(
                        'label' => 'BUY',
                        'class' => 'text-yellow menu-lateral-bg-gris-claro',
                        'id' => 'menu-buy',
                        'order' => 3,
                        'uri' => '#',
                         'pages' =>array(
                        array(
                            'label' => 'EMAIL PREFERENCE',
                            'class' => 'lateral',
                            'action' => 'email-preference',
                            'controller' => 'broker',
                            'active' => false
                        ),
                        array(
                            'label' => 'ACCOUNT PASSWORD',
                            'class' => '',
                            'action' => 'reset-password',
                            'controller' => 'broker'
                        ),
                        array(
                            'label' => 'SIGN OUT',
                            'class' => '',
                            'controller' => 'broker',
                            'action' => 'sign-out'
                        ))
                    )
                ));
        $this->view->navigation($container);
    }

}
