<?php

require __DIR__.'/vendor/autoload.php';

use Informagenie\OrangeSDK;

$sms = new OrangeSDK([
    //'client_id' => 'yFG1zvvNJUmyguXxIgpawvoNmtfPtobz',
    //'client_secret' => 'DsKi0lGAJTPuu3MO',
    'authorization_header' => 'Basic eUZHMXp2dk5KVW15Z3VYeElncGF3dm9ObXRmUHRvYno6RHNLaTBsR0FKVFB1dTNNTw=='
]);



$message = $sms->message('Hello World')
    ->from(22676600797)
    ->as('Jagokela')
    ->to(22676600797)
    ->send();
    
echo '<pre>';
print_r($message);
echo '</pre>';


/*try{ 
$response = $sms->message("Hello world")
        ->from(22676600797)       // Sender phone's number
        ->as('FasoCivic')      // Sender's name (optional)
        ->to(22676600797)      // Recipiant phone's number
        ->send() ;
}catch(\Exception $e){ 
      print_r($e->client->getResponse()); //Te donnera des amples informations sur pourquoi le message n'est pas envoyé
 }*/