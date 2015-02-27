<?php

for ($i = 0; $i < 100000; $i++) {
    $randomLatitude = floatVal(rand(6, 9) . '.' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9));
    $randomLongitude = rand(79, 81);
    if ($randomLongitude == 79) {
        $randomLongitude = floatVal($randomLongitude . '.' . rand(7, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9));
    } elseif ($randomLongitude == 81) {
        $randomLongitude = floatVal($randomLongitude . '.' . rand(0, 5) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9));
    } else {
        $randomLongitude = floatVal($randomLongitude . '.' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9) . '' . rand(0, 9));
    }
    $randomSoundLevel = floatVal(rand(10, 110) . '.' . rand(0, 9) . '' . rand(0, 9));
    $randomTimeStamp = rand(1398643200, 1418542140);

    $randomImei = rand(0, 9);

    $data = array('metadata' => array('service' => 'noise', 'mode' => 'upload', 'imei' => '12345678901234' . $randomImei, 'feature' => 'noiseData'), 'rawdata' => array('latitude' => $randomLatitude, 'longitude' => $randomLongitude, 'noise_level' => $randomSoundLevel, 'date_time' => $randomTimeStamp));

    $data_string = json_encode($data);

    $url = 'http://156.56.93.34/CDME/request.php';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
//    curl_setopt($ch, CURLOPT_PROXY, "cache.mrt.ac.lk:3128");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($ch);
    curl_close($ch);

    echo $result;
}
?>