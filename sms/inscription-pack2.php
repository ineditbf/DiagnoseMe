<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
$nom_complet=$_POST['nom_complet'];
$description=$_POST['description'];
$ville=$_POST['ville'];
$telephone=$_POST['telephone'];
$code_pin=md5($_POST['code_pin']);

$sql="INSERT INTO  marchand(nom_complet,description,ville,telephone,code_pin) VALUES(:nom_complet,:description,:ville,:telephone,:code_pin)";
$query = $dbh->prepare($sql);
$query->bindParam(':nom_complet',$nom_complet,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':ville',$ville,PDO::PARAM_STR);
$query->bindParam(':telephone',$telephone,PDO::PARAM_STR);
$query->bindParam(':code_pin',$code_pin,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<body onLoad="alert(\'Inscriction au  reussie! Vous pouvez vous connecter pour ajouter des produits\')">';
echo '<meta http-equiv="refresh" content="0;URL=connect.php">';
}
else
{
$error="Une erreur dans le formulaire. Revoir";
}

}
?>

<!DOCTYPE html>
<html lang="fr" >

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jagok&#603;la - Inscription</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
    <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
	
	</script>
<script language="javascript">
function isNumberKey(evt)
      {
         
        var charCode = (evt.which) ? evt.which : event.keyCode
                
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
           return false;

         return true;
      }
      </script>
 <script language="javascript">
function formulaire()
{
	
	
	var x=document.getElementById("choix").value;
	document.getElementById("test").innerHTML = x;
	
	if(x==="Paypal")
	{document.getElementById("Orange").style.display = "none"; 
document.getElementById("Mobicash").style.display = "none";  
document.getElementById("Coris").style.display = "none"; 
document.getElementById("Ecobank").style.display = "none"; 
document.getElementById("Paypal").style.display = "block"; 
document.getElementById("champ").style.display = "block"; 
document.getElementById("vivre").style.display = "none"; 
document.getElementById("validation").style.display = "block"; 
}
	else if(x==="Orange")
	{document.getElementById("Orange").style.display = "block"; 
document.getElementById("Mobicash").style.display = "none";  
document.getElementById("Coris").style.display = "none"; 
document.getElementById("Ecobank").style.display = "none"; 
document.getElementById("Paypal").style.display = "none"; 
document.getElementById("champ").style.display = "block"; 
document.getElementById("vivre").style.display = "none"; 
document.getElementById("validation").style.display = "block"; 
}
	else if(x==="Mobicash")
	{document.getElementById("Orange").style.display = "none"; 
document.getElementById("Mobicash").style.display = "block";  
document.getElementById("Coris").style.display = "none"; 
document.getElementById("Ecobank").style.display = "none"; 
document.getElementById("Paypal").style.display = "none"; 
 document.getElementById("champ").style.display = "block"; 
 document.getElementById("vivre").style.display = "none"; 
 document.getElementById("validation").style.display = "block"; 
}
else if(x==="Coris")
	{document.getElementById("Orange").style.display = "none"; 
document.getElementById("Mobicash").style.display = "none";  
document.getElementById("Coris").style.display = "block"; 
document.getElementById("Ecobank").style.display = "none"; 
document.getElementById("Paypal").style.display = "none"; 
document.getElementById("champ").style.display = "block"; 
document.getElementById("vivre").style.display = "none"; 
document.getElementById("validation").style.display = "block"; 
}
	else if(x==="Ecobank")
	{document.getElementById("Orange").style.display = "none"; 
document.getElementById("Mobicash").style.display = "none";  
document.getElementById("Coris").style.display = "none"; 
document.getElementById("Ecobank").style.display = "block"; 
document.getElementById("Paypal").style.display = "none"; 
document.getElementById("champ").style.display = "block"; 
document.getElementById("vivre").style.display = "none"; 
document.getElementById("validation").style.display = "block"; 
}
	else if(x==="aucun")
	{document.getElementById("Orange").style.display = "none"; 
document.getElementById("Mobicash").style.display = "none";  
document.getElementById("Coris").style.display = "none"; 
document.getElementById("Ecobank").style.display = "none"; 
document.getElementById("Paypal").style.display = "none"; 
document.getElementById("champ").style.display = "none"; 

document.getElementById("vivre").style.display = "none"; 
document.getElementById("validation").style.display = "block"; 
}
	else if(x==="")
	{document.getElementById("Orange").style.display = "none"; 
document.getElementById("Mobicash").style.display = "none";  
document.getElementById("Coris").style.display = "none"; 
document.getElementById("Ecobank").style.display = "none"; 
document.getElementById("Paypal").style.display = "none"; 
document.getElementById("champ").style.display = "none"; 

document.getElementById("vivre").style.display = "none"; 
document.getElementById("validation").style.display = "block"; 
}
else if(x==="vivre")
	{document.getElementById("Orange").style.display = "none"; 
document.getElementById("Mobicash").style.display = "none";  
document.getElementById("Coris").style.display = "none"; 
document.getElementById("Ecobank").style.display = "none"; 
document.getElementById("Paypal").style.display = "none"; 
document.getElementById("champ").style.display = "none"; 
document.getElementById("vivre").style.display = "block";
document.getElementById("validation").style.display = "none";  

}

	
}
 </script>
