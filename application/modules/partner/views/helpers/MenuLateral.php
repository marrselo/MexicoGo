<?php

class Zend_View_Helper_MenuLateral extends Zend_View_Helper_Abstract{
    
       
    public function MenuLateral($vista){
        $view = new Zend_View();
        $view->setScriptPath(APPLICATION_PATH.'/modules/default/views/helpers/views_helpers/');//url de la vista dentro del modulo        
        return $view->render($vista.'.phtml');
    }
} 
