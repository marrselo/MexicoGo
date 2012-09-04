<?php
class Default_IndexController extends Zend_Controller_Action{
    
    public function init(){
        $this->_helper->layout()->setLayout('layout-front');
        $this->view->headTitle()->setSeparator(' - ');
        $this->view->headTitle('Mexi-Go!');
         
    }

    public function indexAction(){
        
    }
    
    public function contactAction(){
        $this->view->headTitle('Contact');
    }
    
    public function magazineAction(){
        $this->view->headTitle('The Magazine');
    }
    
    public function magazinesubscribeAction(){
        $this->view->headTitle('The Magazine Subscribe');
    }
    
    public function partnersAction(){
        $this->view->headTitle('Partners');
    }
    
    public function searchmapAction(){
        $this->view->headTitle('Search Map');
    }
    
    public function advancesearchAction(){
        $this->view->headTitle('Advance Search');
    }
    
    public function agentdetailAction(){
        $this->view->headTitle('Agent Detail');
    }
    
    public function agentsearchAction(){
        $this->view->headTitle('Agent Search');
    }
    
    public function agentsearch2Action(){
        $this->view->headTitle('Agent Search');
    }
    
    public function propertydetailAction(){
        $this->view->headTitle('Property Detail');
    }
    
    public function errorAction(){
        $this->view->headTitle('Page No Found');
    }
}

