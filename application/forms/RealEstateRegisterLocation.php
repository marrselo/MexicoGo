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
         $this->addElement(new Zend_Form_Element_Text('video1',
                array(
                    )));
        $this->addElement(new Zend_Form_Element_Text('video2',
                array(
                    )));
        $this->addElement(new Zend_Form_Element_Text('video3',
                array(
                    )));
        $element = new Zend_Form_Element_File('fileLocation1');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/real-estate/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_File('fileLocation2');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/real-estate/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_File('fileLocation3');
        $element->setLabel('Upload an image:')
                ->setDestination(APPLICATION_PATH.
                        '/../public/dinamic/partner/real-estate/file/');
        $element->addValidator('Count', false, 1);
        $element->addValidator('Size', false, 102400);
        $element->addValidator('Extension', false, 'pdf');
        $this->addElement($element);
        
        
        $this->addElement(new Zend_Form_Element_Text('locationAddress',
                array(
                    'maxlength' => '4',
                    )));
        
        $estados = array(''=>'-----');
        $estados = (Application_Entity_Ubigeo::getEstados()+$estados) ;
        if(empty($estados)){
            $estados = array();
        }
        $this->addElement(new Zend_Form_Element_Select('locationCity',
                array(
                    'multioptions' => $estados
                    )));
        $ciudades = array(''=>'-----');
        $ciudades = (Application_Entity_Ubigeo::getAllCiudades()+$ciudades) ;
        $this->addElement(new Zend_Form_Element_Select('locationState',
                array(
                    'multiOptions' => $ciudades
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('locationSuite'));
        $this->addElement(new Zend_Form_Element_Text('locationZip'));
        $this->addElement(new Zend_Form_Element_Text('locationLatitud'));
        $this->addElement(new Zend_Form_Element_Text('locationLongitud'));
        
        
    }
    //public function isValid($data) {
     //   parent::isValid($data);
    //}
}
?>
