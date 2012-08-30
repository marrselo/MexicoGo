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
class Application_Form_PaymentDetailsSingleAgent extends CST_Form {

    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');

        /*profiler*/
        $this->addElement(new Zend_Form_Element_Text('firstName',
                array(
                    'label' => 'First Name * ',
                    'required' => true,
                    'validators' => array(new Zend_Validate_Alnum(true)),
                    'maxlength' => '200',
                    'size' => '40'
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('lastName',
                array(
                    'label' => 'Last Name * ',
                    'required' => true,
                    'validators' => array(new Zend_Validate_Alnum(true)),
                    'maxlength' => '200',
                    'size' => '40'
                    )));

        $this->addElement(new Zend_Form_Element_Text('phone1',
                array(
                    'required' => true,
                    'validators' => array(new Zend_Validate_Alnum(true)),
                    'maxlength' => '4'
                    )));
        $this->addElement(new Zend_Form_Element_Text('phone2',
                array(
                    'required' => true,
                    'validators' => array(new Zend_Validate_Alnum(true)),
                    'maxlength' => '4'
                    )));
        $this->addElement(new Zend_Form_Element_Text('phone3',
                array(
                    'required' => true,
                    'validators' => array(new Zend_Validate_Alnum(true)),
                    'maxlength' => '4'
                    )));
        /*profiler*/
        
        /*billing information*/
        $this->addElement(new Zend_Form_Element_Text('companyName',
                array(
                    'label' => 'Company Name: ',
                    )));

        
        $this->addElement(new Zend_Form_Element_Text('rfc',
                array(
                    'label' => 'RFC: ',
                    )));
        
        $this->addElement(new Zend_Form_Element_Text('mail',
                array(
                    'label' => 'Mailing Address: ',
                    'validators' => array(new Zend_Validate_EmailAddress())
                    )));

        $this->addElement(new Zend_Form_Element_Text('siteUpUnit',
                array(
                    'label' => 'Suite/Apt./Unit: '
                    )));
        
        $estados = array(''=>'-----');
        $estados = array_merge(Application_Entity_Ubigeo::getEstados(),$estados) ;

        if(empty($estados)){
            $estados = array();
        }
        
        $this->addElement(new Zend_Form_Element_Select('city',
                array(
                    'label' => 'City: ',
                    'multioptions' => $estados
                    )));
        
        $ciudades = array(''=>'-----');
        $ciudades = array_merge(Application_Entity_Ubigeo::getAllCiudades(),$ciudades) ;
        $this->addElement(new Zend_Form_Element_Select('state',
                array(
                    'label' => 'State/Province: ',
                    'multiOptions' => $ciudades
                    )));

        $this->addElement(new Zend_Form_Element_Text('zip',
                array(
                    'label' => 'Zip/Postal Code: ',
                    
                    )));
        
        $this->addElement(new Zend_Form_Element_Radio('addressProfilePage',
                array(
                    
                    'multioptions' => array('1'=>'Use billing address for my Profile Page')
                    )
                ));

        $this->addElement(new Zend_Form_Element_Submit('Create Account',
                array('attribs' => array(
                    'class' => 'submit-button'
                    ))));
             $this->addElement(new Zend_Form_Element_Radio('paymentOptions',
                array(
                    
                    'multioptions' => array(
                        '1'=>'PAY ONLINE',
                        '2'=>'Bank transfer',
                        '3'=>'Check'
                        )
                    )
                ));
    }
    public function isValid($data) {
        return parent::isValid($data);
    }

}

?>
