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
class Application_Form_ContactPartnerInscription extends CST_Form {

    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');

        $this->addElement(new Zend_Form_Element_Text('email',
                array(
                    'validators' => array(new Zend_Validate_EmailAddress()),
                    'label'=>'email'
                    )));
        $this->addElement(new Zend_Form_Element_Text('phone',array('label'=>'phone')));
        
        $arrayInfoAbaut = CST_Utils::fetchPairs(Application_Entity_InfoAbaut::listingsInfoAbaut());
        $multioption = new Zend_Form_Element_MultiCheckbox('infoabaut',array('label'=>'infoAbaut'));
        $multioption->addMultiOptions($arrayInfoAbaut);
        $this->addElement($multioption);
        
        $this->addElement(new Zend_Form_Element_TextArea('message',array('label'=>'mensaje')));
        
        $this->addElement(new Zend_Form_Element_Submit('send',
                array('attribs' => array(
                    'class' => 'submit-button'
                    ))));
        
    }
}

?>
