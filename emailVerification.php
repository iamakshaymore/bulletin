<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bulletin | Email Verification</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="header">
		<img src="./assets/logo.png">
	</div>
	<div class="jumbotron text-center">
		<div class="container">
	  		<div class="row">
	    		<div class="col-sm-4">
	    		</div>
	    		<div class="col-sm-4">
	    			<div><i>We Have Sent a Verification Code at <?php echo $_POST['email']; ?>, Please Enter The Code Below to Verify Your Email ID.</i></div>
	    			<form id="emailVerification" method="post" action="#">
	    				<h3>Email Verification</h3>
	    				<div class="userDetails">
		    				<div class="form-group">
					 			<label for="emailVerification">Verification Code:</label>
					 			<input type="number" class="form-control" id="emailVerification" name="emailVerification" required>
					 			<button type="submit" class="btn btn-primary" name="emailVerificationSubmit">Verify</button>
							</div>
						</div>
	    			</form>
	    		</div>
	    		<div class="col-sm-4">
	    		</div>
	    	</div>
	    </div>
	</div>
</body>
</html>