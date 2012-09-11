<?php

/**
 * Description of Agent
 *
 * @author marrselo
 */
class Application_Entity_PropertyListingStatus extends CST_Entity {

    static function listingStatus() {
        $model = new Application_Model_PropertyListingStatus();
        return CST_Utils::fetchPairs($model->listingStatus());
    }

            }
