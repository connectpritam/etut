<?
include("php/dbcon.php");
 session_start();
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''){
 	
 	?>
<!DOCTYPE html>
 <html>
  	<head>
	    <title>Category</title>
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
			  					<div class="panel-title">Category wise video list 
			  						
			  					</div>
								
				  			</div>
				  			<div class="content-box-large box-with-header">
				  			<form class="form-inline" role="form" method="POST">
								<fieldset>
									<div class="col-md-3">
													<select class="btn btn-default" name="cat" id="exampleInputFile1" >									<?php 
														$getcat = "SELECT catname from categories ORDER BY catname";
														$r = mysql_query($getcat);
														if(mysql_affected_rows()>0){
															while($rs=mysql_fetch_array($r)){
													?>
													
														<option value ="<?=$rs['catname'] ?>"><?=$rs['catname'] ?></option>
													<?php 
												} }
													?>	
													</select>
												</div>
												<span>
									<button type="submit" class="btn btn-primary">
										Show
									</button>
									</span>
								</fieldset>
								
							</form>
				  				<div class="row"><br><br><br>
				  				<?php
				  					if(isset($_POST["cat"])){
 									$srchitm = $_POST["cat"]; 
				  					$getmyvideos = "SELECT * FROM videos WHERE category = '".$srchitm."'";
				  					$resmyvideos = mysql_query($getmyvideos);
								?>
									<!-- CATEGORY WISE VIDEO LIST -->
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
								<?php
										}
										else{

											echo("SELECT A CATEGORY");
										}
										?>
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