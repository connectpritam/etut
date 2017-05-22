<?php
 session_start();
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''&&$_SESSION['rl']=='Admin'){
 	require_once("php/dbcon.php");
	$sql = "SELECT * FROM admins ORDER BY name ASC";
	$result = mysql_query($sql);
 	?>
<!DOCTYPE html>
 <html>
  	<head>
	    <title>View All Administrator</title>
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
		  		<?php include("php/adminmenu.php"); ?>
		    </div>
		  	<div class="col-md-10">
		  		<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">All Administrators of CampusKarma eTut</div>
							</div>
							
				  			<div class="content-box-large box-with-header">
				  				
				  			<div class="table-responsive">
									<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
										<table border="0" cellpadding="10" cellspacing="1" class="table table-hover">
											<tr class="listheader">
											<td><b>Name</b></td>
											<td><b>Email</b></td>
											<td><b>Username</b></td>
											<td><b>Actions</b></td>
											</tr>
										<?php
										$i=0;
										while($row = mysql_fetch_array($result)) {
										if($i%2==0)
										$classname="evenRow";
										else
										$classname="oddRow";
										?>
											<tr class="<?php if(isset($classname)) echo $classname;?>">
												<td><?php echo $row["name"]; ?></td>
												<td><?php echo $row["email"]; ?></td>
												<td><?php echo $row["username"]; ?></td>
												<td><a href="edit_admin.php?adminid=<?php echo $row["username"]; ?>" class="btn-sm btn-primary">EDIT</a> 
												<a href="php/delete_admin.php?adminid=<?php echo $row["username"]; ?>"  class="btn-sm btn-warning">DELETE</a></td>
											</tr>
										<?php
										$i++;
										}
										?>
										</table>
							
						</div>
				  			<br /><br />
							</div>
		  				</div>
		  		</div>
		  </div>
		</div>
		</div>
    	<?php include("php/footer.php"); ?>

    	
<script>
jQuery(document).ready(function() {
jQuery("#target-content").load("pagination.php?page=1");
    jQuery("#pagination li").live('click',function(e){
    e.preventDefault();
        jQuery("#target-content").html('loading...');
        jQuery("#pagination li").removeClass('active');
        jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery("#target-content").load("pagination.php?page=" + pageNum);
    });
    });
</script>
  	</body>
</html>
<?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>