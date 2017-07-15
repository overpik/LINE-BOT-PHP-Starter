<?php
// $challenge = $_REQUEST['hub_challenge'];
// $verify_token = $_REQUEST['hub_verify_token'];

// if ($verify_token === 'cloudwaysschool') {
//   echo $challenge;
//}



$input = json_decode(file_get_contents('php://input'), true);

$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
if($message == 'hi'){

  
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://betimesmss.herokuapp.com/pushnotify.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: b658d48f-157c-4f49-4c76-acca163c94a9"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

}else
