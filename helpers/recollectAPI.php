<?php

/*
 * Examples:
 * https://recollect.net/api/dashboard/vancouver/services/waste/message
 * https://recollect.net/api/dashboard/olathe/services/waste/message
 */

function getRecollectMessage($location) {

    $contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/message");
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
    $contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/count/supportrequests/{$timePeriod}");
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
        $contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/count/{$category}");
        $data = json_decode($contents, TRUE);
    } else {
        $contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/count/{$category}/$timePeriod");
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
        $contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/activity/reminders");
        $data = json_decode($contents, TRUE);
    } else {
        $contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/activity/reminders?since={$timePeriod}");
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
        $contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/activity/searches");
        $data = json_decode($contents, TRUE);
    } else {
        $contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/activity/searches?since={$timePeriod}");
        $data = json_decode($contents, TRUE);
    }
    return $data;
}