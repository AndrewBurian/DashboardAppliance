<?php

require_once 'baseModel.php';

class testGraphModel extends baseModel {

    function getData() {

        $curval = rand(0, 360);
        
        $params = array();
        $params['title'] = "Tons Collected in 2013";
        $params['value'] = (int)((($curval/360) * 50) * (-1) + 50);

        $params['x0'] = "mon";
        $params['x1'] = "tue";
        $params['x2'] = "wed";
        $params['x3'] = "thu";
        $params['x4'] = "fri";
        $params['x5'] = "sat";
        $params['x6'] = "sun";

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
                $lineparams = array();
                
                $lineparams['Px0'] = $points[$i];
                $lineparams['Py0'] = $points[$i + 1];
                $lineparams['Px1'] = $points[$i + 2];
                $lineparams['Py1'] = $points[$i + 3];
                
                $params['data'] .= parse($lineparams, "graphLine.php");
            }
        }


        return $params;
    }

}
