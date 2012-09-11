<?php
/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_PropertyStyle extends CST_Entity 
{
    
   static function listingPropertyStyle(){
       $model = new Application_Model_PropertyStyle();
       return CST_Utils::fetchPairs($model->listingPropertyStyle());
   }
            }
