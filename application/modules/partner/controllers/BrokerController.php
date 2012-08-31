<?php
class Partner_BrokerController extends CST_Controller_ActionPartnerBroker
{
    public function init()
    {
        parent::init();
        if($this->_identityPartner->rol_id == 2){
            if($this->_identityPartner->par_flag_customer==0){
                $this->_redirect('/partner/inscription-partnert/packages');
            }
        }else{
            $this->_redirect('/partner');
        }
    }
    
    public function indexAction()
    {
        
    }
   
    public function profilePageAction()
    {
        
    }
    
    public function agentsAction()
    {  
    }
    
    public function agentsProfileAction()
    {
       if($this->_request->isPost())
       {
           $params = $this->_request->getParams();
           $broker = new Application_Entity_PartnertBrokerages();
           
        
       }
    }
    public function realEstateListingsAction()
    {
        
    }
    
    public function emailPreferencesAction()
    {
        
    }
    
    public function martekingServiceAction()
    {
        
    }
        
}