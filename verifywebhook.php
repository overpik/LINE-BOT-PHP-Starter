<?php
$challenge = $_REQUEST['hub_challenge'];
$verify_token = $_REQUEST['hub_verify_token'];

if ($verify_token === 'cloudwaysschool') {
  echo $challenge;
}

$input = json_decode(file_get_contents('php://input'), true);

$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];


//API Url
$url = 'https://graph.facebook.com/v2.6/me/messages?access_token=EAAEhBXJxZCHcBAFLdeuBZCJSjz3NdhTi9tIP3nIEZCfVC9II1sLmXlOeLZAu9SqWO0hgFOoVmaMwMLy3caE3Au65e0Vjk0R2HUuRMjrbjOKq0z5jALpFIdpl91Briiycrz2cG9Of2tsGZAPYvoFMXmuUcM5Yk7ylDeoGrQ3GzzFSCeEqZAlPFDYF4INAwp8SYZD';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"'.$sender.'"
    }, 
    "message":{
        "text":"Hey Lee!"
    }
}';

//Encode the array into JSON.
$jsonDataEncoded = $jsonData;

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

//Execute the request
if(!empty($input['entry'][0]['messaging'][0]['message'])){
$result = curl_exec($ch);
}
