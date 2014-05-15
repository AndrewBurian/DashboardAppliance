<?php

require_once 'baseModel.php';

class testGraphModel extends baseModel {

    function getData() {

        $nlines = 1; // number of lines displayed on the graph
        $datapoints = 11;

        $gdata = getSearchesGraphData('olathe', 'searches', $datapoints + 1);
        $maxVal = ceil(max($gdata)/10) * 10;

        /* x values to loop through */
        $xVal = array("mon", "tue", "wed", "thu", "fri", "sat", "sun");

        $params = array();
        $params['title'] = "Tons Collected in 2013";
        $params['moreinfo'] = "";
        $params['value'] = end($gdata); // current value displayed

        /* create values and position for the x-axis */
        $params['xAxis'] = "";
        for($a = 0; $a < $datapoints; ++$a){
            $textparams['xP'] = $xVal[$a % 7];
            $textparams['xV'] = ($a * 87.142) + 5;
            $params['xAxis'] .= parse($textparams, "graphXAxis.php");
        }

        /* create values and position for the y-axis */
        $params['yAxis'] = "";
        for($a = 0; $a < 8; ++$a){
            $textparams['yP'] = $maxVal - ($a * ($maxVal/10));
            $textparams['yV'] = ($a * 74.258) + 25;
            $params['yAxis'] .= parse($textparams, "graphYAxis.php");
        }

        $params['data'] = "";
        for($i = 0; $i < $nlines; ++$i){
            $lineparams = array();
            $lineparams['colour'] = '#' . dechex(rand(0,1000)); // set the colour for the line

            $points = array();
            for($j = 0; $j < $datapoints + 1; ++$j){
                $points[] = $j * (100/$datapoints) . "%"; // x coordinate
                $points[] = 100 - (100 * ($gdata[$j]/$maxVal)) . "%"; // JSON DATA HERE (y coordinate)
            }

            if (count($points) > 4) { // make sure there are x and y coordinates of at least two points
                for ($k = 0; $k < (count($points) - 3); $k += 2) {
                    $lineparams['Px0'] = $points[$k];
                    $lineparams['Py0'] = $points[$k + 1];
                    $lineparams['Px1'] = $points[$k + 2];
                    $lineparams['Py1'] = $points[$k + 3];
                    /* create a html line with the coordinates */
                    $params['data'] .= parse($lineparams, "graphLine.php");
                }
            }
        }

        return $params;
    }
}
