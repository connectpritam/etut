<?php
session_start();
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''){
 	?>
 <!DOCTYPE html>
 <html>
  	<head>
	    <title><?php echo($_SESSION['un']);?> Profile</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <!-- Bootstrap --><link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <!-- styles --><link href="css/styles.css" rel="stylesheet">
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
  	</head>
  	<body>
  		<?php include("php/header.php"); ?>
  		<!-- PAGE CONTENTS BEGIN HERE -->
    	<div class="page-content">
    	<div class="row">
		    <div class="col-md-2">
		  		<?php if($_SESSION['rl']=='Admin')include("php/adminmenu.php");
		  				else
		  				include("php/usermenu.php");  ?>
		    </div>
		  	<div class="col-md-10">
		  		<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Change Password for username : <b><i><?php echo($_SESSION['un']);?></i></b></div>
								
				  			</div>
<!-- PAGE CONTENTS BEGIN -->				  			
				  			<div class="content-box-large box-with-header">
				  			<div class="row"><div class="col-md-4">
				  			<div class="content-wrap">
				  				<form name="passchangeform" method="POST" onsubmit="return passcheck()" action="php/changepass.php">
				  					
											<label>Current Password</label>
											<input class="form-control" placeholder="Password" name="oldPass" type="password"><br>										
											<label>New Password</label>
											<input class="form-control" placeholder="Password" name="newPass" id="pass" type="password"><br>
											<label>Confirm New Password</label>
											<input class="form-control" placeholder="Password" id="conpass" type="password"><br><br>
									
									<div class="action">
			                    		<input class="btn btn-primary signup" type="submit" value="Submit">
			               			</div>
								</form>	
							</div></div></div>	
<!-- END OF PAGE CONTENTS	 -->							               
								<br /><br />
							</div>
		  				</div>
		  		</div>
		  </div>
		</div>
		</div>
    	<?php include("php/footer.php"); ?>
  	</body>
  	<!-- PASSWORD VALIDATION -->
	<script type="text/javascript">
		function passcheck(){
		    var pass1 = document.getElementById("pass").value;
		    var pass2 = document.getElementById("conpass").value;
		    var ok = true;
		    if (pass1 != pass2) {
		        alert("Passwords Do not match");
		        document.getElementById("pass").style.borderColor = "#E34234";
		        document.getElementById("conpass").style.borderColor = "#E34234";
		        ok = false;
		    }
		    return ok;
		}
	</script>
	<!-- END OF PASSWORD VALIDATION -->
</html>
 <?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>