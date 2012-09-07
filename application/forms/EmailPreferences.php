<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contactenos
 *
 * @author Laptop
 */
class Application_Form_EmailPreferences extends CST_Form {

    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');
        $arrayInfoAbaut = CST_Utils::fetchPairs(Application_Entity_InfoAbaut::listingsInfoAbaut());
        $multioption = new Zend_Form_Element_MultiCheckbox('infoAbaut',array('label'=>'infoAbaut'));
        $multioption->addMultiOptions($arrayInfoAbaut);
        $this->addElement($multioption);
        
        $this->addElement(new Zend_Form_Element_Checkbox('unsubscribe',
                array('option'=>
                    array(
                        '1'=>'Unsubscribe me from all Mexi-Go! emails'
                        ))));
    }
}

?>
