<?php
/**
 * Created by PhpStorm.
 * User: Obi Kun
 * Date: 10/9/2015
 * Time: 3:14 PM
 */
ini_set('display_errors',1);
error_reporting(E_ALL);

$post_cp = "";
$message = "Successfully Loaded";
$url = "https://post.chikka.com/smsapi/request";

$shortcode= "2929057032";
$client_id = "66f1aabc1eb2ed13bd8e2164934396811a80fd0842e80c199a36df92c4fff3bf";
$secret_key = "33aab86ba595f8acfb35fadf10a74612dfbdf66412b744f8929a51a337a0d6ca";
$count = time();

$post_data = array(
    "mobile_number" => $post_cp,
    "shortcode" => $shortcode,
    "message_id"=> md5($count++),
    "client_id"=>$client_id,
    "secret_key"=>$secret_key,
    "message_type"=>"SEND",
    "message"=>$message
);
$postvars = http_build_query($post_data);

$ch =curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($post_data));
curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);

$result = curl_exec($ch);

curl_close($ch);
?>