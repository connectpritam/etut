<?php
	session_start();
	if(isset($_SESSION['un'])&&$_SESSION['un']!= ''){
 	include("php/dbcon.php");
 	$vid = $_GET["video"];
 	mysql_query("UPDATE videos SET views = views + 1 WHERE (vid = ".$vid.")");
 	$user = $_SESSION["un"];
 	$qrygetvid = "SELECT * FROM videos WHERE vid = ".$vid;
 	$resgetvid = mysql_query($qrygetvid);
 	$rowgetvid = mysql_fetch_array($resgetvid);
 	$qrywatch = "INSERT INTO watchrec(username,vid,timestmp) VALUES ('".$user."',".$vid.",'".date("Y-m-d")."')";
 	mysql_query($qrywatch);
 	
 	// $user = $_SESSION['un'];
 	// $qryp = 
 	// $res = mysql_query($qryp);
 	// $row = mysql_fetch_array($res);
 	?>
 <!DOCTYPE html>
 <html>
  	<head>
	    <title>Watch Video: <?php echo $rowgetvid['vtitle']?> </title>
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
		  				<div class="col-md-9">
		  					<div class="content-box-header">
			  					<div class="panel-title">Watch Video :<b> <?php echo $rowgetvid['vtitle']?> </b></div>
								
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<video width="100%" height="100%" autoplay controls="">
					  			 	<source src="php/uploads/<?php echo $vid;?>.mp4" type="video/mp4">
								 	Your browser does not support the HTML VIDEOS.
								</video>
								<br /><br />
								<h4><i>Description:</i></h4>
								<br><?php echo $rowgetvid['vdesc']?>
					  			 
								<br /><br />
							</div>
		  				</div> <!-- COL MD 9 END HERE -->
		  				<div class="col-md-3">
		  					<div class="content-box-header">
			  					<div class="panel-title">Information</div>

				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<table class="table table-hover">
									<tr><td>Uploader :</td><td><i><?php echo $rowgetvid['username']?></i></td></tr>
									<tr><td>Views :</td><td><?php echo $rowgetvid['views']?></td></tr>
									<tr><td>Likes :</td><td><?php echo $rowgetvid['likes']?></td></tr>
									<tr><td>Dislikes :</td><td><?php echo $rowgetvid['dislikes']?></td></tr>
									</table>
								<br />
								<div id="rating">
							  <input name="rateup" onclick="like()" type="image" src="images/like.png"/>
									  
								<input class="pull-right" onclick="dislike()" name="ratedown" type="image" src="images/dislike.png"/>
								</div>
								<div id="fback" style="display: none; color: green;">
								<b>Thanks for your feedback.</b>
								</div>
							</div>
		  				</div> <!-- COL MD 3 END HERE --> 
		  		</div><!-- ONE ROW IN COL MD 10 ENDS here -->
		  		<div class="row">
		  			<div class="col-md-12">
		  				<div class="content-box-header">
			  					<div class="panel-title">Discussions</div>
								
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<div>
				  				<form id="form" method="post">
							    <!-- need to supply post id with hidden fild -->
							    <input type="hidden" name="postid" value="1">
							    
							    <label>
							      <span>Your comment *</span>
							      <textarea class = "form-control" name="comment" id="comment" cols="150" placeholder="Type your comment here...." required></textarea>
							    </label><br>
							    <input class = "btn btn-primary" type="submit" id="submit" value="Submit Comment">
							  </form>

				  				</div>
								<br /><br />
							</div>
		  			</div>
		  		</div>
		    </div> <!-- COL-MD_10 END HERE -->
		  </div> <!-- ROW CLASS ENDS HERE -->
		</div> <!-- PAGE CONTENTS CLASS END HERE -->
		
    	<?php include("php/footer.php"); ?>
    	
    	<script type="text/javascript">
		     function like(){
		     		$.ajax({
				type: "GET",
				url: "php/likecount.php",
				data: "vid=<?php echo $vid ?>",
				cache: false,
				
				});
		     		 $("#rating").hide();
		     		 document.getElementById('fback').style.display = 'block';
				}
				function dislike(){
		     		$.ajax({
				type: "GET",
				url: "php/dislikecount.php",
				data: "vid=<?php echo $vid ?>",
				cache: false,
				
				});
		     		 $("#rating").hide();
		     		 document.getElementById('fback').style.display = 'block';
				}
    	</script>
  	</body>
</html>
 <?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>