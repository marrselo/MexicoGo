<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Laptop
 */
class Application_Entity_Banner extends CST_Entity {
    /* entidades publicas */

    
    /* entidades privadas */
    
    static function listingsBanners(){
        $modelBanner = new Application_Model_Banner();
        return $modelBanner->getBanners();
    }


}
