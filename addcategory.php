<?php
session_start();
include("php/dbcon.php");
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''&&$_SESSION['rl']=='Admin'){
 	?>
 <!DOCTYPE html>
 <html>
  	<head>
	    <title>Add New Category</title>
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
		<?php include("php/adminmenu.php");?>
		    </div>
		  	<div class="col-md-10">
		  		<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title"><b><i>Add New Video Category</div>
								
				  			</div>
<!-- PAGE CONTENTS BEGIN -->				  			
				  			<div class="content-box-large box-with-header">
				  				<div class="row">
									<div class="col-md-12">
										<form class="form-horizontal" role="form" action="php/addcat.php" method="post">
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" name="txtCatname" placeholder="Ex: DATA STRUCTURE">
												</div>
											</div>
										    <div class="form-group">
												<label class="col-sm-2 control-label">Description</label>
												<div class="col-sm-10">
													<textarea id="tinymce_basic" name="txtCatdesc" placeholder="Short Description about Category within 400 characters"></textarea>
													</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Uploader</label>
												<div class="col-sm-10">
													<span class="form-control"><?php echo($_SESSION['nm']);?></span>
												</div>
											</div>
											<div class="form-group" style="margin: 10%;">
			                    			<input type="submit" class="btn btn-primary signup" value="Save Category">
			                				</div>
										</form>
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
    	<script src="vendors/ckeditor/ckeditor.js"></script>
    	<script src="vendors/ckeditor/adapters/jquery.js"></script>
    	<script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>
    	<script>tinymce.init({
    selector: "#tinymce_basic",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});</script>
  	</body>
</html>
 <?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>