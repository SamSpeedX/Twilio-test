<?php
require_once 'vendor/autoload.php'; 

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Twilio\Rest\Client;

$ujumbe = $_POST['ujumbe'];
$namba = $_POST['namba'];

$sid    = $_ENV['TS_SID'];  // or getenv('TS_SID')
$token  = $_ENV['TS_TOKEN'];  // or getenv('TS_TOKEN')

$twilio = new Client($sid, $token);

$message = $twilio->messages
  ->create(
    $namba,
    array(
      "from" => "+12082619950", 
      "body" => $ujumbe
    )
  );

print($message->sid);