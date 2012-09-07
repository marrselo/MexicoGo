<?php
class Application_Form_ResetPassword extends CST_Form {

    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');

        $this->addElement(new Zend_Form_Element_Text('accountCurrentPass',
                array(
                    'required' => true,
                    )));
        $this->addElement(new Zend_Form_Element_Text('accountNewPass',
                array(
                    'required' => true,
                    )));
        $this->addElement(new Zend_Form_Element_Text('accountVerifyPass',
                array(
                    'required' => true,
                    'validators' => array(new Zend_Validate_Identical()),
                    )));
    }

    public function isValid($data) {
        $passwordConfirm = $this->getElement('accountVerifyPass');
        $validator = $passwordConfirm->getValidator('Identical')
                ->setToken($data['accountNewPass']);
        return parent::isValid($data);
    }

}
