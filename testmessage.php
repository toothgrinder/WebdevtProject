<?php
/**
 * This file will show a simple implementation on how to send SMS using Chikka API
 * @author Ronald Allan Mojica
 *
 */
include('Chikka.php');
$clientId = '66f1aabc1eb2ed13bd8e2164934396811a80fd0842e80c199a36df92c4fff3bf';
$secretKey = '33aab86ba595f8acfb35fadf10a74612dfbdf66412b744f8929a51a337a0d6ca';
$shortCode = '2929057032';
$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
$response = $chikkaAPI->sendText('1234561', '639297681072', 'tests');
header("HTTP/1.1 " . $response->status . " " . $response->message);
exit($response->description);
?>