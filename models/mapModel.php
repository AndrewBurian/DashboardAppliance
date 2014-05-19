<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class mapModel extends baseModel {

    function getData() {
        $params = array();
//        $mdata = getRecollectSearches('vancouver');
//        
//        for ($i = 0; $i < count($mdata); ++$i){
//           $location = $mdata[$i]['location'];
//           
//        }   
        $params['zoom'] = 10;
        $params['Lat']= 51.508742;
        $params['Long'] = -0.120850;

        return $params;
    }

}
