<?php

class Partner_FrontController extends CST_Controller_ActionPartner {

    public function init() {
        parent::init();
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
//        $mail = new CST_Mail();
//        $mail->setMensaje('hola como estas');
//        $mail->setAsunto('saludo');
//        $mail->addDestinatario(array('mail'=>'nazartj@gmail.com','name'=>'nazart jara'));
//        //$mail->addDestinatario(array('mail'=>'nazartj@gmail.com','name'=>'nazart jara'));
//        $mail->send();
//        print_r($mail->getError());
        
    }
    
    public function newsAction(){
        $this->view->headTitle('News');
    }
    
    public function mservicesAction(){
        $this->view->headTitle('Marketing Services');
    }
    
    public function magazineAction(){
        $this->view->headTitle('The Magazine');
    }
    
}

