<?php
 session_start();
 include("php/dbcon.php");
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''){
 	$user = $_SESSION['un'];
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
		  				<div class="col-md-12" >
		  					<div class="content-box-header">
			  					<div class="panel-title">History</div>
								</div>
				  			<div class="content-box-large box-with-header">
				  						<div class="row"><br><br><br>
				  				<?php
				  					
				  					$getmyhistory = "SELECT * FROM watchrec WHERE username='".$user."'";
				  					$resmyhistory = mysql_query($getmyhistory);
								?>
									<!-- USER HISTORY VIDEO LIST -->
							    <div class="table-responsive">
									<table border="0" cellpadding="10" cellspacing="1" class="table table-hover">
										<tr class="listheader">
										<td><b>Video Title</b></td>
										<td><b>Uploaded by</b></td>
										<td><b>Date</b></td>
										</tr>
										<?php
									
										while($rowmyhistory = mysql_fetch_array($resmyhistory)) {
											$qrygetvid= "SELECT * FROM videos WHERE vid = '".$rowmyhistory['vid']."'";
											$resgetvid = mysql_query($qrygetvid);
											$rowgetvid = mysql_fetch_array($resgetvid);
											$qrygetuser = "SELECT college, role FROM users WHERE username = '".$rowmyhistory['username']."'";
											$resgetuser = mysql_query($qrygetuser);
											$rowgetuser = mysql_fetch_array($resgetuser);
										?>
										<tr>
											<td><b><?php echo $rowgetvid["vtitle"]; ?></b><br>Views: <?php echo $rowgetvid["views"]; ?> | Likes: <?php echo $rowgetvid["likes"]; ?> | Dislikes: <?php echo $rowgetvid["dislikes"]; ?>
											</td>
											<td><b><?php echo $rowgetvid["username"]; ?></b><br><?php echo $rowgetuser["role"]; ?>,<?php echo $rowgetuser["college"]; ?>
											</td>
											<td><?php echo $rowmyhistory["timestmp"]; ?></td>
											</tr>
										<?php
										}
										?>
									</table>
								</div>
								
							</div>
								
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