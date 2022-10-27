
<?php
require 'keys/capikeys.php';
#need your DOLBY STREAM NAME and Token
$streamName = "YOUR_STREAM_NAME";
$publishingToken = "YOUR_PUBLISHING_TOKEN";
$url_vox = 'https://api.voxeet.com/v1/auth/token';

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url_vox);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);

$headers = array();
$headers[] = $credentials;
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

$accessToken = $result['access_token'];
$url_id = "https://comms.api.dolby.io/v1/monitor/conferences?from=0&to=9999999999999&max=100&active=true&livestats=false";
$auth_token = 'Authorization: Bearer ' . $accessToken ;


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

foreach($result2['conferences'] as $key =>$value){

}
$isLive= $result2['conferences'][6]['live'].'<br />';
$conferenceId= array_column($results2, 'confId').'<br />';
$conferenceIds= $result2['conferences'][$key]['confId'];

echo $conferenceIds.'<br />';
$apiKey = "Authorization: Bearer  $accessToken";




$url = "https://comms.api.dolby.io/v2/conferences/mix/$conferenceIds/lls/start";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "$apiKey",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA

{
     "streamName": "$streamName",
     "publishingToken": "$publishingToken"
}

DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);echo $data.'</br>';
?>
