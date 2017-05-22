<?php
session_start();
 include("php/dbcon.php");
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''){
 	?>
 <!DOCTYPE html>
 <html>
  	<head>
	    <title>Upload Video</title>
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
		  			<div class="col-md-6">
		  				<div class="content-box-header">
			  				<div class="panel-title"><b><i>My Uploads</div>
						</div>
<!-- PAGE CONTENTS BEGIN -->				  			
				  		<div class="content-box-large box-with-header">
				  			<div class="row">
				  				<?php 
				  					$getmyvideos = "SELECT * FROM videos WHERE username = '".$_SESSION['un']."'";
				  					$resmyvideos = mysql_query($getmyvideos);
								?>
									<!-- MY UPLOADED VIDEOS -->
							    <div class="table-responsive">
									<table border="0" cellpadding="10" cellspacing="1" class="table table-hover">
										<tr class="listheader">
										<td><b>Video Title</b></td>
										<td><b>Actions</b></td>
										</tr>
										<?php
										while($rowmyvideos = mysql_fetch_array($resmyvideos)) {
										?>
										<tr>
											<td><b><?php echo $rowmyvideos["vtitle"]; ?></b><br>Views: <?php echo $rowmyvideos["views"]; ?> | Likes: <?php echo $rowmyvideos["likes"]; ?> | Dislikes: <?php echo $rowmyvideos["dislikes"]; ?>
											</td>
											<td><a href="watch.php?video=<?php echo $rowmyvideos["vid"]; ?>" class="btn-sm btn-primary">VIEW</a> 
											<a href="php/delete_video.php?user=<?php echo $rowmyvideos["vid"]; ?>"  class="btn-sm btn-warning">DELETE</a>
											</td>
											</tr>
										<?php
										}
										?>
									</table>
								</div>
							</div>     
								<br /><br />
						</div>
		  			</div>
		  				
		  			<div class="col-md-6">
		  					<div class="content-box-header">
			  					<div class="panel-title"><b><i>Upload new video</div>
								
				  			</div>
<!-- PAGE CONTENTS BEGIN -->				  			
				  			<div class="content-box-large box-with-header">
				  				<div class="row">
									<div class="col-md-12">
										<form class="form-horizontal" role="form" action="php/upload.php" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label class="col-sm-4 control-label">Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="txtVname" placeholder="Video Name">
												</div>
											</div>
										    <div class="form-group">
												<label class="col-sm-4 control-label">Description</label>
												<div class="col-sm-8">
													<textarea class="form-control" name="txtVdesc" placeholder="Short Description about video" rows="3"></textarea>
													</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Tags (separated by commas)</label>
												<div class="col-sm-8">
													<textarea class="form-control" name="txtVtags" placeholder="Add as many tags separate by commas" rows="3"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Upload video</label>
												<div class="col-sm-8">
													<input class="btn btn-default" name="file" id="file" type="file">
													<p class="help-block">Only MP4 format allowed</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Categories</label>
												<div class="col-sm-8">
													<select class="btn btn-default" name="selVcat" id="exampleInputFile1" >									<?php 
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
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Uploader</label>
												<div class="col-sm-8">
													<span class="form-control"><?php echo($_SESSION['nm']);?></span>
												</div>
											</div>
											<div class="form-group" style="margin: 10%;">
			                    			<input type="submit" class="btn btn-primary signup" value="Upload Video">
			                				</div>
										</form>
									</div>
									<div class="col-md-6">

									</div>
								</div>
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