<?php
class CST_Controller_ActionPartner extends CST_Controller_Action {
    
    protected $_identityPartner;
    protected $_sessionPartner;
    
    public function init()
    {
        parent::init();
        $this->_identityPartner = Zend_Auth::getInstance()->getIdentity();
        $this->_sessionPartner = new Zend_Session_Namespace('sessionPartner');
        Zend_Layout::getMvcInstance()->setLayout('layout-partner');
        $this->view->identityPartner = $this->_identityPartner;
       //print_r(Zend_Registry::get('db'));
        
        if(isset($this->_sessionPartner->navigator)){
            //findOneByController
            $container = new Zend_Navigation($this->_sessionPartner->navigator);
            $this->view->navigation($container)
                    ->findOneByController($this->getRequest()->getControllerName());
        }else{
            
        }
    
    }
}
