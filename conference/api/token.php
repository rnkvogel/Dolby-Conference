<?php
$url_vox = 'https://session.voxeet.com/v1/oauth2/token';
$dolby_key = '4hPRqOGopHAGzdVCtJhGpw==';
$dolby_secret = 'RlqNU3XtnghH4ADpS-IhAmeUSR3EmRgTvJu_NWxtWEE=';
$credentials = 'Authorization: Basic ' . base64_encode($dolby_key . ':' .  $dolby_secret) ;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url_vox);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array();
//$headers[] = $crendentials2 ;
$headers[] = 'Content-Type: application/json';
$headers[] = $credentials;
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers );

$data = 'grant_type=client_credentials&expires_in=3600';

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}$result = json_decode( $result, true);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
//print_r($result).'<br />';
//outputs array
#Just need the streamId
$accessToken= $result['access_token'];
echo ' TOKEN=   '.  $accessToken;

?>
