<?php

require __DIR__.'/vendor/autoload.php';

use Informagenie\OrangeSDK;

$sms = new OrangeSDK([
    //'client_id' => 'yFG1zvvNJUmyguXxIgpawvoNmtfPtobz',
    //'client_secret' => 'DsKi0lGAJTPuu3MO',
    'authorization_header' => 'Basic eUZHMXp2dk5KVW15Z3VYeElncGF3dm9ObXRmUHRvYno6RHNLaTBsR0FKVFB1dTNNTw=='
]);
echo('Sms de confirmation envoyé');
$telephone='75337535';
$message = $sms->message('Bienvenue dans la famille LAAFI GANDAOGO.Votre carte de membre sera prête dans 24h. MERCI POUR VOTRE CONFIANCE')
    ->from(22676600797)
    ->as('TIBSA-SANTE')
    ->to('226'.$telephone)
    ->send();

echo('Sms de confirmation envoyé');

