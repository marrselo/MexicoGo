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
class Application_Form_Profiler extends CST_Form {

    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');

        $this->addElement(new Zend_Form_Element_Text('profileCompany',
                array(
                    'required' => true,
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('profileEmail',
                array(
                    'validators' => array(new Zend_Validate_EmailAddress()),
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('profileWebsite',
                array(
                    'validators' => array(new Zend_Validate_Hostname()),
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('profilePhoneDescription1',
                array(
                    'maxlength' => '60',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone11',
                array(
                    'maxlength' => '4',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone12',
                array(
                    'maxlength' => '4',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone13',
                array(
                    'maxlength' => '4',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhoneDescription2',
                array(
                    'maxlength' => '60',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone21',
                array(
                    'maxlength' => '4',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone22',
                array(
                    'maxlength' => '4',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone23',
                array(
                    'maxlength' => '4',
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('profilePhoneDescription3',
                array(
                    'maxlength' => '60',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone31',
                array(
                    'maxlength' => '4',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone32',
                array(
                    'maxlength' => '4',
                    )));
        $this->addElement(new Zend_Form_Element_Text('profilePhone33',
                array(
                    'maxlength' => '4',
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('profileVideo1',
                array(
                    )));
        $this->addElement(new Zend_Form_Element_Text('profileVideo2',
                array(
                    )));
        $this->addElement(new Zend_Form_Element_Text('profileVideo3',
                array(
                    )));
        
        $element = new Zend_Form_Element_File('fileProfiler1');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/profiler/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_File('fileProfiler2');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/profiler/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_File('fileProfiler3');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/profiler/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
    }
    //public function isValid($data) {
     //   parent::isValid($data);
    //}
}
?>
