<?php

/*
 * Examples:
 * https://recollect.net/api/dashboard/vancouver/services/waste/message
 * https://recollect.net/api/dashboard/olathe/services/waste/message
 */

function getRecollectMessage($location) {
    $contents = file_get_contents("testdata_delete/{$location}_message.json");
    //$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/message");
    $data = json_decode($contents, TRUE);

    return $data['html'];
}

/*
 * Examples:
 * https://recollect.net/api/dashboard/olathe/services/waste/count/supportrequests/1day
 * https://recollect.net/api/dashboard/olathe/services/waste/count/supportrequests/1week
 * https://recollect.net/api/dashboard/olathe/services/waste/count/supportrequests/1month
 * https://recollect.net/api/dashboard/olathe/services/waste/count/supportrequests/3months
 */

function getRecollectSupportRequests($location, $timePeriod) {
    $contents = file_get_contents("testdata_delete/{$location}_supportrequests_{$timePeriod}.json");
    //$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/count/supportrequests/{$timePeriod}");
    $data = json_decode($contents, TRUE);

    return $data;
}

/*
 * Examples:
 * https://recollect.net/api/dashboard/olathe/services/waste/count/searches/1week
 * https://recollect.net/api/dashboard/olathe/services/waste/count/reminders/1week
 * https://recollect.net/api/dashboard/olathe/services/waste/count/notifications/1week
 */

function getRecollectCount($location, $category, $timePeriod = null) {
    if ($timePeriod == null) {
        $contents = file_get_contents("testdata_delete/{$location}_{$category}_{$timePeriod}.json");
        //$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/count/{$category}");
        $data = json_decode($contents, TRUE);
    } else {
        $contents = file_get_contents("testdata_delete/{$location}_{$category}_{$timePeriod}.json");
        //$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/count/{$category}/$timePeriod");
        $data = json_decode($contents, TRUE);
    }

    return $data;
}

/*
 * Examples:
 * Since the start of the month: https://recollect.net/api/dashboard/vancouver/services/waste/activity/reminders?since=2014-05-01  
 * Since 11am PST, today: https://recollect.net/api/dashboard/vancouver/services/waste/activity/reminders?since=2014-05-12+11:00:00+-08
 */

function getRecollectReminders($location, $timePeriod = null) {
    if ($timePeriod == null) {
        $contents = file_get_contents("testdata_delete/{$location}_reminders.json");
        //$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/activity/reminders");
        $data = json_decode($contents, TRUE);
    } else {
        $contents = file_get_contents("testdata_delete/{$location}_reminders_since_2014_05_01.json");
        //$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/activity/reminders?since={$timePeriod}");
        $data = json_decode($contents, TRUE);
    }
    return $data;
}

/*
 * Examples:
 * Since the start of the month: https://recollect.net/api/dashboard/vancouver/services/waste/activity/searches?since=2014-05-01  
 * Since 11am PST, today: https://recollect.net/api/dashboard/vancouver/services/waste/activity/searches?since=2014-05-12+11:00:00+-08
 */

function getRecollectSearches($location, $timePeriod = null) {
    if ($timePeriod == null) {
        $contents = file_get_contents("testdata_delete/{$location}_searches.json");
        //$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/activity/searches");
        $data = json_decode($contents, TRUE);
    } else {
        $contents = file_get_contents("testdata_delete/{$location}_searches.json");
        //$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/activity/searches?since={$timePeriod}");
        $data = json_decode($contents, TRUE);
    }
    return $data;
}

/*
 * Example:
 * getSearchesGraphData("olathe", "searches", "5");
 * will return array(5) { [0]=> int(217) [1]=> int(259) [2]=> int(235) [3]=> int(139) [4]=> int(119) }s
 */

function getSearchesGraphData($location, $category, $numberOfDays) {

    $dayContents = array();
    for ($i = 0; $i < $numberOfDays; $i++) {
        $temp = getRecollectCount($location, $category, ($i + 1) . "day");
        $dayContents[] = $temp['last'];
    }

    $dayData[0] = $dayContents[0];
    for ($i = 0; $i < $numberOfDays - 1; $i++) {
        $dayData[] = $dayContents[$i + 1] - $dayContents[$i];
    }

    return $dayData;
}
