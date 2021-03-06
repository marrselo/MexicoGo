<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entitys
 *
 * @author Laptop
 */
abstract class CST_Entity {

    //put your code here
    protected function init($data = null) {
        if ($data != NULL && is_array($data)) {
            $propsFormat = $this->setFormatProperti();
            foreach ($data as $index => $value) {
                if (in_array($index, $propsFormat)) {
                    $this->$index = $value;
                } else {
                    trigger_error('El Key <b>"' . $index . '"</b> no coinciden con las propiedades de la clase ', E_USER_ERROR);
                    exit;
                }
            }
        }
    }
    function setFormatProperti(){
        $cl = new ReflectionClass($this);
        $props = $cl->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
                $propsFormat[] = $prop->getName();
        }
        return $propsFormat;
    }
    function setPropertie($properti,$value){
        $propsFormat = $this->setFormatProperti();
        if (in_array($properti, $propsFormat)) {
                    $this->$properti = $value;
                } else {
                    trigger_error('El Key <b>"' . $index . '"</b> no coinciden con las propiedades de la clase ', E_USER_ERROR);
                    exit;
                }
    }
    function setProperties($dataUsuario){
        $this->init($dataUsuario);
    }
    
    function getProperties(){
     $cl = new ReflectionClass($this);
            $props = $cl->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach ($props as $prop) {
                $propsFormat[$prop->getName()] = $this->{$prop->getName()};
            }    
     return $propsFormat;
    }
    function getPropertie($propertie){
        if(property_exists($this, $propertie)){
            return $this->{$propertie};
        }else{
            return false;
        }
    }
  
  

}

?>
