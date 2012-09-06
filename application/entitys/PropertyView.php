<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_PropertyView extends CST_Entity 
{
    
   static function listingPropertyView(){
       $model = new Application_Model_PropertyView();
       return CST_Utils::fetchPairs($model->listingPropertyView());
   }
}
