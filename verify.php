<?php
$access_token = 'ifKSrOv1jXoNE12N1uKII0QOKqWrBSinwdXnnwUzclDMOCTqrJby6QHr15tdniiJmBptSk5EKSbD4v+HJos9Tlz5kZMpl5X6HRGLn5RG6uq2U6BUgw2nJHPQkeH5eBLVlJOWqoeX0CH763WNwPKPBAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
