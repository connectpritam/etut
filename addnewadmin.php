<?php
 session_start();
 if(isset($_SESSION['un'])&&$_SESSION['un']!= ''&&$_SESSION['rl']=='Admin'){
 	?>
<!DOCTYPE html>
 <html>
  	<head>
	    <title>Add Administrator</title>
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
			  					<div class="panel-title">Add New Administrator</div>
								
				  			</div>
				  			<div class="content-box-large box-with-header">
				  				<div class="row">
									<div class="col-md-4 ">
									      <div class="content-wrap">
								  				<form name="signupForm" method="POST" onsubmit="return passcheck()" action="php/registeradmin.php">
									                <input class="form-control" type="text" placeholder="Name" name="txtName"><br>
									                <input class="form-control" type="text" placeholder="Phone" name="txtPhn"><br>
									                <input class="form-control" type="text" placeholder="E-mail address" name="txtEmail">
									                <br><br>
									                <span id="user-result"></span><br><input class="form-control" type="text" id="username" placeholder="Username" name="txtUsername">
									                <br><br>
									                <input class="form-control" type="password" id="pass" placeholder="Password" name="txtPass"><br>
									                <input class="form-control" type="password" id="conpass" placeholder="Confirm Password"><br>
									                <div class="action">
							                    <input class="btn btn-primary signup" type="submit" value="Submit">
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
    	<!-- AJAX USERNAME CHECK -->
		<script type="text/javascript">
			$(document).ready(function() {
			    var x_timer;    
			    $("#username").keyup(function (e){
			        clearTimeout(x_timer);
			        var user_name = $(this).val();
			        x_timer = setTimeout(function(){
			            check_username_ajax(user_name);
			        }, 1000);
			    });

			function check_username_ajax(username){
			    $("#user-result").html('<img src="images/checking.gif"/>');
			    $.post('php/adm-username-checker.php', {'username':username}, function(data) {
			      $("#user-result").html(data);
			    });
			}
			});
		</script>
	<!-- END OF AJAX USERNAME CHECK -->
	<!-- PASSWORD VALIDATION -->
	<script type="text/javascript">
		function passcheck(){
		    var pass1 = document.getElementById("pass").value;
		    var pass2 = document.getElementById("conpass").value;
		    var ok = true;
		    if (pass1 != pass2) {
		        alert("Passwords Do not match");
		        document.getElementById("pass").style.borderColor = "#E34234";
		        document.getElementById("conpass").style.borderColor = "#E34234";
		        ok = false;
		    }
		    return ok;
		}
	</script>
	<!-- END OF PASSWORD VALIDATION -->
  	</body>
</html>
<?php
 }
 else{
 	echo('<script>	window.location = "http://localhost/etut/login.html";</script>');
 }
 ?>