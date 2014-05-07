<?php

/**
 * Twitter Account Info
 */
//Twitter oauth_access_token
define("oauthToken","106260297-IDffszTR7F4HUipEAANkRIoYKnJD4LI0bTi9BLUZ");
//Twitter oauth_access_token_secret
define("oauthSecret","A0Nd8DMxiOxFbaKssKD2Q0gboptbor5VjaXZHRZt1Bah4");
//Twitter consumer_key
define("consumerKey","ArsfdwnQTngsNnxHskdwS5xAr");
//Twitter consumer_secret
define("consumerSecret","LQBMb6gDb5dtxpjOyaPsfrPnC8HaVDghcPwu7ZmNVpesMUJojT");

/* 
 * Test twitter model to display twitter feed
 */
require_once 'baseModel.php';
require_once 'helpers/twitterAPIExchange.php';



class testTwitterModel extends baseModel {
    
    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
    var $settings = array();
    
    function __construct(){
        $this->settings = array(
            'oauth_access_token' => oauthToken,
            'oauth_access_token_secret' => oauthSecret,
            'consumer_key' => consumerKey,
            'consumer_secret' => consumerSecret
        );
    }
    
    function getData() {
        $params = array();
        $params['title'] = "testTwitterModel Title";
        //$params['text'] = "testTwitterModel Text";
        $params['footer'] = "testTwitterModel Footer";
           
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=CityofVancouver';
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($this->settings);
        
        $response = $twitter->setGetfield($getfield)
                            ->buildOauth($url, $requestMethod)
                            ->performRequest();
        
        $data = json_decode($response);
        $params['text'] = $data[0]->text;
        $params['time'] = date("H:i:s", strtotime($data[0]->created_at));
            
        //$params['text'] = json_decode($response);
        
        return $params;
    }
	
}
