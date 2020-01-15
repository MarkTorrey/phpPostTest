<?php

// url to post too
$url = 'https://valorgis.com/arcgis/rest/services/CommunityFacilities/SunsetHill_New_Lots/FeatureServer/1/addFeatures';

// some form variables
$llocation = 'TEST2';
$flocation = 'TEST2';
$name = 'TEST2';

// stick the form variables into a string
$arr = '{"LOC_NOSP":'.$llocation.',"LOCATION":'.$flocation.',"FULLNAME":'.$name.'}';
$feat = '[{"attributes" :'.$arr.'}]';

// build our param array
$data = array('f' => 'json', 'features' => $feat);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

// send request and right out response
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);