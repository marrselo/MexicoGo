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
class Application_Form_SingleAgentSelectPlans extends CST_Form {
    //put your code here
    function init() {
        parent::init();
        $this->setMethod('Post');
        $model = new CST_Model();
        $package = $model->fetchPairs(Application_Entity_Partnert::listingsSingleAgentPackages());
        
        if(empty($package)){
            $package = array();
        }
        $this->addElement(new Zend_Form_Element_Radio('checkSingleAgentPlans',
                array(
                    'required' => true,
                    'multioptions' => $package,
                    )));
        $arraySingleAgentMonths = array(6=>6,12=>12,18=>18,24=>24);
        $this->addElement(new Zend_Form_Element_Select('selectSingleAgentMonths',
                array(
                    'multiOptions' => $arraySingleAgentMonths,
                    )));
//        $arraySingleAgentFeature = array(1=>1,2=>2,3=>3,4=>4);
//        $this->addElement(new Zend_Form_Element_Select('selectSingleAgentFeature',
//                array(
//                    'multiOptions' => $arraySingleAgentFeature,
//                    )));
        
        $this->addElement(new Zend_Form_Element_Radio('checkSingleAgentFeature',
                array(
                    'multioptions' => array(1=>1,2=>2),
                    )));
        
        
    }
    public function isValid($data) {
        return parent::isValid($data);
    }

}

?>
