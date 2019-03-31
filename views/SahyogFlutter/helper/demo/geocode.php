<?php

include(dirname(__DIR__).'/src/AbstractGeocoder.php');
include(dirname(__DIR__).'/src/Geocoder.php');

// use OpenCage\Geocoder;

if($_POST['action']=="geo_loc"){
    
    $key = getenv('OPENCAGE_API_KEY');
    $geocoder = new \OpenCage\Geocoder\Geocoder('3e1a8205d5944631b4da440df8c49f92');
    $result = $geocoder->geocode($_POST['lat'].",".$_POST['lng']); # latitude,longitude (y,x)
    echo json_encode(["location"=>$result['results'][0]['formatted']]);
}
