<?php

class Partner_AgentController extends CST_Controller_ActionPartner
{
    public function init()
    {
        parent::init();
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      
    }
    public function createAction()
    {
        if($this->_request->isPost())
        {
            $values = $this->_request->getParams();       
            //print_r($values); exit; 
            $agent = new Application_Entity_Agent($this->_identityPartner->par_id);            
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
             $agent->setProperties($data);
             $agent->createAgents();
             //$this->render('create');
//                $marca->setProperties($data);
//                $marca->createMarca();
            $this->_redirect('/partner/agent/');
            
        }
    }
    public function editAction()
    {
        
    }
    public function previewAction()
    {
        
    }
    public function listingsAction()
    {
        
    }
   
}

