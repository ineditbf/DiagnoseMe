<?php


session_start();

error_reporting(0);
.//include('includes/config.php');


if(isset($_POST['send']))
  {


}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DiagnoseMe</title>
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
 <script>
function locate() {
   const posStatus = document.querySelector('#posStatus');
   const locInfo = document.querySelector('#locInfo');
   posStatus.innerHTML='Locating...'
   if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position)=>{
      const lat  = position.coords.latitude;
      const long = position.coords.longitude;
      posStatus.innerHTML='Your actual location:';
      // Display Latitude and Logitude
      locInfo.innerHTML = `Latitude: ${lat}, Longitude: ${long}`;
      // Create the link. Use map=15-19 for zooming out and in
      // Pass lat and long to openstreetmap
      locInfo.href = `https://www.openstreetmap.org/#map=19/${lat}  /${long}`;
    
	  document.getElementById("plan").src= `https://www.openstreetmap.org/#map=19/${lat}  /${long}`;
      });
   }
}
</script>

<script>
function temp() {
  var temperature = prompt("Connect your thermometer or input your body temperature value en °Celsus", "37.0");
     document.getElementById("temperature").innerHTML = temperature;
 document.getElementById("temperature").style.display = "block";	 
 document.getElementById("img-temperature").style.display = "block";	 
 document.getElementById("test2").style.display = "block";	 
 document.getElementById("test3").style.display = "none";	 
 document.getElementById("test4").style.display = "none";	 
 document.getElementById("get-result").style.display = "none";	 
 document.getElementById("result").style.display = "none";	 
	  document.getElementById("img-temperature").src = "img/temperature.jpg"; 
}
</script>
<script>
function NO() {
  document.getElementById("respitory").innerHTML = "NO";
 document.getElementById("no").style.display = "none";
 document.getElementById("yes").style.display = "none";
 document.getElementById("test3").style.display = "block";	 
 document.getElementById("test4").style.display = "block";	 
 document.getElementById("get-result").style.display = "none";
 document.getElementById("result").style.display = "block";
}
</script>
<script>
function YES() {
  document.getElementById("respitory").innerHTML = "YES";
 document.getElementById("no").style.display = "none";
 document.getElementById("yes").style.display = "none";
 document.getElementById("test3").style.display = "block";	 
 document.getElementById("test4").style.display = "none";	 
 document.getElementById("get-result").style.display = "none";
 document.getElementById("result").style.display = "none";
}
</script>

<script>
function cough() {
 confirm("Cough hard on your phone's microphone and click on OK");
 document.getElementById("no").style.display = "none";
 document.getElementById("yes").style.display = "none";
 document.getElementById("test3").style.display = "block";	 
 document.getElementById("test4").style.display = "block";	 
 document.getElementById("get-result").style.display = "none";
 document.getElementById("result").style.display = "block";
}
</script>
<script>
function isNumberKey(evt)
      {
         
        var charCode = (evt.which) ? evt.which : event.keyCode
                
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
           return false;

         return true;
      }
	  </script>
</head>

<body>

    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
      


 <?php if($error){?><div class="errorWrap"><strong>Erreur</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>OK</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
		<center>  <h3 class="mt-4 mb-3"><small>Welcome to COVID-19 symptomes diagnose form</small></h3></center>
<br><br>
        <!-- Content Row --><form name="sentMessage"  method="post" enctype="multipart/form-data">
        <div class="row">
            <!-- Map Column -->
              <div class="col-lg-3 mb-4">
		<div style="background-color:#d10a10;color:white;font-family:arial black;width:100%!important"><center>1-IDENTIFICATION</center></div> 
			   <div class="control-group form-group">
                        <div class="controls">
                            <label><b>You are</b></label> &nbsp; </br>
                         <form> 
						 	<input type="radio" id="choix1"
								 name="choix" value="male">
								<label for="choix1">Male </label>   </br>
									<input type="radio" id="choix2"
								 name="choix" value="female">
								<label for="choix2">Female</label>   
									
							
								
										</div>
                        </div>
			  <label> <b>What is your age ?</b></label>
<input style="width:50px;" type="text" class="form-control" id="age" name="age" placeholder="" onKeyPress="return isNumberKey(event)" maxlength="2"></br>
<label> <button class="btn btn-info" style="font-size:14px" onclick="locate();">Click to locate you</button></label>

<div class="form-control" style="border:none"><span id = 'posStatus'></span></br>
<a id = 'locInfo' target="#"></a></div>

					<div class="control-group form-group">
	  <label class="control-label"><b>Your phone number</b></label>
	  
	<div>  <div class="input-group">
	
	  <div class="input-group-btn">
    <button class="btn btn-info" style="font-size:14px">
        +226
      </button></div>
    <input type="text"  name="telephone" class="form-control"  placeholder="Your phone" required maxlength="11" onKeyPress="return isNumberKey(event)" >
	
      <span class="input-group-addon">
        <i class="fa fa-phone"></i></span>
      
    
 </div>
  </div>  </div>


          

  </div>

  <div class="col-lg-3 mb-4" >
               
                
				
				<div style="background-color:#d10a10;color:white;font-family:arial black;width:100%!important"><center>2-SYMPTOMES TESTS</center></div>
                   
				                       <div class="control-group form-group">
                    <div class="controls">

                      
                     <div class="control-group form-group">
					 
					  <div class="row">
                        <div class="col-md-4">
						<img id="img-temperature" style="width:100px;height:100px;display:none"/></div>
												 <div class="col-md-8"><center>Body temp. in °C</br><span  id="temperature" style="display:none;color:red;font-family:arial black;" ></span></center></div>
											
												</div>
												<center><button class="btn btn-info" id="get" type="button" onclick="temp()">Get</button>
												
												</center></br>
											<div class="row" id="test2" style="display:none">	
												<div class="col-md-12"><center>
Difficulty breathing?</br><span id="respitory" style="color:red;font-family:arial black;" ></span></center></div> <div class="col-md-4">
						<img src="img/respiratory.png" style="width:100px;height:100px;"/></div>
												
											<center>
												<button class="btn btn-success" id="no" type="button" onclick="NO()">No</button>
												<button class="btn btn-danger" id="yes" type="button" onclick="YES()">Yes</button></center>
												</div>
												
												<div class="row" id="test3" style="display:none">	
								<div class="col-md-12"><center>
Click to record cough <button class="btn btn-info" id="cough" type="button" onclick="cough()">REC</button></br><span id="cough" style="color:red;font-family:arial black;" ></span>0dB</center></div></center>
								
								
												</div>
												</br>
												
												
												
												<div class="row"id="test4" style="display:none" >	
								<div class="col-md-12"><center>
Blood pressure?</br><span id="blood" style="color:red;font-family:arial black;" >00/00</span></center></div>
<div class="col-md-4">
						<img src="img/blood.jpg" style="width:100px;height:100px;"/></div>
</center>
								
												</div>
	</div>
                    
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button id="get-result" style="display:none" type="submit" name="send"  class="btn btn-primary">Get result</button>
                </form>
            </div>
</div>
				   
                    </div>
					  <div class="col-lg-5 mb-4" id="result" style="display:none">
					  <div style="background-color:#d10a10;color:white;font-family:arial black;width:100%!important"><center>3-RESULTS</center></div> 
					    <label><b>Your symptomes are:</b></label>
                    <iframe id="plan" style="width:100%;height:400px;"></iframe>

 
  


            

            
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
