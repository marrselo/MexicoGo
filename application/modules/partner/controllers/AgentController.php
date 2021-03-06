<?php

class Partner_AgentController extends CST_Controller_ActionPartner
{
    public function init()
    {
        parent::init();
        $this->modelAgent = new Application_Entity_Agent($this->_identityPartner->par_id);        
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->listAgentPublic = $this->modelAgent->listAgentsState(1);       
        $this->view->listAgentUnpublic = $this->modelAgent->listAgentsState(0);
        
    }
    public function createAction()
    {        
        if($this->_request->isPost())
        {            
            
            //$values = $this->_request->getParams();       
            $form = new Application_Form_AgentForm();
           if($form->isValid($this->_request->getParams())){
           $values = $form->getValues(); 
            $data = array();
            $data['_ageFirstName']=$values['firstName'];
            $data['_ageLastName'] = $values['lastName'];
            $data['_ageEmail']= $values['nameEmail'];
            $data['_agePhoto']=isset($values['image'])?$values['image'] : '';
            $data['_ageWebsite']= $values['profileWebsite'];
            $data['_ageBrokerage'] = $values['profileBrokerage'];
            $data['_ageProfileDsc'] = $values['agentDsc'];
            $data['_agePhone'] = $values['prePhone'].'-'.
                $values['phone'].'-'.$values['postPhone'];
            $data['_ageMobilePhone'] = $values['prePhone2'].'-'.
                $values['phone2'].'-'.$values['postPhone2'];            
            $this->modelAgent->setProperties($data);
            $idAgent = $this->modelAgent->createAgents();               
            $partner = new Application_Entity_Partnert();
            $col = $partner->listProperties($this->_identityPartner->par_id);
                        
            if(empty($col)){
                $this->_redirect('/partner/agent/');
            }else{        
                $this->_redirect('/partner/real-estate/listing/id/'.$idAgent);
                //$this->_forward('listing','real-estate','partner',array('idAge'=>$idAgent));
            }
           }else{
               print_r($form->getMessages());
           }
        }
    }
    public function editAction()
    {
        
    }
    public function previewAction()
    {
        
    }
    public function publishAction()
    {
        $id = $this->getRequest()->getParam('id',0);
        if(!isset($this->_identityPartner->par_id) || empty($id)){                        
            $this->_redirect("/");
        }   
        $this->modelAgent->publish($id,1);
        $this->_redirect('partner/agent');
    }
    public function unpublishAction()
    {
        $id = $this->getRequest()->getParam('id',0);
        if(!isset($this->_identityPartner->par_id) || empty($id)){
            $this->_redirect("/");
        }
        $this->modelAgent->publish($id,0);
        $this->_redirect('partner/agent');
    }
    
    public function deleteAgentAction()
    {
        $id = $this->getRequest()->getParam('id',0);
        if(!isset($this->_identityPartner->par_id) || empty($id)){
            $this->_redirect("/");
        }
        $this->modelAgent->deleteAgents($id);        
        $this->_redirect('partner/agent');
    }
}

