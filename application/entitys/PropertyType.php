<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_PropertyType extends CST_Entity 
{
    
   static function listingPropertyType(){
       $model = new Application_Model_PropertyType();
       return CST_Utils::fetchPairs($model->listingPropertyType());
   }
}
