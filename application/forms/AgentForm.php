<?php
class Application_Form_AgentForm extends CST_Form {
    
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

        $this->addElement(new Zend_Form_Element_Text('nameEmail',
                array(
                    'label' => 'Email * ',
                    'required' => true,
                    'validators'=>array(new Zend_Validate_EmailAddress())
                    )));  
        
        $this->addElement(new Zend_Form_Element_Text('profileWebsite2',array('label'=>'Web Site'))
            );
        $this->addElement(new Zend_Form_Element_Text('profileBrokerage',
                array(
                    'label' => 'Profile Brokerage ',
                    'maxlength' => '150'                    
                    )));
        
        $this->addElement(new Zend_Form_Element_Textarea('agentDsc',array('maxlength'=>300,
            'label'=>'Description Agent'))
            );
        
        $this->addElement(new Zend_Form_Element_Text('prePhone',
            array(
                'label'=>'Phone-1',
                'required' => true,
                'validators'=>array(new Zend_Validate_Int()),
                'maxlength'=>'5')
                ));
        
        $this->addElement(new Zend_Form_Element_Text('phone',
            array(
                'label'=>'Phone',
                'required' => true,
                'validators'=>array(new Zend_Validate_Int()),
                'maxlength'=>'15')
            ));
        
        $this->addElement(new Zend_Form_Element_Text('postPhone',
            array(
                'label'=>'postPhone',
                'required' => true,
                'validators'=>array(new Zend_Validate_Int()),
                'maxlength'=>'5')));
        
        $this->addElement(new Zend_Form_Element_Text('prePhone2',
            array(
                'label'=>'Phone-2',
                'maxlength'=>'5')));
        $this->addElement(new Zend_Form_Element_Text('phone',
            array(
                'label'=>'Phone',
                'maxlength'=>'15')));
        
        $this->addElement(new Zend_Form_Element_Text('postPhone',
            array(
                'label'=>'postPhone',
                'maxlength'=>'5')));
    }

}

