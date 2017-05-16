<?php

namespace Vesic\DistanceBetween;

class Location {
    
    public $data = [];
    
    public function __construct($input) {
        $this->data = $input;
        // $this->locationData = 'hello world';
    }
    
    public function getLatitude() {
        // return $this->data;
        return $this->data['results'][0]['geometry']['location']['lat'];//[1]['location'];
        // return $this->locationData['coordinates'];
    }
    
    public function getLongitude() {
        return $this->data['results'][0]['geometry']['location']['lng'];
    }
    
}