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
class Application_Form_RealEstateRegisterFeature extends CST_Form {

    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');

        $arrayYesNo = array(
                        ''=>'Any',
                        'Yes'=>'Yes',
                        'Yo'=>'No'
                        );
         $this->addElement(new Zend_Form_Element_Select('available',
                array(
                    'multioptions' => $arrayYesNo
                    )));
         
         $this->addElement(new Zend_Form_Element_Select('listingStatus',
                array(
                    'multioptions' => 
                            (array(''=>'Any')+
                            Application_Entity_PropertyListingStatus::listingStatus())
                            
                    )));
         $this->addElement(new Zend_Form_Element_Select('propertyType',
                array(
                    'multioptions' => (
                            array(''=>'Any')+
                            Application_Entity_PropertyType::listingPropertyType()),
                    
                    )));
         
         
           $this->addElement(new Zend_Form_Element_Text('priceValue',
                array(
                    
                )));
           $this->addElement(new Zend_Form_Element_Text('houseValue',
                array(
                    
                )));
           $this->addElement(new Zend_Form_Element_Text('landValue',
                array(
                    
                )));
           $arrayCantBedroom = range(0,8);
           unset($arrayCantBedroom[0]);
           $arrayCantBedroom = (array(''=>'Any')+$arrayCantBedroom);
           
           $this->addElement(new Zend_Form_Element_Select('bedroom',
                array(
                    'multioptions' => $arrayCantBedroom
                    )));
           $this->addElement(new Zend_Form_Element_Select('bathrooms',
                array(
                    'multioptions' => $arrayCantBedroom
                    )));
         
           
           $this->addElement(new Zend_Form_Element_Select('style',
                array(
                    'multioptions' => (
                                array(''=>'Any')+
                                Application_Entity_PropertyStyle::listingPropertyStyle()
                                )
                        
                    )));
         
         $this->addElement(new Zend_Form_Element_Text('keyword',
                array(
                    
                )));
         $this->addElement(new Zend_Form_Element_Text('address',
                array(
                    
                )));
         $this->addElement(new Zend_Form_Element_Select('garage',
                array(
                    'multioptions' => $arrayCantBedroom
                    )));
         $this->addElement(new Zend_Form_Element_Select('view',
                array(
                    'multioptions' => 
                        (array(''=>'Any')+
                                Application_Entity_PropertyView::listingPropertyView()
                                )
                        
                        
                    )));
         $this->addElement(new Zend_Form_Element_Text('size',
                array(
                    
                )));
         $this->addElement(new Zend_Form_Element_Select('recreation',
                array(
                    'multioptions' => $arrayCantBedroom
                    )));

        $this->addElement(new Zend_Form_Element_MultiCheckbox('featureFeature',
                array(
                    'multioptions' => 
                        Application_Entity_Feature::listFeatures()
                        
                    )));
        $this->addElement(new Zend_Form_Element_MultiCheckbox('featureBulinding',
                array(
                    'multioptions' => 
                        Application_Entity_Building::listBuildings()
                        
                    )));
        $this->addElement(new Zend_Form_Element_MultiCheckbox('featureAppliances',
                array(
                    'multioptions' => 
                        Application_Entity_Appliance::listAppliances()
                        
                    )));
    }

}
?>
