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
        if(Zend_Registry::isRegistered('CstNavigator')){
            $this->view->navigation(Zend_Registry::get('CstNavigator'));
        }else{
            
        }
     
    }
}
