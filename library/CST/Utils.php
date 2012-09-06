<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author Laptop
 */
class CST_Utils {

    static function arrayAsoccForFirstItem($array, $key='') {
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

    static function fetchPairs($array = array()) {
        if(!is_array($array))
            return array();
        $arrayResponse = array();
        foreach ($array as $index => $datos) {
            $keys = array_keys($datos);
            $arrayResponse[$datos[$keys[0]]] = $datos[$keys[1]];
        }
        return $arrayResponse;
    }

    static function parseUrlVimeo($uri){
        $curl = curl_init('http://vimeo.com/api/oembed.json?url=' . $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($curl);
        if($result=='404 Not Found'){
            return FALSE;
        }else{
            return $result;
        }
    }
    static function validateUrlVimeo($uri) {
        $result = array();
        $response = self::parseUrlVimeo($uri);
        if ($response != FALSE) {
            $result = Zend_Json::decode($response);
            $result['message'] = '';
            $result['validate'] = TRUE;
            $arrayReturn['type'] = 'vimeo';
        } else {
            $result['message'] = 'no se encontro la ruta';
            $result['validate'] = FALSE;
        }
        return $result;
    }

    static function convertUrlQuery($query) {
        if ($query != '') {
            $queryParts = explode('&', $query);
            $params = array();
            foreach ($queryParts as $param) {
                $item = explode('=', $param);
                $params[$item[0]] = $item[1];
            }
            return $params;
        }
    }

    static function validateUrlYoutube($uri='') {
        $arrayReturn = array();
        if ($uri == '') {
            $arrayReturn['validate'] = false;
            return $arrayReturn;
        }
        $array = parse_url($uri);
        
        $validate = new Zend_Validate_Hostname();
        if($validate->isValid($uri)){
            echo 'validado';
        }else{
            echo 'no validado';
        }
        
        if (isset($array['query']))
            $array = self::convertUrlQuery($array['query']);

        $yt = new Zend_Gdata_YouTube();
        //$objUri = Zend_Uri::check($uri);
        //exit;
        $arrayReturn['validate'] = TRUE;
        if (Zend_Uri::check($uri) && strpos($uri, "http://www.youtube.com/watch?v=") === 0) {
            try {
                $videoEntry = $yt->getVideoEntry($array['v']);
                $arrayReturn['video'] = $videoEntry->getVideoTitle();
                $arrayReturn['videoID'] = $videoEntry->getVideoId();
                $arrayReturn['updated'] = $videoEntry->getUpdated();
                $arrayReturn['description'] = $videoEntry->getVideoDescription();
                $arrayReturn['category'] = $videoEntry->getVideoCategory();
                $arrayReturn['tags'] = implode(", ", $videoEntry->getVideoTags());
                $arrayReturn['watchPage'] = $videoEntry->getVideoWatchPageUrl();
                $arrayReturn['flashPlayerUrl'] = $videoEntry->getFlashPlayerUrl();
                $arrayReturn['duration'] = $videoEntry->getVideoDuration();
                $arrayReturn['viewCount'] = $videoEntry->getVideoViewCount();
                $arrayReturn['message'] = $videoEntry->getVideoViewCount();
                $arrayReturn['type'] = 'Youtube';
            } catch (Exception $e) {
                $arrayReturn['validate'] = FALSE;
                $arrayReturn['message'] = $e->getMessage();
            }
        } else {
            $arrayReturn['validate'] = FALSE;
            $arrayReturn['message'] = 'La ruta no es valida';
        }

        return $arrayReturn;
    }

}

?>
