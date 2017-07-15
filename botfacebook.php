<?php
// parameters
$hubVerifyToken = 'sutad';
$accessToken =   "EAAEhBXJxZCHcBAFLdeuBZCJSjz3NdhTi9tIP3nIEZCfVC9II1sLmXlOeLZAu9SqWO0hgFOoVmaMwMLy3caE3Au65e0Vjk0R2HUuRMjrbjOKq0z5jALpFIdpl91Briiycrz2cG9Of2tsGZAPYvoFMXmuUcM5Yk7ylDeoGrQ3GzzFSCeEqZAlPFDYF4INAwp8SYZD";
// check token at setup
if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
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
}
}else{
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
}
}

