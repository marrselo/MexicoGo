<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author Laptop
 */
class Application_Model_Ubigeo extends CST_Model {

    //put your code here
    private $_modelCoreCiudad;
    private $_modelCoreEstado;

    function __construct() {
        $this->_modelCoreCiudad = new Application_Model_TableBase_CoreCiudades();
        $this->_modelCoreEstado = new Application_Model_TableBase_CoreEstados();
    }
    
    function listingEstados(){
        return $this->_modelCoreEstado
                ->select()
                ->query()
                ->fetchAll();
    }
    
    function listingCiudades($id){
        return $this->_modelCoreCiudad
                ->select()
                ->where('est_id = ?',$id)
                ->query()
                ->fetchAll();
    }
    function listingAllCiudades(){
        return $this->_modelCoreCiudad
                ->select()
                ->query()
                ->fetchAll();
    }
    
    function getEstadoForCiudad($idCiudad){
        return $this->_modelCoreEstado
                ->getAdapter()
                ->select()
                ->from(array('est'=>$this->_modelCoreEstado->getName()), 
                        array('est.est_id',
                            'est.est_nombre',
                            'est.est_codigo'
                            )
                        )
                ->join(array('ciu'=>$this->_modelCoreCiudad->getName()),
                        'ciu.est_id=est.est_id')
                ->where('ciu.cd_id = ?',$idCiudad)
                ->query()
                ->fetchAll();
    }
    
}

?>
