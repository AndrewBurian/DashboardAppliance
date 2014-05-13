<?php

require_once 'baseModel.php';

class testGraphModel extends baseModel {

    function getData() {

        $curval = rand(0, 620);
        $nlines = 4;
        $datapoints = 16;
        
        $params = array();
        $params['title'] = "Tons Collected in 2013";
        $params['value'] = (int)((($curval/620) * 50) * (-1) + 50);

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

        for($i = 0; $i < $nlines; ++$i){
            $lineparams = array();
            $lineparams['colour'] = '#' . strtoupper(dechex(rand(0,10000000)));;

            $points = array();
            for($j = 0; $j < $datapoints + 1; ++$j){
                $points[] = $j * (100/$datapoints) . "%";
                $points[] = rand(0, 620);
            }

            if (count($points) > 4) {
                for ($k = 0; $k < (count($points) - 3); $k += 2) {
                    $lineparams['Px0'] = $points[$k];
                    $lineparams['Py0'] = $points[$k + 1];
                    $lineparams['Px1'] = $points[$k + 2];
                    $lineparams['Py1'] = $points[$k + 3];

                    $params['data'] .= parse($lineparams, "graphLine.php");
                }
            }
        }

        return $params;
    }
}
