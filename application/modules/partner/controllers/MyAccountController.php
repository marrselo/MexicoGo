<?php

class Partner_MyAccountController extends CST_Controller_ActionPartner
{

    public function init()
    {
        parent::init();
        /* Initialize action controller here */
    }

    
    public function emailPreferencesAction()
    {
        $form = new Application_Form_EmailPreferences();
        
        $usuario = new Application_Entity_Usuario();
        $usuario->setIdentification($this->_identityPartner->usu_id);
        $this->view->data = $usuario->getInfoAbaut();
        $this->view->infoAbaut = $form->getElement('infoAbaut')->getMultiOptions();
        if ($this->_request->isPost()){
            if($form->isValid($this->_getAllParams())){
                
                if($form->getElement('unsubscribe')->getValue()==1){
                    $usuario->unsubscribeEmail();
                }else{
                    $usuario->insertInfoAbaut($form->getElement('infoAbaut')->getValue());
                }
            }
            $this->_redirect('/partner/my-account/email-preferences');
        }
        // action body
    }
    
    public function accountPasswordAction()
    {
        $usuario = new Application_Entity_Usuario();
        
        $usuario->setIdentification($this->_identityPartner->usu_id);

        $form = new Application_Form_ResetPassword();
        if ($this->_request->isPost()){
            if($form->isValid($this->_getAllParams())){
                $usuario->resetPassword(
                        $form->getElement('accountCurrentPass')->getValue(), 
                        $form->getElement('accountNewPass')->getValue(), 
                        $form->getElement('accountVerifyPass')->getValue());
                $this->_redirect('/partner/my-account/account-password');
            }
        }
    }
    
    public function signOutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/partner/login');
    }


}

