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
            $params = $this->_request->getParams();
            $agent = new Application_Entity_Agent($this->_identityPartner->par_id);
            $data['par_id'] = $this->_identityPartner->par_id;
            
//            $marca = new Application_Entity_Marca();
//                $values = $form->getValues();
//                $data['_nombreMarca'] = $values['nombreMarca'];                
//                $marca->setProperties($data);
//                $marca->createMarca();
//                $this->_redirect('/admin/marca/');
            
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

