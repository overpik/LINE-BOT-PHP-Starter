<?php
// $challenge = $_REQUEST['hub_challenge'];
// $verify_token = $_REQUEST['hub_verify_token'];

// if ($verify_token === 'cloudwaysschool') {
//   echo $challenge;
//}



$input = json_decode(file_get_contents('php://input'), true);

$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$curl = curl_init();

define('LINE_API',"https://notify-api.line.me/api/notify");
 
$token = "i2PTsV6YCSc7bKt8twJbBoRFFQ2oQ1Qc54drlrH8qfI"; //ใส่Token ที่copy เอาไว้
$str = "แจ้งเตือน มีคน Inbox Facebook"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
 
$res = notify_message($str,$token);
print_r($res);
function notify_message($message,$token){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://betimesmss.herokuapp.com/pushnotify.php",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_HTTPHEADER => array(
//     "cache-control: no-cache",
//     "postman-token: b658d48f-157c-4f49-4c76-acca163c94a9"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }


