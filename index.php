<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Konkurrence - Vind en fedtfrysning</title>


</head>

<body>

<?php 
require_once("facebook.php");

  $config = array(
      'appId' => '253320374837362',
      'secret' => '86c9651fa330dc9f286db81c26fa8d49',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
 ?>

<style type="text/css">
#content {
	background-image:url('https://dl.dropboxusercontent.com/u/149925174/backkon.jpg');
	width: 760px;
	height: 740px;
	margin:  auto;
	padding: 0 0 0 0;
	position: relative;
}

#space{
	height: 455px;
	width: 99%;
}

#form1 {
	margin-left: auto;
	margin-right: auto;
	position: relative;
	text-align: center;
}

input
{
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    width: 270px;
    height: 30px;
    font-size: 14px;
    font-family: Tahoma;
    padding-left: 5px;
    border: solid #8d8e8f 1px;
    background-color: #f7fafc;
}

::-webkit-input-placeholder {
   color: #747678;
}

:-moz-placeholder { /* Firefox 18- */
   color: #747678; 
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #747678;
}

:-ms-input-placeholder {  
   color: #747678;  
}

.send {
	background: url('deltag.jpg') no-repeat;
	cursor: pointer;
	width: 103px;
	height: 37px;
	border: none;
}

.error {
	color: red;
	font-family: Tahoma;
	font-size: 11px;
}

.succes {
	color: #6685a0;
	font-family: Tahoma;
	font-size: 11px;
}
</style>

<div id="content">
<div id="space">
</div>

<div id="form1">
<?php

$errorMes = "";
$succesMes = "";
$nameErr = "";

function sendMail() {
	//send email
	$email = $_REQUEST['email'] ;
	$navn = $_REQUEST['navn'] ;
	$subject = "Ny deltager";
	$message = "Navn: $navn E-mail: $email";
	
	mail("konkurrenceimage@schirakowdesigns.dk", $subject, $message, "From:" . $email);
	$succesMes = "Du deltager nu i konkurrencen";	
}

if (isset($_POST['submit']))
  {

  if (empty($_POST['navn']) && empty($_POST['email'])) {
  	$errorMes = "Udfyld venligst navn og email";
  }
  
  elseif (empty($_POST['navn'])) {
	$nameErr = "Udfyld venligst dit navn";
  }
  
  elseif (empty($_POST['email'])) {
  	$nameErr = "Udfyld venligst din email";
  }
  
  elseif (!empty($_POST['navn']) && !empty($_POST['email'])) {
  	$email = $_REQUEST['email'] ;
  	$navn = $_REQUEST['navn'] ;
  	$subject = "Ny deltager";
  	$message = "Navn: $navn E-mail: $email";
  	
  	mail("konkurrenceimage@schirakowdesigns.dk", $subject, $message, "From:" . $email);
  	unset($_POST);
  	$succesMes = "Du deltager nu i konkurrencen";
  }
 
  
  }
  

?>


 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<p><input name="navn" placeholder="Navn" value="<?php if(isset($_POST['navn'])) { echo $_POST['navn']; } ?>"></p>

<p><input name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>"></p>

<input class="send" name="submit" type="submit" value="">



<br />
<br />
<span class="error"><?php echo $errorMes;?></span>
<span class="error"><?php echo $nameErr;?></span>
<span class="error"><?php echo $mailErr;?></span>
<span class="succes"><?php echo $succesMes;?></span>



</form>
</div>

</div>

</body>
</html>
