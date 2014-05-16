<?php

require_once 'baseModel.php';

class graphModel extends baseModel {

    function getData() {

        $nlines = 2; // number of lines displayed on the graph
        $datapoints = 10;
        $holiday = array(3, 6, 8);

        //$gdata[] = getSearchesGraphData('vancouver', 'searches', $datapoints + 1);
        $gdata[] = array(236, 336, 259, 235, 139, 119, 225, 467, 392, 299, 261);
        $gdata[] = array(143, 432, 664, 545, 923, 1112, 788, 667, 547, 748, 535);

        $n = 0;
        for($m = 0; $m < count($gdata); ++$m)
            $n = (max($gdata[$m]) > $n) ? max($gdata[$m]) : $n;
        $maxVal = ceil($n/10) * 10;

        /* x values to loop through */
        $xVal = array("sun", "mon", "tue", "wed", "thu", "fri", "sat");

        $colours = array("#000000", "#DF0101", "#0101DF", "#8904B1");

        $params = array();
        $params['title'] = "Tons Collected in 2013";
        $params['moreinfo'] = "today";
        $params['value'] = $gdata[0][0]; // current value displayed

        /* create values and position for the x-axis */
        $params['xAxis'] = "";
        for($a = 0; $a < $datapoints; ++$a){
            $textparams['xP'] = $xVal[($a + date("w") + 4) % 7];
            $textparams['xV'] = (($a * $datapoints)) . "%";
            $params['xAxis'] .= parse($textparams, "graphXAxis.php");
        }

        /* create values and position for the y-axis */
        $params['yAxis'] = "";
        for($a = 0; $a < 8; ++$a){
            $textparams['yP'] = $maxVal - ($a * ($maxVal/8));
            $textparams['yV'] = ($a * 74.258) + 25;
            $params['yAxis'] .= parse($textparams, "graphYAxis.php");
        }

        $params['data'] = "";
        $lineparams = array();
        /* check if there are holidays to mark */
        if(count($holiday) != 0){
            $lineparams['colour'] = "#fff";
            for($c = 0; $c < count($holiday); ++$c){
                $lineparams['Px0'] = (($holiday[$c] * $datapoints) + 2) . "%";
                $lineparams['Py0'] = "0%";
                $lineparams['Px1'] = (($holiday[$c] * $datapoints) + 2) . "%";
                $lineparams['Py1'] = "100%";

                $params['data'] .= parse($lineparams, "graphLine.php");
            }
        }

        for($i = 0; $i < $nlines; ++$i){
            $lineparams['colour'] = $colours[$i]; // set the colour for the line

            $points = array();
            for($j = 0; $j < $datapoints + 1; ++$j){
                $points[] = $j * (100/$datapoints) + 2 . "%"; // x coordinate
                $points[] = 100 - (100 * ($gdata[$i][$datapoints - $j]/$maxVal)) + 3 . "%"; // JSON DATA HERE (y coordinate)
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