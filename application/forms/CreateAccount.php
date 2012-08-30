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
class Application_Form_CreateAccount extends CST_Form {

    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');

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

        $validatorsEmail = array(
            new Zend_Validate_Db_NoRecordExists(array(
                'table'=>'core_usuarios',
                'field'=>'usu_correo')),
            new Zend_Validate_EmailAddress(),
            new Zend_Validate_Identical()
        );

        $this->addElement(new Zend_Form_Element_Text('mail',
                array(
                    'label' => 'Email * ',
                    'required' => true,
                    'validators' => $validatorsEmail
                    )));

        $this->addElement(new Zend_Form_Element_Text('confirmMail',
                array(
                    'label' => 'Confirm Email * ',
                    'required' => true,
                    'validators' => $validatorsEmail
                    )));

        $this->addElement(new Zend_Form_Element_Password('password',
                array(
                    'required' => true,
                    'label' => 'Password '
                    )));

        $this->addElement(new Zend_Form_Element_Password('confirmPassword',
                array(
                    'required' => true,
                    'label' => 'Confirm Password ',
                    'validators' => array(new Zend_Validate_Identical())
                    )));

        $this->addElement(new Zend_Form_Element_Text('promoCode',
                array(
                    'label' => 'Promo code ',
                    'maxlength' => '200',
                    'size' => '40'
                    )));

        $this->addElement(new Zend_Form_Element_Text('firstNameSalesRepresentative',
                array('label' => 'First Name ',
                    'validators' => array(new Zend_Validate_Alnum(true)),
                    'maxlength' => '200',
                    'size' => '40'
                    )));

        $this->addElement(new Zend_Form_Element_Text('lastNameSalesRepresentative',
                array('label' => 'Last Name ',
                    'validators' => array(new Zend_Validate_Alnum(true)),
                    'maxlength' => '200',
                    'size' => '40'
                    )));

        
        $arrayTypePartner = Application_Entity_Partnert::listingsPartnersAcountType();
        $multioption = new Zend_Form_Element_Radio('accountType',array('required'=>true));
        $multioption->addMultiOptions($arrayTypePartner);
        $multioption->setLabel('Acount type');
        $this->addElement($multioption);
        
        
        $arrayOtherTypePartner = Application_Entity_Partnert::listingsOtherAccountType();
        $multioption = new Zend_Form_Element_Select('otherAccountType',
                array('attribs' => array(
                    'disabled' => 'disabled',
                    'class' => 'displayNone'
                    )));
        $multioption->addMultiOptions($arrayOtherTypePartner);
        $this->addElement($multioption);
        
        $this->addElement(new Zend_Form_Element_Submit('Create Account',
                array('attribs' => array(
                    'class' => 'submit-button'
                    ))));
        
    }

    public function isValid($data) {

        $passwordConfirm = $this->getElement('confirmPassword');

        $validator = $passwordConfirm->getValidator('Identical')
                ->setToken($data['password']);

        $mailConfirm = $this->getElement('confirmMail');

        $validator = $mailConfirm->getValidator('Identical')
                ->setToken($data['mail']);

        return parent::isValid($data);
    }

}

?>
