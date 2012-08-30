<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Laptop
 */
class CST_Model {

    //put your code here
    function arrayAsoccForFirstItem($array, $key='') {
        $arrayResponse = array();
        if ($key == '') {
            foreach ($array as $index => $data) {
                $arrayResponse[$data[key($data)]][] = $data;
            }
        } else {
            foreach ($array as $index => $data) {
                $arrayResponse[$data[$key]][] = $data;
            }
        }
        return $arrayResponse;
    }

    function fetchPairs($array) {
        $arrayResponse = array();
        foreach ($array as $index => $datos) {
            $keys = array_keys($datos);
            $arrayResponse[$datos[$keys[0]]] = $datos[$keys[1]];
        }
        return $arrayResponse;
    }

}

?>
