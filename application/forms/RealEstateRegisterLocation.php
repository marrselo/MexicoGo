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
class Application_Form_RealEstateRegisterLocation extends CST_Form {

    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');

        $this->addElement(new Zend_Form_Element_Text('locationTitle',
                array(
                    'required' => true,
                    )));
        
        $this->addElement(new Zend_Form_Element_TextArea('locationDescription',
                array(
                    'required' => true,
                    )));
        $element = new Zend_Form_Element_File('fileLocation1');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/rela-estate/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_File('fileLocation2');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/rela-estate/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_File('fileLocation3');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/rela-estate/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
        
        
        $this->addElement(new Zend_Form_Element_Text('locationAddress',
                array(
                    'maxlength' => '4',
                    )));
        
        $estados = array(''=>'-----');
        $estados = array_merge(Application_Entity_Ubigeo::getEstados(),$estados) ;
        if(empty($estados)){
            $estados = array();
        }
        $this->addElement(new Zend_Form_Element_Select('locationCity',
                array(
                    'multioptions' => $estados
                    )));
        $ciudades = array(''=>'-----');
        $ciudades = array_merge(Application_Entity_Ubigeo::getAllCiudades(),$ciudades) ;
        $this->addElement(new Zend_Form_Element_Select('locationState',
                array(
                    'multiOptions' => $ciudades
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('profileLocationSuite'));
        $this->addElement(new Zend_Form_Element_Text('profilerLocationZip'));
        $this->addElement(new Zend_Form_Element_Text('profileLocationLatitud'));
        $this->addElement(new Zend_Form_Element_Text('profileLocationLongitud'));
        
        
    }
    //public function isValid($data) {
     //   parent::isValid($data);
    //}
}
?>
