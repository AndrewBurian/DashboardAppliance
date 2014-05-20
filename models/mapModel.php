<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

/**
 * Map Model allowing information to be displayed to the user
 * as a on the Google Map API.
 * 
 * @author  Damien Sathanielle/Mat Siwoski
 */
class mapModel extends baseModel {

    /**
     * Set the correct parameter information.
     * 
     * @author  Damien Sathanielle/Mat Siwoski 
     */
    function getData() {
        $params = array();
        $mdata = getRecollectSearches('vancouver');
        
        for ($i = 0; $i < count($mdata); ++$i){
           $location = $mdata[$i]['location'];
           
        }   
        $params['zoom'] = 10;
        $params['Lat']= 51.508742;
        $params['Long'] = -0.120850;

        return $params;
    }

}