</head>

<body style="background: url(img/5.jpg);background-repeat:no-repeat; background-attachment:fixed; background-position:center;background-size:cover">

    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Inscription</h1>

        <ol class="breadcrumb" style="background:cover">
            <li class="breadcrumb-item" >
                <a href="index.php">Acceuil</a>
            </li>
            <li class="breadcrumb-item active">Contact</li>
        </ol>

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
      
		
		        
	    <div class="col-lg-4 col-sm-5 portfolio-item" >
       
                <div class="card h-80">
                    
                     <div class="card-block"style="color:white!important; background:#c5d31b;">
                        <p class="card-text">   <b>D&#596;&#596;nni-D&#596;&#596;nin - </b>06 mois à 5000F<b><h7 class="card-title"></h7></b></div>
						   <p class="card-text"><b>* 05 Compte marchand</font></b>
                          <p class="card-text"><b>* 50 catégories de produits</font></b>
						 <p class="card-text"><b>* Gestion du stock</font></b>
						  <p class="card-text" ><b>* Accès au requêtes</font></b>
						  <p class="card-text"><b></font></b><br><br>
						
						 
						


	   </div> </div>
	   
	    <div class="col-lg-8 col-sm-5 portfolio-item" >
                <?php if($error){?><div class="errorWrap"><strong>Erreur</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>OK</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <form name="sentMessage"  method="post" autocomplete="off">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label><b>Quel est le nom de votre boutique ?</label>
                            <input type="text" class="form-control" id="nom_complet" name="nom_complet" required data-validation-required-message="Veuillez saisir votre nom complet !">
                            <p class="help-block"></p>
                        </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
                            <label>Qui est le responsable des ventes ?</label>
                            <input type="text" class="form-control" id="nom_responsable" name="nom_complet" required data-validation-required-message="Veuillez saisir le nom du responsable !">
                            <p class="help-block"></p>
                        </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
                            <label>Décrire vos activités:</label>
                             <textarea rows="6" cols="4" class="form-control"  name="description"  maxlength="500" style="resize:none"></textarea>
                        </div>
                    </div>
					        <div class="control-group form-group">
                    <div class="controls">
                            <label>Dans quelle ville residez-vous ?</label>
                        <div><select name="ville" class="form-control" required>
                        <option value="">Choisir</option>
<?php $sql = "SELECT * from  ville ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->ville);?>"><?php echo htmlentities($result->ville);?></option>
<?php }} ?>
</select>
</div></div></div>
					
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Quel est votre numéro de télephone:</label>
                            <input type="text" class="form-control" id="telephone" name="telephone"  required data-validation-required-message="Votre telephone SVP." onKeyPress="return isNumberKey(event)">
                        </div>
                    </div>
            
                      
                     <div class="control-group form-group">
                        <div class="controls">
                            <label>Choisir  un code PIN de connexion (4 chiffre):</label>
                            <input type="password" class="form-control" id="code_pin" name="code_pin" required data-validation-required-message="Votre mot de passe SVP " onKeyPress="return isNumberKey(event)">
                        </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
                            <label>Resaisir le code PIN de connexion choisi:</label>
                            <input type="password" class="form-control"  name="code_pin2" required data-validation-required-message="Confirmer votre mot de passe SVP "  onKeyPress="return isNumberKey(event)">
                        </div>
                    </div>
					
                    <div class="form-group">
												<label class=" control-label">Les frais d'adhesion à payer :</label>
											<div class="controls">
													<input type="text" class="form-control" name="reste_a_solder"  readonly required="required" value="5000 FCFA" onKeyPress="return dette(event)" >
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Comment voulez-vous payer ?:</label>
												<div class="controls">
													<select id="choix" name="moyen" class="form-control" onChange="formulaire()" required>
													<option value="">Choisir</option>
												
													<option value="Orange">Orange Money</option>
													<option value="Mobicash">Mobicash</option>
													<option value="Coris">Coris Money</option>
													<option value="Ecobank">Ecobank mobile</option>
												
														<option value="Paypal">Carte Visa</option>
															<option value="vivre">Payer en nature</option>
													</select>
												</div>
											</div> 
											
											
											
											<div id="test" name="test" hidden></div>	
							
										
										
											<div id="Paypal"  style="display:none" >												
												
												<center>
