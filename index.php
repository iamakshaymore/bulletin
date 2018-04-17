<?php
include './functions/connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript">

$(document).ready(function(){
	if($('#errors').text()=='')
	$('#errors').hide();
});
</script>

<div class="header">
	<img src="./assets/logo.png">
</div>
<div class="jumbotron text-center">
	<div class="container">
	  <div class="row">
	    <div class="col-sm-4">
	    </div>
	    <div class="col-sm-4 userDetails">
	    	<form method="POST" action="#">
	    		<div class="form-group">
				 	<label for="email">Email address:</label>
				 	<input type="email" class="form-control" id="email" name="email" required>
				</div>
				<div class="form-group">
				 	<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" name="password">
				</div>
				<div class="checkbox">
    				<label><input type="checkbox" name="rememberMe"> Remember me</label>
  				</div>
  				<button type="submit" class="btn btn-primary buttonMargin" name="login">Login</button>
	    	</form>
	    	<a href="./register.php"><button class="btn btn-default buttonMargin">Register</button></a>
	    	<div id="errors"></div>
	    </div>
	    <div class="col-sm-4">
	    </div>
	  </div>
	</div>
</div>
</body>
</html>

<?php
//error_reporting(E_ALL & ~E_NOTICE);
if (isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="SELECT userPassword,userRole FROM user where userEmail='".$email."';";
    $result = $conn->query($sql);
    $found="false";
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) {
        	if($row["userPassword"]==$password){
            	$found="true";
            	$userRole=$row["userRole"];
        	}
        }
              
        if($found=="true"){
			switch ($userRole) {
			 		case 'student':
			 			header('location:./student');
			 			break;
			 		case 'faculty':
			 			header('location:./faculty');
			 			break;
			 		case 'universityadmin':
			 			header('location:./admin');
			 			break;
			 	} 	
        }
        
        else{
        	echo "<script>
        	$('#errors').show('1000');
        	$('#errors').text('Invalid Password');
        	</script>";
        }
	}
	
	else{
       	echo "<script>
       	$('#errors').show('1000');
        $('#errors').text('No such Email Id Found');
        </script>";
	}
}
?>