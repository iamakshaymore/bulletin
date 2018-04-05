<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="jumbotron text-center">
		<div class="container">
	  		<div class="row">
	    		<div class="col-sm-4">
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="form-group">
  						<label for="sel1">Register As : </label>
  						<select class="form-control" id="registrationType">
						    <option value="university">University</option>
						    <option value="faculty">Faculty</option>
						</select>
					</div>
	    		</div>
	    		<div class="col-sm-4">
	    		</div>
	    	</div>
	    </div>
	</div>

<form id="universityRegistrationForm" method="POST" action="#">
	<div class="jumbotron text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="userDetails">
						<h4>Personal Details (University Admin)</h4>
						<div class="form-group">
	   						<label for="firstName">First Name:</label>
	   						<input type="text" class="form-control" name="firstName" required>
						</div>

						<div class="form-group">
	   						<label for="lastName">Last Name:</label>
	   						<input type="text" class="form-control" name="lastName" required>
						</div>

  						<div class="form-group">
    						<label for="phone">Phone:</label>
    						<input type="tel" class="form-control" name="phone" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Email address:</label>
    						<input type="email" class="form-control" name="email" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Password:</label>
    						<input type="Password" class="form-control" name="password" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Confirm Password:</label>
    						<input type="Password" class="form-control" name="confirmPassword" required>
  						</div>
  					</div>
				</div>

				<div class="col-sm-6">
					<div class="universityDetails">
						<h4>University Details</h4>
						<div class="form-group">
							<label for="universityName">University Name:</label>
							<input type="text" class="form-control" name="universityName" required>
						</div>

						<div class="form-group">
	   						<label for="universityAddress">University Address:</label>
	  						<input type="text" class="form-control" name="universityAddress" required>
						</div>

						<div class="form-group">
	  						<label for="universityPhone">University Phone:</label>
	   						<input type="tel" class="form-control" name="universityPhone" required>
						</div>

						<div class="form-group">
	  						<label for="universityDomain">University Email:</label>
	  						<input type="email" class="form-control" name="universityEmail" required>
						</div>

						<div class="form-group">
	   						<label for="universityDomain">University Domain:</label>
	   						<input type="text" class="form-control" name="universityDomain" required>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success buttonMargin" name="universityRegistrationForm">Register</button>
		</div>
	</div>
</form>


<form id="facultyRegistrationForm" method="POST" action="#">
	<div class="jumbotron text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4 userDetails">
					<h4>Personal Details (University Admin)</h4>
						<div class="form-group">
	   						<label for="firstName">First Name:</label>
	   						<input placeholder="John" type="text" class="form-control" name="firstName" required>
						</div>

						<div class="form-group">
	   						<label for="lastName">Last Name:</label>
	   						<input placeholder="Doe" type="text" class="form-control" name="lastName" required>
						</div>

  						<div class="form-group">
    						<label for="phone">Phone:</label>
    						<input placeholder="(xxx)-xxx-xxxx" type="tel" class="form-control" name="phone" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Email address:</label>
    						<input placeholder="johndoe@abc.edu" type="email" class="form-control" name="facultyEmail" id="facultyEmail" required>
  						</div>
  						<span id="notfound" style="color: red"></span>
  						<span id="found" style="color: green"></span>

  						<div class="form-group">
    						<label for="email">Password:</label>
    						<input type="Password" class="form-control" name="password" required>
  						</div>

  						<div class="form-group">
    						<label for="email">Confirm Password:</label>
    						<input type="Password" class="form-control" name="confirmPassword" required>
  						</div>

  						<button type="submit" id="facultyRegButton" name="facultyRegistrationForm" class="buttonMargin btn btn-success">Register</button>	
				</div>
			</div>
		</div>
	</div>
</form>



<script type="text/javascript">
$('#facultyRegistrationForm').hide();
$(document).ready(function(){
	$('#registrationType').on('change', function (e) {
	    var optionSelected = $("option:selected", this);
	    var valueSelected = this.value;
	    if (valueSelected=='faculty') {
	    	$('#universityRegistrationForm').hide();
	    	$('#facultyRegistrationForm').show();
	    }
	    if (valueSelected=='university') {
	    	$('#universityRegistrationForm').show();
	    	$('#facultyRegistrationForm').hide();
	    }
	});

	$( "#facultyEmail" ).focusout(function() {
		var email = $('#facultyEmail').val();
		if(email.includes('@')){
			var domain=email.split("@");
			$.ajax({
    			type: "GET",
    			url: "./functions/functions.php?domain="+domain[1],
    			dataType: "xml",
    			success: function(xml){
    			$(xml).find('login').each(function(){
      				var status = $(this).find('status').text();
      				if(status=="true"){
      					$('#found').text('University Found');
      					$('#notfound').text("");
      					$("#facultyRegButton").prop("disabled",false);
      				}
      				else{
      					$('#notfound').text('University Not Found');
      					$('#found').text('');
      					$("#facultyRegButton").prop("disabled",true);
      				}

    });
  },
  error: function() {
    alert("An error occurred while processing XML file.");
  }
  });
		}

	});
});
</script>
</body>
</html>