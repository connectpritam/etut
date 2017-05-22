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
			  					<div class="panel-title"><b><i> Message</i></b></div>
								
				  			</div>
<!-- PAGE CONTENTS BEGIN -->				  			
				  			<div class="content-box-large box-with-header">
				  			<h1 style="color: green;">Success</h1>
				  			<h3>Operation completed succesfully</h3>
				  			<p>Loading dashboard automatically in 3 seconds.</p>
<!-- END OF PAGE CONTENTS	 -->							               
								<br /><br />
							</div>
		  				</div>
		  		</div>
		  </div>
		</div>
		</div>
    	<?php include("php/footer.php"); ?>
    	<?php if($_SESSION['rl']=='Admin')
    			echo("<script>setTimeout(function(){window.location.href='admindash.php'},5000);</script>");
		  				else
		  				echo("<script>setTimeout(function(){window.location.href='userdash.php'},5000);</script>");  ?>
    	
  	</body>
</html>
 <?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>