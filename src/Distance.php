<?php

namespace Vesic\DistanceBetween;

use Vesic\DistanceBetween\Geocoding;

class Distance {
    public $locations = [];
    
    public function addPlace($location) {
        $loc = Geocoding::lookup($location);
        // var_dump($loc); die('->>');
        $this->locations[] = $loc;
    }
    
    public function getDifference() {
        return Geocoding::getDifference($this->locations);
    }
    
    public function getLocations() {
        return $this->locations;
    }
    
    public function inspect() {
        var_dump($this->locations);
    }
}