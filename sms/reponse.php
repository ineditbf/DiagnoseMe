
<?php

require __DIR__.'/vendor/autoload.php';

use Informagenie\OrangeSDK;

$sms = new OrangeSDK([
    //'client_id' => 'yFG1zvvNJUmyguXxIgpawvoNmtfPtobz',
    //'client_secret' => 'DsKi0lGAJTPuu3MO',
    'authorization_header' => 'Basic eUZHMXp2dk5KVW15Z3VYeElncGF3dm9ObXRmUHRvYno6RHNLaTBsR0FKVFB1dTNNTw=='
]);


	$dbusername = "fasoc1210281";  
    $dbpassword = "advzw9hkr6"; 
    $server = "185.98.131.92"; 
	$dbconnect = mysqli_connect($server, $dbusername, $dbpassword);
    $dbselect = mysqli_select_db($dbconnect, "fasoc1210281");

	$message = isset($_GET['message']) ? $_GET['message'] : null;
	$phoneNumber = isset($_GET['phoneNumber']) ? $_GET['phoneNumber'] : null ;

	// Filtre pour uniquement capture et stocker les messages contenant le mot clé(prefixe)
	$prefixe=substr($message,0,1);
	
		//$phoneNumber=substr($phoneNumber,4);// SUPRIMER 226



		if ($prefixe=="@") // si message commence par @
			
	{// Decomposition
		list($prefixe, $produit, $ville) = explode(",", $message); // decomposer le message en lisant entre les espaces;
		
		
		
		//on soustrait les 4 premieres lettres de produits
			$produit=substr($produit,0,4);
			$produit=$produit."%";

			//onsoustrait les 4 premieres lettres de villes
			$ville=substr($ville,0,4);
			$ville=$ville."%";
			
			$sql = "INSERT INTO requete (phoneNumber, reponse) Values ('".$phoneNumber."', '".$message."')";
			
			if(mysqli_query($dbconnect,$sql))
{
echo "OK";
mysqli_close($dbconnect);
}		
			
			
			
			
			
if(!empty($ville))
{

	$sql="SELECT marchand,telephone, prix,detail_prix FROM produit WHERE statut='1' AND nom_produit LIKE '$produit' AND ville LIKE '$ville'";
}
else
{

	$sql="SELECT marchand,telephone, prix,detail_prix FROM produit WHERE statut='1' AND nom_produit LIKE '$produit'";
}
	$records=mysqli_query($dbconnect,$sql);
	//$json_array=array();

	while($row=mysqli_fetch_array($records))
	{
		
		

	
	$reponse .= $row['marchand'];
	$reponse .= " - ";
	$reponse .= $row['prix'];
	$reponse .= "F/";
	$reponse .= $row['detail_prix'];
	$reponse .= " - 226";
	$reponse .= $row['telephone'];
$reponse .= "\n";
		
		
	}

				//REPONSE
			//	header("Location: http://192.168.0.16:8090/SendSMS?username=test&password=1234&phone=".$phoneNumber."&message=$reponse");
				
		$sql = "INSERT INTO requete (phoneNumber, reponse) Values ('".$phoneNumber."', '".$reponse."')";
			
			if(mysqli_query($dbconnect,$sql))
{
echo "OK";
mysqli_close($dbconnect);
}		
	
				


if(!empty($reponse)){
	
	
	
	$message = $sms->message($reponse)
    ->from(22676600797)
    ->as('Jagokela')
    ->to($phoneNumber)
    ->send();

	
		
		$sql = " UPDATE requete SET status='1'  WHERE phoneNumber= '$phoneNumber' and reponse= '$reponse'" ;
if(mysqli_query($dbconnect,$sql))
{

mysqli_close($dbconnect);}
			
		
		} 

		else{

			$message = $sms->message('Produit non disponible pour le moment dans votre ville !')
    ->from(22676600797)
    ->as('22654915555')
    ->to($phoneNumber)
    ->send();

		}
		
}

		if ($prefixe=="F") // si message commence par Faso
			
	{ 
		
			$message = $sms->message('Bienvenue sur FasoJagokela.'."\n".'Pour recevoir la liste des produits locaux envoyez: LISTE'."\n".'Pour acheter un produit envoyez:@,NOM_PRODUIT,VILLE'."\n".'ou envoyez: AIDE')
    ->from(22676600797)
   ->as('22654915555')
    ->to($phoneNumber)
    ->send();
		
	
			
		
		} 
		

			
		
	
	
	
			if ($prefixe=="L") // si message commence par Liste
			
	{ 
		
		$sql="SELECT DISTINCT nom_produit FROM produit WHERE statut='1' ORDER BY nom_produit ASC Limit 20";

	$records=mysqli_query($dbconnect,$sql);
	//$json_array=array();

	while($row=mysqli_fetch_array($records))
	{
		
	$liste .= $row['nom_produit'];
$liste .= "\n";
		
		
	}
				$message = $sms->message('Produits diponibles:'."\n".$liste)
    ->from(22676600797)
    ->as('Jagokela')
    ->to($phoneNumber)
    ->send();
	
	}
	
		
			if ($prefixe=="A") // si message commence par Liste
			
	{ 
		

				$message = $sms->message('Jagokela est une passerelle entre producteurs et consommateurs.Vendez et achetez grace à un simple SMS. Appelez le numero 76600797 ou Visitez ce lien ci-dessous: http://jagokela.fasocivic.org/faq.php' )
    ->from(22676600797)
    ->as('22654915555')
    ->to($phoneNumber)
    ->send();
	}
	
	
					if ($prefixe=="S") // si message commence par SANG
			
	{ 
		
			$message = $sms->message('Bienvenue sur la plateforme DIOLI.'."\n".'Pour avoir la disponibilité d'un type de sang dans votre localité, envoyez:'."\n".'# GROUPE_SANGUIN VILLE'."\n".'au 22654915555'."\n".'Pour en savoir plus, envoyez: HELP')
    ->from(22676600797)
   ->as('DIOLI')
    ->to($phoneNumber)
    ->send();
		
	
		} 
		
		
				if ($prefixe=="#") // si message commence par @
			
	{// Decomposition
		list($prefixe, $type, $ville) = explode(" ", $message); // decomposer le message en lisant entre les espaces;
		
			//$phoneNumber=substr($phoneNumber,4);
			


	$sql="SELECT FullName,MobileNumber,BloodGroup FROM tblblooddonars WHERE status='1' AND BloodGroup= '$type' AND Address='$ville'";

	$records=mysqli_query($dbconnect,$sql);
	//$json_array=array();

	while($row=mysqli_fetch_array($records))
	{
		
		

	
	$reponse .= $row['FullName'];
	$reponse .= " - Tel: ";
	$reponse .= $row['MobileNumber'];
$reponse .= "\n";
		
		
	}

				
		$sql = "INSERT INTO requete (phoneNumber, reponse) Values ('".$phoneNumber."', '".$reponse."')";
			
			if(mysqli_query($dbconnect,$sql))
{
echo "OK";
mysqli_close($dbconnect);
}		
	
				


if(!empty($records)){

		$message = $sms->message($reponse)
    ->from(22676600797)
    ->as('DIOLI')
    ->to($phoneNumber)
    ->send();

			
		
		} 

		else{

		$message = $sms->message('Groupe sanguin non disponible pour le moment dans votre ville ! Vous recevrez une alerte')
    ->from(22676600797)
    ->as('DIOLI')
    ->to($phoneNumber)
    ->send();
		}
		
		
		
}

	
?>