<input type="image" src="img/paypal1.gif" border="0"  alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
<br> Payez depuis votre compte paypal ou votre Carte bancaire, puis saisr les informations ci-dessous</center>
												
												</div>
												
												<div id="Orange" style="display:none">	
												<center><input type="image" src="img/orange.jpg" height="70px" border="0">
												<br>Veuillez bien composer <b>*144*4*6*montant#</b> sur votre portable.<br> Puis saisissez le montant,  votre numero et le code OTP reçu dans les champs ci-dessous</center>
												
													</div>
												
												<div id="Mobicash"  style="display:none"  >												
											<center><input type="image" src="img/mobicash.jpg" height="70px" border="0" >
												<br>Veuillez bien composer <label>*555*4*code Jagokela*montant#</label> sur votre portable.<br> Puis saisissez le montant, votre numero et le code de la transaction reçu dans les champs ci-dessous</center>
												
												</div>
												
												<div id="Coris"  style="display:none" >												
												<center><input type="image" src="img/coris.png" height="70px" border="0">
												<br>Veuillez bien choisir paiement Biens & services,  scanner <label> le QRcode Jagokela</label> avec votre portable.<br> Puis saisissez le montant, votre numero et le code de la transaction reçu dans les champs ci-dessous</center>
												
												</div>
												
												<div id="Ecobank"  style="display:none" >												
												<center><input type="image" src="img/ecobank.jpg" height="70px" border="0">
												<br>Veuillez bien choisir paiement Biens & services,  scanner <label> le QRcode Jagokela</label> avec votre portable.<br> Puis saisissez le montant, votre numero et le code de la transaction reçu dans les champs ci-dessous</center>
												
												</div>
												
												<div id="champ"  style="display:none" >	
												 <div class="form-group" >												
												<label class="control-label">Montant</label>
												<div class="control">
													<input id="montant" type="text" name="montant"  onKeyPress="return isNumberKey(event)"  maxlength="20" class="form-control" />
												</div>
												</div>
                                       <div class="form-group" >												
												<label class="control-label">Nom du payeur ou Numero de téléphone</label>
												<div class="control">
													<input type="text" name="payeur"   maxlength="20" class="form-control" />
												</div>
												</div>
												  <div class="form-group" >
												<label class="control-label">Code transaction</label>
												<div class="control">
													<input type="text" name="code"   maxlength="20" class="form-control" />
												</div>
												
											</div>	</div>
											
											
											<div id="vivre"  style="display:none" >												
												<center><input type="image" src="img/cereales.jpg" height="70px" border="0" onclick=" window.open('vivres1.php','myNewWinsr','width=800,height=600,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no');" alt="Payer en céréales">
												<input type="image" src="img/tubercules.jpg" height="70px" border="0" onclick=" window.open('vivres2.php','myNewWinsr','width=800,height=600,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no');">
												<br>Veuillez cliquer sur <label> le type de produit</label> qui sera utilisé pour le paiement<br> Puis contacter le +226 54 91 55 55 pour fournir le produit en fonction du montant de l'adhesion </center>
												
												</div>
					
					
				
                    <!-- For success/fail messages -->
					<div id="validation"  style="display:none" >			
											<div class="form-group">
											
								<center><button class="btn btn-primary" name="submit" type="submit">Valider votre inscription</button>
											</center>	
											</div></div>
				</form>
            </div>

            <!-- Contact Details Column -->

       
			
			
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container -->
<?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

</body>

</html>
