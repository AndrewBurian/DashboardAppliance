<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class mapModel extends baseModel {

    function getData() {

        $mdata = getRecollectSearches('vancouver');

        for ($i = 0; $i < count($mdata); ++$i){
           $location = $mdata[$i]['location'];
           
        }   
        $params = array();

        return $params;
    }

}
