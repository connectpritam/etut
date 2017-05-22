<?php
session_start();
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''){
 	include("php/dbcon.php");
 	$user = $_SESSION['un'];
 	$qryp = "SELECT * FROM users WHERE username = '".$user."'";
 	$res = mysql_query($qryp);
 	$row = mysql_fetch_array($res);
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
			  					<div class="panel-title"><b><i><?php echo($_SESSION['un']);?></i></b> | User Profile</div>
								
				  			</div>
<!-- PAGE CONTENTS BEGIN -->				  			
				  			<div class="content-box-large box-with-header">
				  				<div class="panel panel-default">
								    <div class="box box-info">
								     	<div class="box-body">
								           <!--  <div class="col-sm-6">
								                <div  align="center"> 
								                <br>
								                	<img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
								                	<input id="profile-image-upload" class="hidden" type="file">
													<div style="color:#999;" >click here to change profile image
													</div>
								          		</div>
								              <br>
								    		</div> -->
								            <div class="col-sm-12"><br>
								            	<b><h4 style="color:#00b1b1;"><?php echo($row['name']); ?></h4></b>
								              	<span><p><b><?php echo($row['role']); ?> - <?php echo($row['college']); ?></b></p></span>
								              	<a href="editprofile.php" class="btn btn-primary"> <i class="glyphicon glyphicon-pencil"></i> Edit Profile</a>
								              	<a href="changepassword.php" class="btn btn-warning"> <i class="glyphicon glyphicon-wrench"></i> Change Password</a>  
								              	<br> <br> 
								            </div>
								            <div class="clearfix"></div>
								            <hr style="margin:5px 0 5px 0;">
											<div class="col-sm-5 col-xs-6 tital " >Name:</div>
											<div class="col-sm-7 col-xs-6 "><?php echo $row['name']; ?></div>
											<div class="clearfix"></div>
											<div class="bot-border"></div>
											<!-- DATE OF BIRTH SECTION -->
											<!-- <div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div>
											<div class="col-sm-7">
											 
											</div>
			 							  	<div class="clearfix"></div>
											<div class="bot-border"></div>
 -->
											<div class="col-sm-5 col-xs-6 tital " >E-mail:</div>
											<div class="col-sm-7"><?php echo $row["email"];?></div>
											<div class="clearfix"></div>
											<div class="bot-border"></div>

											<div class="col-sm-5 col-xs-6 tital " >Phone:</div>
											<div class="col-sm-7"><?php echo $row["phone"];?></div>
											<div class="clearfix"></div>
											<div class="bot-border"></div>

											<div class="col-sm-5 col-xs-6 tital " >Upload Rights:</div>
											<div class="col-sm-7"><?php if($row["verified"]=="true")
											echo "YES, You can upload videos."; else echo("No. <a href='#'>Request Verification</a>");?></div>
											<div class="clearfix"></div>
											<div class="bot-border"></div>


								            <!-- /.box-body -->
								        </div>
								     <!-- /.box -->
									</div>
								       
								            
								    </div> 
<!-- 
								    <script>
								    $(function() {
								    $('#profile-image1').on('click', function() {
								        window.location("http://localhost/etut/php/editprofpic.php")
								    });});       
								    </script>
 -->
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
</html>
 <?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>