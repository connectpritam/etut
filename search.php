<?
include("php/dbcon.php");
 session_start();
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''){
 	$srchitm = $_GET['q'];
 	?>
<!DOCTYPE html>
 <html>
  	<head>
	    <title>Search Results</title>
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
		    	<div class="col-md-2"> <!-- MENU PANEL BEGIN -->
		  			<?php if($_SESSION['rl']=='Admin')include("php/adminmenu.php");
		  				else
		  				include("php/usermenu.php");  ?>
		    	</div> <!-- MENU PANEL END -->
		  		<div class="col-md-10">
		  			<div class="row">
		  				<div class="col-md-12" >
		  					<div class="content-box-header">
			  					<div class="panel-title">Search results for <i><b><?php echo $srchitm; ?></b></i></div>
								
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<div class="row">
				  				<?php 
				  					$getmyvideos = "SELECT * FROM videos WHERE (vtitle LIKE '%".$srchitm."%') OR (vtags LIKE '%".$srchitm."_')";
				  					$resmyvideos = mysql_query($getmyvideos);
								?>
									<!-- MY UPLOADED VIDEOS -->
							    <div class="table-responsive">
									<table border="0" cellpadding="10" cellspacing="1" class="table table-hover">
										<tr class="listheader">
										<td><b>Video Title</b></td>
										<td><b>Uploaded by</b></td>
										<td><b>Actions</b></td>
										</tr>
										<?php
										while($rowmyvideos = mysql_fetch_array($resmyvideos)) {
											$qrygetuser = "SELECT college, role FROM users WHERE username = '".$rowmyvideos['username']."'";
											$resgetuser = mysql_query($qrygetuser);
											$rowgetuser = mysql_fetch_array($resgetuser);
										?>
										<tr>
											<td><b><?php echo $rowmyvideos["vtitle"]; ?></b><br>Views: <?php echo $rowmyvideos["views"]; ?> | Likes: <?php echo $rowmyvideos["likes"]; ?> | Dislikes: <?php echo $rowmyvideos["dislikes"]; ?>
											</td>
											<td><b><?php echo $rowmyvideos["username"]; ?></b><br><?php echo $rowgetuser["role"]; ?>,<?php echo $rowgetuser["college"]; ?>
											</td>
											<td><a href="watch.php?video=<?php echo $rowmyvideos["vid"]; ?>" class="btn-sm btn-primary">VIEW</a> 
				
											</td>
											</tr>
										<?php
										}
										?>
									</table>
								</div>
							</div>
							</div> <!-- CONTENT BOX END HERE -->
		  				</div> <!-- COL MD 12 END HERE -->
		  			</div> <!-- ROW IN COL MD 10 END HERE -->
		  		</div> <!-- COL MD 10 END HERE -->
			</div> <!-- ROW ENDS HERE -->
		</div> <!-- PAGE CONTENT DIV HERE -->
    	<?php include("php/footer.php"); ?>
  	</body>
</html>
<?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>