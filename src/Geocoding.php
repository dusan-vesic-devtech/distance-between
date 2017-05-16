<?php

namespace Vesic\DistanceBetween;

use Vesic\DistanceBetween\Location;

class Geocoding {
    public static $url = 'https://maps.googleapis.com/maps/api/geocode/json?';
    
    public static function lookup($location = null) {
        if ($location == null) {
            die('Location must be provided.');
        }
        $response = file_get_contents(self::$url . http_build_query(['address' => urlencode($location)]));
        return new Location(json_decode($response, true));
    }
    
    public static function sphereDistance($lat1, $lon1, $lat2, $lon2, $radius = 6378.135) {
        $rad = doubleval(M_PI / 180.0);
        $lat1 = doubleval($lat1) * $rad;
        $lon1 = doubleval($lon1) * $rad;
        $lat2 = doubleval($lat2) * $rad;
        $lon2 = doubleval($lon2) * $rad;
        $theta = $lon2 - $lon1;
        $dist = acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($theta));
    	
    	if ($dist < 0) {
    		$dist+= M_PI;
    	}
    
    	// Default is Earth equatorial radius in kilometers
    	return $dist = $dist * $radius;
    }
    
    public static function getDifference($locations = []) {
        $count = count($locations);
        // if ($count == 0 || $count == 1) throw new Error('Not enough data');
        if ($count == 2) {
            $from = $locations[0];
            $to = $locations[1];
            $distance = self::sphereDistance
                ($from->getLatitude(), $from->getLongitude()
                , $to->getLatitude(), $to->getLongitude());
            return $distance;
        }
        // if (count($locations) == 0) throw new Exception('No data provided');
        // if (count($locations) == 1) throw new Exception('At least the values required.')
        
    }
    
}