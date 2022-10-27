
<?php
require 'keys/capikeys.php';
#ADD YOOUR STREAM NAME AND TOKEN
$streamName = "YOUR_STREAM_NAME";
$publishingToken = "YOUR_PUBLISHING_TOKEN";

$url_vox = 'https://api.voxeet.com/v1/auth/token';

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url_vox);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);

$headers = array();
$headers[] =  $credentials;
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';

curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers );

$data = 'grant_type=client_credentials&expires_in=3600';

$result = curl_exec($ch1);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch1);
}$result = json_decode( $result, true);

if (curl_errno($ch1)) {
    echo 'Error:' . curl_error($ch1);
}
curl_close($ch1);
//print_r($result).'<br />';
//outputs array
$accessToken = $result['access_token'];
//echo "<br>";
//$refreshToken= $result['refresh_token'];
//$expiredTime= $result['expires_in'];


$url_id = "https://comms.api.dolby.io/v1/monitor/conferences?from=0&to=9999999999999&max=100&active=true&livestats=false";
$auth_token = 'Authorization: Bearer ' . $accessToken ;
//echo $auth_token.'<br />';
;
//echo "<br>";
$ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, $url_id);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] =  $auth_token;


curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers );


$result2 = curl_exec($ch2);
if (curl_errno($ch2)) {
  echo 'Error:' . curl_error($ch2);
}$result2 = json_decode( $result2, true);

if (curl_errno($ch2)) {
    echo 'Error:' . curl_error($ch2);
}
curl_close($ch2);
//print_r($result2).'<br />';
//outputs array
foreach($result2['conferences'] as $key =>$value){
//echo $key.'<br />';
foreach($key['confId'] as $conf){

}
}
//print_r($result2).'<br />';

$conferencId= $result2['conferences'][$key]['confId'];

//echo $conferencId.'<br />';
//echo $credentials;
$url_millicast = 'https://comms.api.dolby.io/v2/conferences/mix/'.$conferencId.'/lls/stop';
$apiKey = 'Authorization: Bearer '. $accessToken;
//echo $url_millicast.'<br />';
$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL, $url_millicast);
curl_setopt($ch3, CURLOPT_POST, true);
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = $apiKey;
$headers[] = 'Content-Type: application/json';
curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers );
$data = "{}";
curl_setopt($ch3, CURLOPT_POSTFIELDS, $data);

$result3 = curl_exec($ch3);
if (curl_errno($ch3)) {
    echo 'Error:' . curl_error($ch3);
}$result3 = json_decode( $result3, true);

if (curl_errno($ch3)) {
 echo 'Error:' . curl_error($ch3);
}
curl_close($ch3);
print_r($result3).'<br />';
//outputs array


?>
