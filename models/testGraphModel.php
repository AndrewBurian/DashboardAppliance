<?php

require_once 'baseModel.php';

class testGraphModel extends baseModel {

    function getData() {

        $curval = rand(0, 360);
        
        $params = array();
        $params['title'] = "Tons Collected in 2013";
        $params['value'] = (int)((($curval/360) * 50) * (-1) + 50);

        $params['x0'] = "jan";
        $params['x1'] = "feb";
        $params['x2'] = "mar";
        $params['x3'] = "apr";
        $params['x4'] = "may";
        $params['x5'] = "jun";
        $params['x6'] = "jul";
        $params['x7'] = "aug";
        $params['x8'] = "sept";

        $params['y0'] = "10";
        $params['y1'] = "20";
        $params['y2'] = "30";
        $params['y3'] = "40";

        $params['data'] = "";

        $points = array(0, rand(0, 360),
                        50, rand(0, 360),
                        100, rand(0, 360),
                        150, rand(0, 360),
                        200, rand(0, 360),
                        250, rand(0, 360),
                        300, rand(0, 360),
                        350, rand(0, 360),
                        400, rand(0, 360),
                        450, rand(0, 360), 
                        500, rand(0, 360),
                        550, rand(0, 360),
                        600, $curval
                        );

        if (count($points) > 4) {
            for ($i = 0; $i < (count($points) - 3); $i += 2) {
                $params['data'] .= "<line x1=\""
                        . $points[$i] . "\" y1=\""
                        . $points[$i + 1] . "\" x2=\""
                        . $points[$i + 2] . "\" y2=\""
                        . $points[$i + 3] . "\" stroke=\"#fff\" stroke-width=\"2\" />";
            }
        }


        return $params;
    }

}
