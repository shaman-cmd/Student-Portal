<?php
include 'includes/connect.php';

if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($con, $_POST['email']);
	
	$res = mysqli_query($con, "SELECT * FROM users WHERE email = '$email';");
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";
        $smsg;
		$fmsg;
		$message = "Please use this password to login :" . $password;
		$headers = "From : shamanharish123@gmail.com";
		if(mail($to, $subject, $message, $headers)){
			$smsg="Your Password has been sent to your email id";
			
		}else{
			$fmsg= "Failed to Recover your password, try again";
		
		}

	}else{
		$fmsg= "Account with this email address doesn't exist";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Login</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->

  
  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body class="cyan">
<!-- Start Page Loading -->
<div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
  <div id="login-page" class="row">
   <div class="col s12 z-depth-4 card-panel">
      
   <form method="post" action="" class="login-form" id="form">   
   <div class="row margin">
   <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
          <div class="input-field col s12">
		 
			  
        <input name="email" id="email" type="email" data-error=".errorTxt1" required>
			  <label for="email">Email</label>
        <div class="errorTxt1"></div>
			</div>
		  </div>
		  
		  <div class="row">
			<input name="recover-submit" class="btn waves-effect waves-light col s12" value="Recover Password" type="submit">
            <br>
			<br>
			<a href="javascript:history.go(-1)"  class="btn waves-effect waves-light col s12">BACK</a>
		  </div>
		  
		  <input type="hidden" class="hide" name="token" id="token" value=""> 
		</form>
</div>

</div>
<!-- jQuery Library -->
<script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

</body>
</html>