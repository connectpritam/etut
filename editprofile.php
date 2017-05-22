<?php
 session_start();
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''){
 	include("php/dbcon.php");
 	$getdta = "SELECT * FROM users WHERE username = '".$_SESSION["un"]."'";
 	$row = mysql_query($getdta);
 	$res = mysql_fetch_array($row, MYSQL_ASSOC);
 	?>
<!DOCTYPE html>
 <html>
  	<head>
	    <title>Edit Profile</title>
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
		  		<?php include("php/usermenu.php"); ?>
		    </div>
		  	<div class="col-md-10">
		  		<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Edit Your profile details</div>
								
				  			</div>
				  			<div class="content-box-large box-with-header">
				  			<div class="col-sm-12"><br>
								            	<b><h4 style="color:#00b1b1;"><?php echo($_SESSION['nm']); ?></h4></b>
								              	<span><p><b><?php echo($_SESSION['rl']); ?> - <?php echo($_SESSION['cl']); ?></b></p></span>
							</div>
				  				<div class="row">
									<div class="col-md-4 ">
									      <div class="content-wrap">

									      		 <br><br>
								  				<form name="signupForm" method="POST" action="php/edituser.php?user=<?php echo $res["username"]; ?> ">
								  					Name
									                <input class="form-control" type="text" name="txtName" value="<?php echo $res["name"]; ?>"><br>
									                Phone
									                <input class="form-control" type="text" name="txtPhn" value="<?php echo $res["phone"]; ?>"><br>
									                Email
									                <input class="form-control" type="text" name="txtEmail" value="<?php echo $res["email"]; ?>">
									                <br><br>
									                EDITIG USERNAME: 
									              	<input class="form-control" disabled="" type="text" value="<?php echo $res["username"]; ?>">
									                <br><br>
									                
									                <div class="action">
							                    <input class="btn btn-primary signup" type="submit" value="Save Profile">
							                </div>
							                </form>
								<br /><br />
								</div></div></div>
							</div>
		  				</div>
		  		</div>
		  </div>
		</div>
		</div>
    	<?php include("php/footer.php"); ?>
  	</body>
</html>
<?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>