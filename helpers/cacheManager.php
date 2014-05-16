<?php

/**
 * Acts the same as file_get_contents() but first checks the cache to see
 * if the requested url is one the server has cached
 * 
 * @author  Andrew Burian
 * @param   string  $url    The url data is being requested from
 * @return  string  The data returned from either the cache or the url
 */
function getCachedData($url){
    
    // Get the contents of the cache info file
    $string = file_get_contents('data/cache/cache.json');
    $cacheItems = json_decode($string, true);
    
    // look to see if our file is in cache
    foreach($cacheItems['cache'] as &$item){
        
        if((string)$item['url'] == $url){
        
            // check to see if the data is older than it's refresh rate
            if(time() - $item['updated'] < $item['refresh'] * 24 * 60 * 60){
                
                // data is still fresh, return the data
                return file_get_contents('data/cache/' . $item['file']);
            }
            
            else {
                // data is expired and needs updated
                // get the data from the url
                $newData = file_get_contents($url);
                
                if($newData != false){
                    
                    // data retrieved
                    file_put_contents('data/cache/' . $item['file'], $newData);
                    $item['updated'] = time();
                    file_put_contents('data/cache/cache.json', json_encode($cacheItems));
                }
                
                return file_get_contents('data/cache/' . $item['file']);
                
            }
        }
    }
    
    // file not cached
    return file_get_contents($url);
}