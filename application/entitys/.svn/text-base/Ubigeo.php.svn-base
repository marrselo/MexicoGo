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
class Application_Entity_Ubigeo extends CST_Entity {
    /* entidades publicas */

    
    /* entidades privadas */
    
    static function getEstados(){
        $ubigeo = new Application_Model_Ubigeo();
        return $ubigeo->fetchPairs($ubigeo->listingEstados());
    }
    static function getCiudades($idEstado){
        $ubigeo = new Application_Model_Ubigeo();
        return $ubigeo->fetchPairs($ubigeo->listingCiudades($idEstado));
    }
    static function getAllCiudades(){
        $ubigeo = new Application_Model_Ubigeo();
        return $ubigeo->fetchPairs($ubigeo->listingAllCiudades());
    }
    static function getEstadoDeUnaCiudad($idCiudad){
        $ubigeo = new Application_Model_Ubigeo();
        return $ubigeo->fetchPairs($ubigeo->getEstadoForCiudad($idCiudad));
    }



}
