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
        if($this->_request->isPost());
        {
            echo "POST"; exit;
            $values = $this->_request->getParams();       
            //print_r($values); exit;             
            //$values = $form->getValues(); 
            $data = array();
            $data['_ageFirstName']=$values['firstName'];
            $data['_ageLastName'] = $values['lastName'];
            $data['_ageEmail']= $values['nameEmail'];
            $data['_agePhoto']=$values['image'];
            $data['_ageWebsite']= $values['profileWebsite'];
            $data['_ageBrokerage'] = $values['profileBrokerage'];
            $data['_ageProfileDsc'] = $values['agentDsc'];
            $data['_agePhone'] = $values['prePhone'].'-'.
                $values['phone'].'-'.$values['postPhone'];
            $data['_ageMobilePhone'] = $values['prePhone2'].'-'.
                $values['phone2'].'-'.$values['postPhone2'];            
            $this->modelAgent->setProperties($data);
            $this->modelAgent->createAgents();             
            $this->_redirect('/partner/agent/');           
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
   
}

