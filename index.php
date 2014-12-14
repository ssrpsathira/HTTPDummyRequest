<?php

$data = array('metadata' => array('service' => 'noise', 'mode' => 'upload'), 'rawdata' => array('latitude' => '7', 'longitude' => '81', 'noise_level' => '45.67', 'date_time' => ''));
$data_string = json_encode($data);

$url = 'http://156.56.93.34/CDME/request.php';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

//$json_result = json_decode($result, true);
?>